<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $content;

    protected $listeners = ['loadMore' => 'loadMore'];

    protected $rules = [
        'content' => 'required'
    ];

    public function submit(Request $request)
    {
        $post = new Post($this->validate());
        $request->user()->posts()->save($post);
        $this->content = '';
    }

    public function like(Request $request, $postId)
    {
        $post = Post::find($postId);
        if ($post->isLikedBy($request->user())) {
            $request->user()->unlike($post);
        } else {
            $request->user()->like($post);
        }
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::latest()->paginate($this->perPage)
        ]);
    }
}
