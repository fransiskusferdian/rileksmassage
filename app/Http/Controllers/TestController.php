<?php

namespace App\Http\Controllers;
use App\User;
use Canvas\Events\PostViewed;
use Canvas\Post;
use Canvas\Tag;
use Canvas\UserMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::published()
                ->with(['tags'])
                ->orderByDesc('published_at')
                ->simplePaginate(3);

        $tags = Tag::select(['name', 'slug'])
                   ->whereHas('posts')
                   ->withCount('posts')
                   ->orderByDesc('posts_count')
                   ->take(15)
                   ->get();
        
        $selectedtag = 'all';

        

        return view('pages.blog', [
            'posts' => $posts,
            'tags' => $tags,
            'selectedtag' => $selectedtag
        ]);
    }

    public function show($slug)
    {
        $post = Post::published()
                    ->with(['tags'])
                    ->where('slug', $slug)
                    ->get();
      
        foreach ($post as $p) {
                $p;     
        }

        return view('pages.blog-single', [
            'p' => $p
        ]);
    }

    public function tag(Request $request, string $slug)
    {
        $tags = Tag::select(['name', 'slug'])
                  ->whereHas('posts')
                  ->withCount('posts')
                  ->orderByDesc('posts_count')
                  ->take(15)
                  ->get();

         $tag = Tag::select('name', 'slug')->where('slug', $slug)->first();

         $selectedtag = $tag->slug;

        if ($tag) {
            $posts = Post::whereHas('tags', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->published()->withUserMeta()->orderByDesc('published_at')->simplePaginate(3);;
        }

        return view('pages.blog', [
            'posts' => $posts,
            'tags' => $tags,
            'selectedtag' => $selectedtag
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $posts = Post::published()
                ->with(['tags'])
                ->where('title','like',"%".$search."%")
                ->orderByDesc('published_at')
                ->simplePaginate(3);
        
        $selectedtag = 'all';

        return view('pages.blog', [
            'posts' => $posts,
            'tags' => $tags,
            'selectedtag' => $selectedtag
        ]);
    }

}
