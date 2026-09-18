@extends('layouts.app')

@section('title', 'Library System Dashboard')

@section('content')

    <h2>Library Sytem Dashboard</h2>
    <p>Selamat datang di Sistem Informasi Perpustakaan.</p>

    @if($stokBuku > 0)
        <p>Stok Buku: {{ $stokBuku }}</p>
    @else
        <p>Stok habis.</p>
    @endif

    @if($member > 0)
        <p>Jumlah Member: {{ $member }}</p>
    @else
        <p>Member 0</p>
    @endif

    @if($categories > 0)
        <p>Jumlah Kategori: {{ $categories }}</p>
    @else
        <p>Stok habis.</p>
    @endif

@endsection