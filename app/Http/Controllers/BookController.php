<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Menampilkan semua data buku
    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }

    // 2. Menampilkan form tambah buku
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok'         => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    // 4. Menampilkan detail buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // 5. Menampilkan form edit buku
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    // 6. Memperbarui data buku
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|min:3|max:255',
            'penulis' => 'required|string|min:3|max:100',
        ]);

        $book->update([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    // 7. Menghapus buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
