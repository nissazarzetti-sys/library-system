<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan';
        $books = [
            'Pemrograman PHP, AUTHOR: John Doe, year: 2020',
            'Laravel untuk Pemula, AUTHOR: Jane Smith, year: 2021',
            'Basis Data, AUTHOR: Bob Johnson, year: 2019',
            'Algoritma dan Pemrograman, AUTHOR: Alice Williams, year: 2020',
            'Pemrograman Berorientasi Objek, AUTHOR: Charlie Brown, year: 2021',
            'Sistem Operasi, AUTHOR: David Wilson, year: 2019',
            'Jaringan Komputer, AUTHOR: Eve Davis, year: 2020',
            'Keamanan Informasi, AUTHOR: Frank Miller, year: 2021'
        ];

        $stock = 8;

        return view('books.index', compact ('title', 'description', 'books', 'stock'));
    }

    public function show($id)
    {
        $idBooks = $id;
        return view('books.show', compact('idBooks'));
    }
}