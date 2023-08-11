<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;


class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view('pengguna.index', compact('pengguna'));
    }
}
