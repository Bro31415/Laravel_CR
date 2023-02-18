<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|min:5|max:20',
            'penulis' => 'required|string|min:3',
            'tgl_rilis'
        ]);

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tgl_rilis' => $request->tgl_rilis
        ]);
        return redirect()->route('books.index');
    }

    public function edit(Book $book){
        return view('books.edit', compact('book'));
    }

    public function updateBook(Request $request, $id){
        $book = Book::find($id);

        $this->validate($request, [
            'judul' => 'required|string|min:5',
            'penulis' => 'required|string|min:3',
            'tgl_rilis'
        ]);

        $book -> update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tgl_rilis' => $request->tgl_rilis
        ]);
        return redirect()->route('books.index');
    }

    public function getBookbyId($id) {
        $book = Book::find($id);

        return view('update', ['books => $book']);
    }

    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'));
    }

    public function deleteBook($id)
    {
        Book::destroy($id);

        return redirect(route('books.index'));
    }

    public function getBooktoReviewbyId($id){
        $book = Book::find($id);

        return view('books.giveReview');
    }

    public function giveReviews(Book $book){
        return view('books.givereview');
    }
}