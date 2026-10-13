@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>
    <div class="card p-3">
        <p><strong>ID:</strong> {{ $book->id }}</p>
        <p><strong>Judul:</strong> {{ $book->judul }}</p>
        <p><strong>Penulis:</strong> {{ $book->penulis }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
        <p><strong>Stok:</strong> {{ $book->stok }}</p>
    </div>
    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsectiono