<?php

namespace App\Http\Controllers;

use App\Models\JadwalPemeriksaan;
use App\Models\JadwalRumahSakit;
use App\Models\Pendaftaran;
use App\Models\Penyakit;
use App\Models\RumahSakit;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use \Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function datalist()
    {
        $data = Pendaftaran::select(
            'pendaftarans.*',
            'vaksins.*',
            'jadwal_pemeriksaans.*',
            'users.*'
        )
            ->join('vaksins', 'vaksins.id', '=', 'pendaftarans.vaksin_id')
            ->join('jadwal_pemeriksaans', 'jadwal_pemeriksaans.id', '=', 'pendaftarans.jadwal_pemeriksaans.id')
            ->join('users', 'users.id', 'pendaftarans.user_id')
            ->get();
        return response()->json($data);
    }

    public function daftar()
    {
        $vaksin = Vaksin::all();
        $rumahSakit = RumahSakit::all();
        return view('pages.home.daftar', ['vaksins' => $vaksin, 'rumahSakit' => $rumahSakit]);
    }

    public function daftarBerhasil($nik)
    {
        $data = Pendaftaran::select(
            'pendaftarans.*',
            'jadwal_pemeriksaans.*',
            'rumah_sakits.id AS rs_id',
            'rumah_sakits.name AS rs_nama',
            'rumah_sakits.address AS rs_alamat',
            'users.email AS rs_email',
            'users.no_telp AS rs_no_telp',
            'vaksins.id AS vaksin_id',
            'vaksins.name AS vaksin_nama',
            'vaksins.description AS vaksin_deskripsi',
        )
            ->join('vaksins', 'vaksins.id', '=', 'pendaftarans.vaksin_id')
            ->join('jadwal_pemeriksaans', 'jadwal_pemeriksaans.id', '=', 'pendaftarans.jadwal_pemeriksaan_id')
            ->join('jadwal_rumah_sakits', 'jadwal_rumah_sakits.id', '=', 'jadwal_pemeriksaans.jadwal_rumah_sakit_id')
            ->join('rumah_sakits', 'rumah_sakits.id', '=', 'jadwal_rumah_sakits.rumah_sakit_id')
            ->join('users', 'users.rumah_sakit_id', '=', 'rumah_sakits.id')
            ->where('pendaftarans.nik', $nik)
            ->firstOrFail();
        return view('pages.home.daftar-berhasil', ['data' => $data]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $date = Carbon::now();
            if (Carbon::now()->weekday($request->day)->gt(Carbon::now())) {
                $date = Carbon::now()->weekday($request->day)->toDateString();
            } else {
                $date = Carbon::now()->weekday($request->day)->addWeek()->toDateString();
            }

            $jadwalPemeriksaan = new JadwalPemeriksaan();
            $jadwalPemeriksaan->jadwal_rumah_sakit_id = $request->jadwal_rumah_sakit_id;
            $jadwalPemeriksaan->date = $date;
            $jadwalPemeriksaan->start = $request->start;
            $jadwalPemeriksaan->end = (int) $request->start + 1;
            $jadwalPemeriksaan->save();


            $pendaftaran = new Pendaftaran();
            $pendaftaran->jadwal_pemeriksaan_id = $jadwalPemeriksaan->id;
            $pendaftaran->vaksin_id = $request->vaksin_id;
            $pendaftaran->name = $request->name;
            $pendaftaran->email = $request->email;
            $pendaftaran->nik = $request->nik;
            $pendaftaran->gender = $request->gender;
            $pendaftaran->no_telp = $request->no_telp;
            $pendaftaran->address = $request->address;
            $pendaftaran->birth_date = $request->birth_date;
            $pendaftaran->status = 0;
            $pendaftaran->save();



            for ($i = 0; $i < count($request->nama_penyakit); $i++) {
                $riwayatPenyakit = new Penyakit();
                $riwayatPenyakit->pendaftaran_id = $pendaftaran->id;
                $riwayatPenyakit->name = $request->nama_penyakit[$i];
                $riwayatPenyakit->description = $request->keterangan[$i];
                $riwayatPenyakit->save();
            }


            DB::commit();
            return redirect()->route('daftar.berhasil', $pendaftaran->nik);
        } catch (\Exception $th) {
            DB::rollBack();
            Session::flash('gagal', "Gagal daftar $th");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
