<?php

namespace App\Http\Controllers;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function apiIndex($id)
    {
        $comments = Comment::where('commentable_id', $id)->where('commentable_type', 'App\Models\Page')->get();
        return $comments;
    }

    public function apiStore(Request $request){
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',    
        ]);
        $c = new Comment();
        $c->commentable_type = 'App\Models\Page';
        $c->commentable_id = $request['commentable_id'];
        $c->user_id = Auth::user()->id;
        $c->content = $validatedData['content'];
        $c->postDate = Carbon::now();
        $c->save();
        return $c;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|string|max:255',
            'description' => 'required|string|max:255',    
        ]);

        $a= new Page;
        $a->id = Auth::user()->id;
        $a->title = $validatedData['title'];
        $a->description = $validatedData['description'];
        $a->save();

        session()->flash('message', 'Page created successfully');
        return view('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show',['page' => $page]);
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
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')->with('message', 'Page was deleted');
    }
}
