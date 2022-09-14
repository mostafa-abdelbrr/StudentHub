<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $rules = [
        'content' => ['required', 'string'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $post_id)
    {
        $request->validate($this->rules);
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $data['post_id'] = $post_id;
        $comment = Comment::create($data);
        return redirect()->route('post.list');
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $comment = Comment::find($id);
        $comment->content = $request->content;
        $comment->save();
        return redirect()->route('post.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::User()->role == 'admin' || Auth::id() == Comment::find($id)->user->id) {
            Comment::destroy($id);
        }
        return redirect()->route('post.list');
    }
}
