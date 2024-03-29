<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    
    public function apiIndex($id, $poly)
    {
        $comments = Comment::where([['commentable_id', $id],['commentable_type', 'App\Models\\' . $poly]])->get();

        foreach ($comments as $comment) {
            $comment->user_id = $comment->user->name;
        }

        return $comments;
    }

    public function apiStore(Request $request, $poly){
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',    
        ]);
        $c = new Comment();
        $c->commentable_type = 'App\Models\\' . $poly;
        $c->commentable_id = $request['commentable_id'];
        $c->user_id = Auth::user()->id;
        $c->content = $validatedData['content'];
        $c->postDate = Carbon::now();
        $c->save();
        $c->user_id = Auth::user()->name;
        $c->postDate = Carbon::now()->format('Y-m-d');
        return $c;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
