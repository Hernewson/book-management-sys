<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return response()->json(['data' => $books], 200);
        // return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $book = Book::create([
            'name' => $request->name,
            'isbn' => $request->isbn
        ]);

        return response()->json(['data' => $book], 201);
        // return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bookId)
    {
        $books = Book::findOrFail($bookId);
        return response()->json(['data' => $books], 200);
        // return view('books.show')->with('book', Book::find($bookId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.create')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = $request->name;
        $book->isbn = $request->isbn;
        $book->save();
        // session()->flash('success', 'Book has been updated successfully.');

        return response()->json(['data' => $book], 201);

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['data' => $book], 200);

        // session()->flash('success', "Book has been removed successfully.");
        // return redirect()->back();

    }
}
