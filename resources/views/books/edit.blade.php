@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 30px;">
    <h2>✏️ Edit Buku</h2>
    <hr>

    {{-- Alert Error Global jika ada validasi yang gagal --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" class="form-control @error('judul') is-invalid @enderror">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" class="form-control @error('penulis') is-invalid @enderror">
            @error('penulis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" class="form-control @error('tahun_terbit') is-invalid @enderror">
            @error('tahun_terbit')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $book->stok) }}" class="form-control @error('stok') is-invalid @enderror">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Buku</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection