<?php

namespace App\Http\Controllers;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('pages.index', compact('pages'));
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

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',    
            ]);

            $request->file->store('pages', 'public');

            $p = new Page;
            $p->image_path = $request->file->hashName();

        } else {
            $p = new Page;
        }

        $p->id = Auth::user()->id;
        $p->title = $validatedData['title'];
        $p->description = $validatedData['description'];
        $p->save();

        return redirect()->route('pages.index')->with('message', 'Page created successfully');
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
    public function edit(Page $page)
    {
        return view('pages.edit',['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate([
            'title'=> 'required|string|max:255',
            'description' => 'required|string|max:255',    
        ]);

        $a = $page;
        $a->id = $page->id;
        $a->title = $validatedData['title'];
        $a->description = $validatedData['description'];
        $a->save();

        return redirect()->route('pages.index')->with('message', 'Page updated successfully');
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
