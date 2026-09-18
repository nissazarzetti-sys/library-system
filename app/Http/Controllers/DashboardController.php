<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stokBuku = 8;
        $member = 5;
        $categories = 5;

        return view ('dashboard.index', compact('stokBuku', 'member', 'categories'));
    }
}
