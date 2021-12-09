<?php

namespace App\View\Components\Post;

use App\Models\Post;
use Illuminate\View\Component;

class Content extends Component
{
    public $post;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Content with hashtags
     * 
     * @return string|null 
     */
    public function generateContent()
    {
        $tags = $this->post->parseHashtags();

        $replace = [];
        $links = [];

        foreach ($tags as $tag) {
            $replace[] = '#' . $tag;
            $links[] = '<a href="' . route('dashboard.index', ['hashtag' => $tag]) . '" class="text-indigo-600 font-bold">#' . $tag . '</a>';
        }

        return str_replace($replace, $links, $this->post->content);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post.content', [
            'content' => $this->generateContent()
        ]);
    }
}
