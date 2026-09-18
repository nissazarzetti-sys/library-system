<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Daftar Member';
        $description = 'Daftar member yang terdaftar di perpustakaan';
        $members = [
            'Andi',
            'Budi',
            'Citra',
            'Dewi',
            'Eko'
        ];

        return view('members.index', compact('title', 'description', 'members'));
    }

    public function show($id)
    {
        return 'ID Member: ' . $id;
    }
}
