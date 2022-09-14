<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $rules = [
        'title' => ['required', 'string'],
        'content' => ['required', 'string'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $user = User::find(6);
//        $post = Post::find(1);
//        $comments = Comment::factory()->count(5)->for($user)->for($post)->create();
        return view('post-list', ['posts' => Post::orderBy('created_at', 'desc')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
//        dd($data);
        $post = Post::create($data);
        return redirect()->route('post.list');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::User()->role == 'admin' || Auth::id() == Post::find($id)->user->id) {
            Post::destroy($id);
        }
        return redirect()->route('post.list');
    }
}
