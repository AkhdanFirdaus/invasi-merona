@extends('layouts.app')

@section('layout-content')
<div class="p-5 mb-4 bg-white rounded-3">
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <i class="fas fa-check-circle fa-4x text-success"></i>
        </div>
        <h1 class="display-5 fw-bold text-center">Berhasil Daftar</h1>
        <p class="fs-4 text-center">Anda telah terdaftar sebagai penerima vaksin</p>
        <div class="my-3">
            <div class="row row-cols-1 row-cols-md-3 g-4 my-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Data diri</h6>
                            <ul class="list-unstyled">
                                <li>Nama : <strong>{{ $data->name }}</strong></li>
                                <li>Nik : <strong>{{ $data->nik }}</strong></li>
                                <li>Gender : <strong>{{ $data->gender == 1 ? "Laki-laki" : "Wanita" }}</strong></li>
                                <li>Alamat : <strong>{{ $data->address }}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jenis</h6>
                            <ul class="list-unstyled">
                                <li>Kode Pendaftaran(NIK) : <strong>{{ $data->nik }}</strong></li>
                                <li>Nama Vaksin : <strong>{{ $data->vaksin_nama }}</strong></li>
                                <li>Deskripsi Vaksin : <strong>{{ $data->vaksin_deskripsi }}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Jadwal</h6>
                            <ul class="list-unstyled">
                                <li>Rumah Sakit : <strong>{{ $data->rs_name }}</strong></li>
                                <li>Alamat RS : <strong>{{ $data->rs_alamat }}</strong></li>
                                <li>Tanggal : <strong>{{ $data->date }}</strong></li>
                                <li>Jam : <strong>{{ $data->start }}</strong></li>
                                <li>Selesai : <strong>{{ $data->end }}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg"">Kembali</a>
        </div>
    </div>
</div>
@endsection
