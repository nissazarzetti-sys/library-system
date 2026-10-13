<?php

namespace App\Http\Controllers;

use App\Models\Book; // 1. Tambahkan ini
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $validated = $_request -> validate( [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer|min:1900',
            'stok' => 'required|integer|min:0'
        ]);


        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan';
        
        // 2. Ambil data dari database menggunakan Eloquent Model
        $books = Book::all (); 

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        $idBooks = $id;
        return view('books.show', compact('idBooks'));
    }
}

