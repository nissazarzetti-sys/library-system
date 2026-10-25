<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; // 1. Import Model Category
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Tampilkan semua data buku beserta kategorinya (Read)
    public function index()
    {
        // Menggunakan eager loading (with) agar query relational efisien
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // 2. Tampilkan form tambah buku beserta pilihan kategori (Create Form)
    public function create()
    {
        $categories = Category::all(); // Ambil semua data kategori dari DB
        return view('books.create', compact('categories'));
    }

    // 3. Simpan data buku baru ke database (Store)
    public function store(Request $request)
    {
        // Validasi diperketat termasuk penambahan category_id
        $request->validate([
            'category_id'  => 'required|exists:categories,id', // Kategori wajib ada di tabel categories
            'judul'        => 'required|string|min:3|max:255',
            'penulis'      => 'required|string|min:3|max:100',
            'tahun_terbit' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
        ], [
            // Custom pesan error
            'category_id.required' => 'Kategori buku wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
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

    // 4. Tampilkan detail satu buku beserta kategorinya (Show)
    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // 5. Tampilkan form edit buku beserta pilihan kategori (Edit Form)
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all(); // Ambil daftar kategori untuk dropdown edit
        return view('books.edit', compact('book', 'categories'));
    }

    // 6. Update data buku di database (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'judul'        => 'required|string|min:3|max:255',
            'penulis'      => 'required|string|min:3|max:100',
            'tahun_terbit' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
        ], [
            'category_id.required' => 'Kategori buku wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
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