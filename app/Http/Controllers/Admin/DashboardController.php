<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method untuk menampilkan halaman utama
    public function index()
    {
        // 'dashboard' merujuk pada file resources/views/admin/dashboard.blade.php
        return view('admin.dashboard'); 
    }
}