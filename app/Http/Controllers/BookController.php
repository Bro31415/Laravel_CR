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
            'judul' => 'required|string|min:5',
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

    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'));
    }


}