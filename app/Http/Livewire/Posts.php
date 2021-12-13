<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Notifications\Post\Like;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $content;

    public $tab;
    public $hashtag;

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
            $post->user->notify(new Like($post->user));
        }
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function mount(Request $request)
    {
        if ($request->get('hashtag')) {
            $this->hashtag = $request->get('hashtag');
        }

        if ($request->get('tab')) {
            $this->tab = $request->get('tab');
        }
    }

    public function render()
    {
        $posts = Post::when($this->hashtag, function ($query) {
            $query->whereHas('hashtags', function ($query) {
                $query->where('name', $this->hashtag);
            });
        })
            ->when($this->tab, function ($query) {
                if ($this->tab === 'top') {
                    $query->withCount('likers')->orderBy('likers_count', 'desc');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.posts', [
            'posts' => $posts
        ]);
    }
}
