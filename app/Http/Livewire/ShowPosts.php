<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{
    public $title = "Listado de Posts";
    public $sort = "id";
    public $direction = "desc";
    public $search;
    public $name;

    protected $listeners = ['render'];

    public function mount(){
        
    }

    public function render()
    {
        $posts = Post::where('title', 'like', "%{$this->search}%")
                       ->orwhere('content', 'like', "%{$this->search}%")
                       ->orderBy($this->sort,$this->direction)
                       ->get();

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
}
