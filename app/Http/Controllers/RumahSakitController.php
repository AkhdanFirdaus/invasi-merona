<?php

namespace App\Http\Controllers;

use App\Models\JadwalRumahSakit;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RumahSakitController extends Controller
{
    public function datalist()
    {
        $rs = RumahSakit::all();
        return response()->json($rs);
    }

    public function infors(Request $request)
    {
        $rs = RumahSakit::find($request->rs_id);
        $jadwalrs = JadwalRumahSakit::where('rumah_sakit_id', $rs->id)->get();
        return response()->json([
            'info' => json_decode($rs),
            'jadwal' => json_decode($jadwalrs),
        ]);
    }

    public function profil()
    {
        $id = auth()->user()->rumah_sakit_id;
        $rs = RumahSakit::find($id);
        $jadwal = JadwalRumahSakit::where('rumah_sakit_id', $rs->id)->get();
        return view('pages.dashboard.rumahsakit.profil', ['rs' => $rs, 'jadwals' => $jadwal]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.rumahsakit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.rumahsakit.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $rs = new RumahSakit();
            $rs->name = $request->name;
            $rs->address = $request->address;
            $rs->quota_per_day = $request->quota_per_day;
            $rs->save();

            $user = new User();
            $user->rumah_sakit_id = $rs->id;
            $user->name = $request->user_name;
            $user->email = $request->email;
            $user->address = $request->user_address ?? $request->address;
            $user->password = Hash::make('admin');
            $user->role = 2;
            $user->no_telp = $request->no_telp;
            $user->save();

            for ($i = 0; $i < count($request->start); $i++) {
                $jadwal = new JadwalRumahSakit();
                $jadwal->rumah_sakit_id = $rs->id;
                $jadwal->day = $request->day;
                $jadwal->start = $request->start[$i];
                $jadwal->end = $request->end[$i];
                $jadwal->save();
            }

            DB::commit();
            Session::flash('sukses', 'Sukses menambahkan rumah sakit');
            return redirect()->route('rumah-sakit.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Session::flash('gagal', "Gagal menambahkan rumah sakit $th");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rs = RumahSakit::find($id);
        return view('pages.dashboard.rumahsakit.profil', ['rs' => $rs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = RumahSakit::select('rumah_sakits.*', 'users.name AS user_name', 'users.email', 'users.address AS user_address', 'users.no_telp')->join('users', 'users.rumah_sakit_id', '=', 'rumah_sakits.id')->find($id);
        return view('pages.dashboard.rumahsakit.add', ['rs' => $rs]);
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
        try {
            DB::beginTransaction();

            $rs = RumahSakit::find($id);
            $rs->name = $request->name;
            $rs->address = $request->address;
            $rs->quota_per_day = $request->quota_per_day;
            $rs->save();

            $user = User::where('rumah_sakit_id', $id)->get();
            $user->name = $request->user_name;
            $user->email = $request->email;
            $user->address = $request->address ?? $request->user_address;
            $user->no_telp = $request->no_telp;
            $user->save();

            DB::commit();
            Session::flash('sukses', 'Sukses mengedit rumah sakit');
            return redirect()->route('rumah-sakit.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Session::flash('gagal', 'Gagal mengedit rumah sakit');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = RumahSakit::find($id);
        $rs->delete();
        Session::flash('sukses', 'Sukses menghapus rumah sakit');
        return redirect()->route('rumah-sakit.index');
    }
}
