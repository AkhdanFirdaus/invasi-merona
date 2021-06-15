@extends('layouts.home')

@section('content')
<div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Daftar</h1>
    <ul class="nav nav-pills nav-fill bg-white p-3 my-5" id="tabDaftar" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#data-diri" type="button" role="tab"
                aria-controls="data-diri" aria-selected="true" id="isi-data-diri">1. Isi data diri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat" type="button" role="tab"
                aria-controls="riwayat" aria-selected="false" id="isi-riwayat">2. Isi Riwayat Penyakit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#jadwal" type="button" role="tab"
                aria-controls="jadwal" aria-selected="false" id="isi-jadwal">3. Pilih Lokasi</a>
        </li>
    </ul>
    <form action="" method="POST">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="data-diri" role="tabpanel" aria-labelledby="data-diri-tab">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="card bg-info">
                            <div class="card-body">
                                <h3>Ketentuan pendaftaran vaksin</h3>
                                <ol class="">
                                    <li>Data yang dimasukkan haruslah valid</li>
                                    <li>Penerima vaksin harus hadir tepat waktu</li>
                                    <li>Penerima vaksin harus dalam keadaan sehat</li>
                                    <li>Penerima vaksin harus menunjukkan data diri (ktp) kepada petugas</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="bg-white rounded p-3">
                            <h4>Data Diri</h4>
                            <hr />
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama">
                            </div>
                            <div class="form-group mb-2">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik">
                            </div>
                            <div class="form-group mb-2">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="date-of-birth" class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control" readonly id="date-of-birth">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="telp" class="form-label">No Telp</label>
                                <input type="tel" class="form-control" id="telp">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-primary" data-bs-target="#riwayat" type="button" role="tab"
                                    aria-controls="riwayat">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h4>Daftar riwayat penyakit</h4>
                        <div id="list-riwayat">
                            <div class="p-3 bg-white rounded mb-2" id="item1">
                                <div class="form-group mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit[]">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="keteranan" class="form-label">Keterangan</label>
                                    <textarea type="text" class="form-control" id="keterangan"
                                        name="keterangan[]"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-primary" id="tambah">Tambah</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="bg-white rounded p-3">
                            <div class="bg-danger">
                                <div class="p-3">
                                    <p class="fw-bold text-white">Pastikan riwayat yang anda masukkan lengkap karena
                                        akan menjadi
                                        pertimbangan kami untuk pemilihan vaksin.</p>
                                </div>
                            </div>
                            <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-primary">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
                <div class="bg-white rounded p-3">
                    <div class="form-group mb-4">
                        <label for="vaksin" class="form-label">Pilih Rumah Sakit</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="bg-info p-5 rounded mb-4">
                        <h4>Info Rumah Sakit</h4>
                        <ul class="list-unstyled">
                            <li>Alamat</li>
                            <li>Jam Operasional</li>
                            <li>Kuota</li>
                        </ul>
                    </div>
                    <div class="p-3 bg-warning mb-4">
                        <p class="fw-bold">Dengan ini anda menyetujui segala persyaratan dan ketentuan yang
                            telah disebutkan</p>
                    </div>
                    <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary">Daftar!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('script')
<script>
    const picker = new LitePicker({
        element: document.getElementById('date-of-birth')
    });

    const buttonTambah = document.getElementById('tambah');
    const listRiwayat = document.getElementById('list-riwayat');

    buttonTambah.addEventListener('click', function() {
        console.log("di klik");
        const idBaru = listRiwayat.childElementCount + 1;
        const itemTerakhir = listRiwayat.lastElementChild;
        const itemBaru = itemTerakhir.cloneNode(true);
        itemBaru.id = 'item' + idBaru;
        itemTerakhir.after(itemBaru);
    });



</script>
@endpush
@endsection
