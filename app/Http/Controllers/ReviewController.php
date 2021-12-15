<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::orderBy('title', 'asc')->get();
        return view('reviews.create', ['books' => $books]);
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
            'ISBN' => 'required|integer|digits:13',
            'title'=> 'required|string|max:255',
            'content' => 'required|string|max:255',    
        ]);

        $a= new Review;
        $a->ISBN = $validatedData['ISBN'];
        $a->page_id = Auth::user()->id;
        $a->title = $validatedData['title'];
        $a->content = $validatedData['content'];
        $a->postDate = Carbon::now();
        $a->save();

        session()->flash('message', 'Review posted successfully');
        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show',['review' => $review]);
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
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('message', 'Review was deleted');
    }
}
