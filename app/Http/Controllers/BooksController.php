<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Books::orderBy('id')->paginate(10);
        return view('books/index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::check())
            return view('/books/create');
        else
            return redirect('/books')->with('error','Unauthorized access');
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
            'author' => 'required',
            'publisher'=>'required',
            'language'=>'required'
        ]);
        $book=new Books;
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->publisher=$request->input('publisher');
        $book->language=$request->input('language');
        $book->genre=$request->input('genre');
        $book->save();

        return redirect('/books')->with('success','New book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Books::find($id);
        return view('books/show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Books::find($id);
        return view('books/edit')->with('book',$book);
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
            'author' => 'required',
            'publisher'=>'required',
            'language'=>'required',
            'genre'=>'required'
        ]);
        $book=Books::find($id);

        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->publisher=$request->input('publisher');
        $book->language=$request->input('language');
        $book->genre=$request->input('genre');
        
        $book->save();

        return redirect('/books')->with('success','book Updated');   

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
