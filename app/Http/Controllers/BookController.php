<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

    $data['books'] = Book::all();
    return view('books.index', $data);

    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->published_year = $request['published_year'];
        $book->save();

        return redirect()->to('students');
    }

    public function update(Request $request,string $id)
    {
        $book = Book::find($id);
        $book->title = $request['title'];
        $book->author = $request['author'];
        $book->description = $request['description'];
        $book->isbn = $request['isbn'];
        $book->published_year = $request['published_year'];
       
        $book->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $data['book'] = Book::find($id);
        return view('books.edit', $data);

    }
}
