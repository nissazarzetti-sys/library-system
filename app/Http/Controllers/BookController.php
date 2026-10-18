<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Tampilkan semua data buku (Read)
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // 2. Tampilkan form tambah buku (Create Form)
    public function create()
    {
        return view('books.create');
    }

    // 3. Simpan data buku baru ke database (Store)
    public function store(Request $request)
    {
        // Validasi diperketat sesuai ketentuan tugas
        $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'penulis'      => 'required|string|min:3|max:100',
            'tahun_terbit' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
        ], [
            // Custom pesan error (opsional tetapi memperjelas di UI)
            'judul.required'        => 'Judul buku wajib diisi.',
            'judul.min'             => 'Judul buku minimal harus 3 karakter.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penulis.min'           => 'Nama penulis minimal harus 3 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits'   => 'Tahun terbit harus tepat 4 digit angka.',
            'tahun_terbit.max'      => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'stok.required'         => 'Stok buku wajib diisi.',
            'stok.min'              => 'Stok tidak boleh bernilai negatif.',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // 4. Tampilkan detail satu buku (Show)
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // 5. Tampilkan form edit buku (Edit Form)
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // 6. Update data buku di database (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'penulis'      => 'required|string|min:3|max:100',
            'tahun_terbit' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // 7. Hapus data buku dari database (Delete)
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}