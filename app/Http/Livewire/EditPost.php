<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditPost extends Component
{

    use WithFileUploads;

    public $post;
    public $isOpened = false;
    public $image;
    public $cleanImageInput;
    private $moduleTitle = 'Edición del Post';

    protected $rules = array(
        'post.title' => 'required|max:20',
        'post.content' => 'required|max:100'
    );

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }

    public function updated($attribute)
    {
        $this->validateOnly($attribute);
    }

    public function editPost()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]);

            $newImageUrl = $this->image->store('posts');

            $this->post->image = $newImageUrl;
        }

        $this->post->save();

        $this->cleanImageInput = rand();

        $this->reset(['isOpened', 'image']);

        $this->emitTo('show-posts', 'render');
        $this->emit('alert', ['status'=>'success','title'=>$this->moduleTitle, 'message'=>'El post se modificó correctamente']);
    }
}
