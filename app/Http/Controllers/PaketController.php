<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
{
    // $pakets = ['test'];
    // dd($pakets);
    $pakets = Paket::all();
return view('user.paket.index', compact('pakets'));}
}