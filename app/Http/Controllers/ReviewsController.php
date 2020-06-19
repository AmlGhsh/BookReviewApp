<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviews;
use App\Books;
use App\User;

class ReviewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find all results of Reviews
        // $revs=Reviews::all();

        //sort reviews in descending order according to title and group 1 post per page
        $revs=Reviews::orderBy('title','desc')->paginate(10);

        //search review by title
        //Reviews::where('title','Review 1')->get();


        return view('reviews/index')->with('revs',$revs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'book' => 'required'
        ]);
        $book_title=$request->input('book');
        if(Books::where('title',$book_title)->exists()){
            $review=new Reviews;
            $review->title=$request->input('title');
            $review->body=$request->input('body');
            $review->user_id=auth()->user()->id;
            $review->book_id=Books::where('title',$book_title)->value('id');
            $review->save();
            return redirect('/reviews')->with('success','Review Created');
        }
        else{
            return redirect('/reviews')->with('error',"No such book exists.");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rev=Reviews::find($id);
        return view('reviews/show')->with('rev',$rev);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rev=Reviews::find($id);

        //check for correct user
        if(auth()->user()->id !== $rev->user_id)
            return redirect('/reviews')->with('error','Unauthorized access');

        return view('reviews/edit')->with('rev',$rev);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        $review=Reviews::find($id);
        
        //check for correct user
        if(auth()->user()->id !== $review->user_id)
            return redirect('/reviews');

        $review->title=$request->input('title');
        $review->body=$request->input('body');
        $review->touch();
        $review->save();

        return redirect('/reviews')->with('success','Review Updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rev=Reviews::find($id);
        
        //check for correct user
        if(auth()->user()->id !== $rev->user_id)
            return redirect('/reviews')->with('error','Unauthorized access');

        $rev->delete();
        return redirect('/reviews') -> with('success','Review removed');
    }
}
