<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VaksinController extends Controller
{
    public function datalist()
    {
        $listvaksin = Vaksin::select('vaksins.*', DB::raw('users.name as user_name'), 'users.email')->join('users', 'users.id', '=', 'vaksins.user_id')->get();
        return response()->json($listvaksin);
    }

    public function index()
    {
        return view('pages.dashboard.vaksin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.vaksin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaksin = new Vaksin();
        $vaksin->name = $request->name;
        $vaksin->description = $request->description;
        $vaksin->user_id = $request->user()->id;
        if ($vaksin->save()) {
            Session::flash('sukses', 'Sukses menambahkan vaksin');
            return redirect()->route('vaksin.index');
        }
        Session::flash('gagal', 'Gagal menambahkan vaksin');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return view('pages.dashboard.vaksin');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaksin = Vaksin::find($id);
        return view('pages.dashboard.vaksin.add', ['vaksin' => $vaksin]);
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
        $vaksin = Vaksin::find($id);
        $vaksin->name = $request->name;
        $vaksin->description = $request->description;
        $vaksin->user_id = $request->user()->id;
        if ($vaksin->save()) {
            Session::flash('sukses', 'Sukses menambahkan vaksin');
            return redirect()->route('vaksin.index');
        }
        Session::flash('gagal', 'Gagal menambahkan vaksin');
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
        $artikel = Vaksin::find($id);

        $artikel->delete();
        Session::flash('sukses', 'Sukses menghapus vaksin');
        return redirect()->route('vaksin.index');
    }
}
