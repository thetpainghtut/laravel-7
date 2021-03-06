<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('id','desc')->get();
        
        if ($request->tag_id != null) {
            $tag = Tag::findOrFail($request->tag_id);
            $posts = $tag->posts;
        }

        return response()->json([
            'status' => 'ok',
            'totalResults' => count($posts),
            'posts' => PostResource::collection($posts)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request->validate([
            'title' => 'required|min:5',
            'tags' => 'required',
            'content' => 'required'
        ]);

        // if include file, upload

        // save 
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        foreach ($request->tags as $row) {
            $post->tags()->attach($row); // if upload
            // $post->tags()->attach($row['id']);
        }

        // response
        return (new PostResource($post))
                    ->response()
                    ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
