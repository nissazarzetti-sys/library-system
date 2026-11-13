@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
<div style="width: 90%; margin: 30px auto; font-family: Arial, sans-serif;">
    <h2>👥 Manajemen Pengguna (Khusus Admin)</h2>
    <p style="color: #777;">Daftar akun Admin dan Petugas perpustakaan</p>
    <a href="{{ route('books.index') }}" style="display:inline-block; margin-bottom:15px; padding:8px 14px; background:#6c757d; color:#fff; text-decoration:none; border-radius:5px;">← Kembali ke Daftar Buku</a>

    <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
        <thead>
            <tr style="background-color: #f8dce8;">
                <th style="padding: 12px;">No</th>
                <th style="padding: 12px;">Nama</th>
                <th style="padding: 12px;">Email</th>
                <th style="padding: 12px;">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr style="border-bottom: 1px solid #eee; text-align: center;">
                <td style="padding: 12px;">{{ $loop->iteration }}</td>
                <td style="padding: 12px;">{{ $user->name }}</td>
                <td style="padding: 12px;">{{ $user->email }}</td>
                <td style="padding: 12px;"><strong>{{ strtoupper($user->role) }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection