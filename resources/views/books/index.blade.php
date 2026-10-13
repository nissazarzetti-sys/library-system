@extends('layouts.app') 

@section('title', 'Daftar Buku') 

@section('content') 
<style>
    .book-container {
        width: 90%;
        margin: 30px auto;
        font-family: Arial, sans-serif;
    }
    .book-container h2 {
        text-align: center;
        margin-bottom: 8px;
    }
    .book-description {
        text-align: center;
        color: #777;
        margin-bottom: 20px;
    }
    .btn-add {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 6px;
        margin-bottom: 15px;
        font-weight: bold;
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
        text-align: center;
        color: #555;
    }
    .book-table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: center;
    }
    .book-table tr:hover {
        background-color: #fff5f8;
    }
    .btn-action {
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 13px;
        color: white;
        margin: 0 2px;
        border: none;
        cursor: pointer;
    }
    .btn-info { background-color: #17a2b8; }
    .btn-warning { background-color: #ffc107; color: #333; }
    .btn-danger { background-color: #dc3545; }
    .alert-success {
        padding: 10px;
        background-color: #d4edda;
        color: #155724;
        border-radius: 5px;
        margin-bottom: 15px;
    }
</style>

<div class="book-container">
    <h2>📚 Daftar Buku</h2>
    <p class="book-description">Daftar buku yang tersedia di perpustakaan</p>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}" class="btn-add">+ Tambah Buku Baru</a>

    <table class="book-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>{{ $book->stok }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn-action btn-info">Detail</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn-action btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-action btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 20px; color: #999;">Belum ada data buku. 📖</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsectionp