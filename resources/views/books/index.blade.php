@extends('layouts.app') 

@section('title', 'Daftar Buku') 

@section('content') 
    @if (session('success'))
        </p> {{ session('success') }}
    @endif
 
    <form action=""{{ route('books.store') }}" method="POST">
        @csrf
        <!-- Form fields for adding a new book -->
    </form>

    <style>
        .book-container {
            width: 90%;
            margin: 30px auto;
            font-family: Arial, sans-serif;
    }

    .book-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .book-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-radius: 10px;
        overflow: hidden;
    }

    .book-table th {
        background-color: #f8dce8;
        padding: 12px;
        text-align: left;
    }

    .book-table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    .book-table tr:hover {
        background-color: #fff5f8;
    }
</style>

<div class="book-container">
    <h2>📚 Daftar Buku</h2>

    <table class="book-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>{{ $book->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection