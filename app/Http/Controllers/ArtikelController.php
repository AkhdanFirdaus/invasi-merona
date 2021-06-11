<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function detail($id)
    {
        // $artikel = Artikel::find($id);
        return view('pages.artikel-detail', ['id' => $id]);
    }
}
