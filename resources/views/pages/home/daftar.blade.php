@extends('layouts.home')

@section('content')
<div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Daftar</h1>

    @include('components.message')

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
    <form action="{{ url('/daftar') }}" method="POST">
        @csrf
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
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik">
                            </div>
                            <div class="form-group mb-2">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender1" checked
                                        value="1">
                                    <label class="form-check-label" for="gender1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="2">
                                    <label class="form-check-label" for="gender2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="date-of-birth" class="form-label">Tanggal Lahir (eg. 2001-03-27)</label>
                                <input type="text" class="form-control" id="date-of-birth" name="birth_date">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="telp" class="form-label">No Telp</label>
                                <input type="tel" class="form-control" name="no_telp">
                            </div>
                            <div class="form-group mb-2">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10"
                                    class="form-control"></textarea>
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
                                        pertimbangan kami untuk vaksin yang anda pilih.</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="form-group">
                                    <label for="vaksin" class="form-label">Pilih Vaksin</label>
                                    <select class="form-select" name="vaksin_id">
                                        <option checked>Pilih Vaksin</option>
                                        @foreach ($vaksins as $vaksin)
                                        <option value="{{ $vaksin->id }}">{{ $vaksin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
                <div class="bg-white rounded p-3">
                    <div class="form-group mb-4">
                        <label for="rs_id" class="form-label">Pilih Rumah Sakit</label>
                        <select class="form-select" name="rs_id" id="pilih-rs">
                            <option checked>Pilih RS</option>
                            @foreach ($rumahSakit as $rs)
                            <option value="{{ $rs->id }}">{{ $rs->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <input type="hidden" name="jadwal_rumah_sakit_id" id="jadwal_rumah_sakit_id">
                        <label for="rs_id" class="form-label">Pilih Hari (Jika dalam minggu ini sudah terlewat, masuk
                            minggu depan)</label>
                        <select class="form-select" name="day" id="pilih-hari">
                            <option checked>Pilih Hari</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="rs_id" class="form-label">Pilih Jam, Buka: <strong id="jam-start"></strong>, Tutup
                            <strong id="jam-end"></strong> current: <strong id="tampil-jam"></strong></label>
                        <input type="range" class="form-control" name="start" id="pilih-jam">
                    </div>
                    <div class="bg-info p-5 rounded mb-4">
                        <h4>Info Rumah Sakit</h4>
                        <ul class="list-unstyled">
                            <li>Nama: <strong id="rs-nama"></strong></li>
                            <li>Alamat: <strong id="rs-alamat"></strong></li>
                            <li>Kuota: <strong id="rs-kuota"></strong></li>
                            <li>
                                <p>Jam Operasional</p>
                                <ul class="list-group" id="rs-jadwal"></ul>
                            </li>
                        </ul>
                    </div>
                    <div class="p-3 bg-warning mb-4">
                        <p class="fw-bold">Dengan ini anda menyetujui segala persyaratan dan ketentuan yang
                            telah disebutkan</p>
                    </div>
                    <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Daftar!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('script')
<script>
    var dataRS = {};
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


    const rs = document.getElementById('pilih-rs');
    rs.addEventListener('change', function() {
        axios.post('/api/info-rs', {
            rs_id: rs.value
        }).then(response => {
            dataRS = response.data;
            renderInfo(dataRS.info);
            renderJadwal(dataRS.jadwal)
        });
    });

    function renderInfo(info) {
        document.getElementById('rs-nama').innerText = info.name;
        document.getElementById('rs-alamat').innerText = info.address;
        document.getElementById('rs-kuota').innerText = info.quota_per_day;
    }

    function renderJadwal(jadwal) {
        let htmlInfo = "<option checked>Pilih Rumah Sakit</option>";
        let htmlPilihHari = "<option checked>Pilih Hari</option>";
        jadwal.map(e => {
            htmlInfo += `<li class="list-group-item">${getDay(e.day)}, buka: ${e.start}, tutup: ${e.end}</li>`;
            htmlPilihHari += `<option value="${e.day}">${getDay(e.day)}</option>`
        })
        document.getElementById('rs-jadwal').innerHTML = htmlInfo;
        document.getElementById('pilih-hari').innerHTML = htmlPilihHari;
    }

    function getDay(day) {
        switch (day) {
            case 0:
                return "Minggu";
            case 1:
                return "Senin";
            case 2:
                return "Selasa";
            case 3:
                return "Rabu";
            case 4:
            return "Kamis";
            case 5:
                return "Jumat";
            case 6:
                return "Sabtu";
            default:
                break;
        }
    }

    const pilihHari = document.getElementById('pilih-hari');
    const pilihJam = document.getElementById('pilih-jam');

    pilihHari.addEventListener('change', function() {
        let res = dataRS.jadwal.filter(e => e.day == pilihHari.value);
        pilihJam.setAttribute('min', res[0].start);
        pilihJam.setAttribute('max', res[0].end);
        pilihHari.value = res[0].day;
        document.getElementById('jam-start').innerText = res[0].start;
        document.getElementById('jam-end').innerText = res[0].end;
        document.getElementById('jadwal_rumah_sakit_id').value = res[0].id;
    });

    const tampilJam = document.getElementById('tampil-jam');
    pilihJam.addEventListener('change', function() {
        tampilJam.innerText = pilihJam.value;
    })
</script>
@endpush
@endsection
