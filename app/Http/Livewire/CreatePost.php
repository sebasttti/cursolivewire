<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $isOpened = false;
    public $title;
    public $content;
    public $image;
    public $cleanImageInput;

    protected $rules = array('title' => 'required|max:20',
                             'content' => 'required|max:100',
                             'image' => 'required|image|max:2048'   
                            );

    public function mount(){
        $this->cleanImageInput = rand();
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function savePost()
    {

        $this->validate();

        $imageUrl = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imageUrl
        ]);

        $this->cleanImageInput = rand();

        $this->reset(['isOpened', 'title', 'content', 'image']);

        $this->emitTo('show-posts', 'render');
        $this->emit('alert', ['message'=>"El post se creó satisfactoriamente"]);
    }

    /**
     * Permite realizar validaciones en tiempo real
     */

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
