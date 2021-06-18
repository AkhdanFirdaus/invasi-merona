<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArtikelController extends Controller
{
    public function datalist()
    {
        // SELECT * FROM artikel INNER JOIN users ON users.id = artikel.user_id
        $listArtikel = Artikel::select('artikels.*', 'users.name', 'users.email')->join('users', 'users.id', '=', 'artikels.user_id')->get();
        return response()->json($listArtikel);
    }

    public function index()
    {
        return view('pages.dashboard.artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.artikel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel();
        $artikel->title = $request->title;
        $artikel->content = $request->content;
        $artikel->user_id = $request->user()->id;

        if ($artikel->save()) {
            Session::flash('sukses', 'Sukses menambahkan artikel');
            return redirect()->route('artikel.index');
        }
        Session::flash('gagal', 'Gagal menambahkan artikel');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
        return view('pages.home.artikel-detail', ['artikel' => $artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('pages.dashboard.artikel.add', ['artikel' => $artikel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->title = $request->title;
        $artikel->content = $request->content;
        $artikel->user_id = $request->user()->id;
        if ($artikel->save()) {
            Session::flash('sukses', 'Sukses mengedit artikel');
            return redirect()->route('artikel.index');
        }
        Session::flash('gagal', 'Gagal mengedit artikel');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();
        Session::flash('sukses', 'Sukses menghapus artikel');
        return redirect()->route('artikel.index');
    }
}
