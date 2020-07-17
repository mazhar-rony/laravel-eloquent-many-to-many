<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index', 
        [
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', [
            'authors' => Author::all()
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
        //dd($request->all());

        $book = Book::create(request(['name', 'description', 'isbn']));

        $authors = Author::find(request('authors'));
        
        //dd($authors->toarray());

        $book->authors()->attach($authors);

        return redirect('/books');
        
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
        $book = Book::find($id);
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
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
        // FInd Existing Book
        $book = Book::find($id);

        // FInd Existing Authors
        $authors = $book->authors;

        // Delete All Authors
        $book->authors()->detach($authors);

        // Update Book
        $book->update(request(['name', 'description', 'isbn']));

        // Find Selected Authors (here parameter 'author' is name='authors' in dropdown select)
        $authors = Author::find(request('authors'));

        // Attach New Authors
        $book->authors()->attach($authors);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $authors = $book->authors;

        $book->authors()->detach($authors);

        $book->delete();

        return redirect('/books');
    }
}
