@extends('layouts.app')

@section ('title', 'Daftar Buku')

@section('content')
<h2>Daftar Buku</h2>

<ul>
    @foreach($books as $book)
        <li>
            {{ $book }}
        </li>
    @endforeach
</ul>

@if($stock > 0)
    <p>Stok tersedia: {{ $stock }}</p>
@else
    <p>Stok habis.</p>
@endif
@endsection

