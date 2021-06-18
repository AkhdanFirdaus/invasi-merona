<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function welcome()
    {
        $artikel = Artikel::select('artikels.*', 'users.name', 'users.email')
            ->join('users', 'users.id', '=', 'artikels.user_id')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view('pages.home.welcome', ['artikels' => $artikel]);
    }

    public function artikel()
    {
        // $artikel = Artikel::select('artikels.*', 'users.name', 'users.email')
        //     ->join('users', 'users.id', '=', 'artikels.user_id')
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        // return view('pages.home.artikel', ['artikels' => $artikel]);
        return view('pages.home.artikel');
    }

    public function vaksin()
    {
        $listvaksin = Vaksin::select('vaksins.*', DB::raw('users.name as user_name'), 'users.email')->join('users', 'users.id', '=', 'vaksins.user_id')->get();
        return view('pages.home.vaksin', ['vaksins' => $listvaksin]);
    }

    public function profil()
    {
        return view('pages.home.profil-user');
    }
}
