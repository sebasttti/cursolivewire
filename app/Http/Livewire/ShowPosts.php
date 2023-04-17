<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    
    use WithPagination;
    
    public $title = "Listado de Posts";
    public $sort = "id";
    public $direction = "desc";
    public $search;
    public $name;
    public $resultsQuantity = '10';

    protected $listeners = ['render', 'deletePost'];

    protected $queryString = ['resultsQuantity' => ['except'=>'10'],
    'sort'=> ['except'=>'id']];
    
    public function mount(){
        
    }

    public function render()
    {
        $posts = Post::where('title', 'like', "%{$this->search}%")
                       ->orwhere('content', 'like', "%{$this->search}%")
                       ->orderBy($this->sort,$this->direction)
                    /*    ->get() */
                       ->paginate($this->resultsQuantity);

        return view('livewire.show-posts', ['posts' => $posts]);
    }

    public function assignOrder($attribute){

        if ($this->sort == $attribute) {
            $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
        }else{
            $this->sort = $attribute;
            $this->direction = 'desc';
        }

        
    }

    public function deletePost(Post $post){
        $post->delete();
    }
}
