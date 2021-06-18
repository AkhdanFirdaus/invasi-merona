@extends('layouts.dashboard')
@push('nav')
<li class="breadcrumb-item"><a href="{{ route('rumah-sakit.index') }}">Rumah Sakit</a></li>
<li class="breadcrumb-item active">@if(isset($rs)) Edit @else Tambah @endif</li>
@endpush

@section('content')
<div class="mt-4">
    @include('components.message')
</div>
<div class="mt-4">
    <ul class="nav nav-pills nav-fill bg-white p-3 my-5" id="tabDaftar" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#data-rs" type="button" role="tab"
                aria-controls="data-rs" aria-selected="true" id="isi-data-rs">1. Data Rumah Sakit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#jadwal" type="button" role="tab"
                aria-controls="jadwal" aria-selected="false" id="isi-jadwal">2. Jadwal Rumah Sakit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#data-admin" type="button" role="tab"
                aria-controls="data-admin" aria-selected="false" id="isi-data-admin">3. Data Admin</a>
        </li>
    </ul>
    <form action="@if(isset($rs)){{ route('rumah-sakit.update', $rs->id) }}@else{{ route('rumah-sakit.store') }}@endif"
        method="POST">
        @csrf
        @if (isset($rs))
        <input type="hidden" name="_method" value="PATCH">
        @endif
        <div class="tab-content my-4" id="myTabContent">
            <div class="tab-pane fade show active" id="data-rs" role="tabpanel" aria-labelledby="data-rs-tab">
                <div class="form-group mb-2">
                    <label for="name">Nama Rumah Sakit</label>
                    <input type="text" class="form-control" name="name" value="@if(isset($rs)){{ $rs->name }}@endif">
                </div>
                <div class="form-group mb-2">
                    <label for="address">Alamat Rumah Sakit</label>
                    <textarea name="address" class="form-control" cols="30"
                        rows="10">@if(isset($rs)){!! $rs->address !!}@endif</textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="quota_per_day">Quota Per Hari</label>
                    <input type="number" name="quota_per_day" class="form-control"
                        value="@if(isset($rs)){{ $rs->quota_per_day }}@endif">
                </div>
            </div>
            <div class="tab-pane fade show" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
                <h5>Jadwal Dalam Satu Hari</h5>
                <div class="mt-4 bg-white p-2" id="list-jadwal">
                    <div class="row mb-2" id="item1">
                        <div class="col">
                            <select class="form-select" name="day[]" placeholder="Jam Buka">
                                <option selected>Pilih Hari</option>
                                <option value="1">Senin</option>
                                <option value="2">Selasa</option>
                                <option value="3">Rabu</option>
                                <option value="4">Kamis</option>
                                <option value="5">Jumat</option>
                                <option value="6">Sabtu</option>
                                <option value="0">Minggu</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="start[]" placeholder="Jam Buka">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="end[]" placeholder="Jam Tutup">
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" id="tambah">Tambah</a>
                </div>
            </div>
            <div class="tab-pane fade show" id="data-admin" role="tabpanel" aria-labelledby="data-admin-tab">
                <div class="form-group mb-2">
                    <label for="user_name">Nama Admin</label>
                    <input type="text" class="form-control" name="user_name"
                        value="@if(isset($rs)){{ $rs->user_name }}@endif">
                </div>
                <div class="form-group mb-2">
                    <label for="email">Email Admin</label>
                    <input type="email" class="form-control" name="email" value="@if(isset($rs)){{ $rs->email }}@endif">
                </div>
                <div class="form-group mb-2">
                    <label for="user_address">Alamat Admin (Opsional)</label>
                    <textarea type="text" class="form-control" name="user_address" cols="30"
                        rows="10">@if(isset($rs)){{ $rs->user_address }}@endif</textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="no_telp">No Telpon Admin</label>
                    <input type="tel" class="form-control" name="no_telp"
                        value="@if(isset($rs)){{ $rs->no_telp }}@endif">
                </div>
                <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('script')
<script>
    const buttonTambah = document.getElementById('tambah');
    const listJadwal = document.getElementById('list-jadwal');

    buttonTambah.addEventListener('click', function() {
        console.log("di klik");
        const idBaru = listJadwal.childElementCount + 1;
        const itemTerakhir = listJadwal.lastElementChild;
        const itemBaru = itemTerakhir.cloneNode(true);
        itemBaru.id = 'item' + idBaru;
        itemTerakhir.after(itemBaru);
    });


    // const triggerTabList = [...document.querySelectorAll('.next a[data-bs-toggle="tab"]'];
    // triggerTabList.forEach((triggerEl) => {
    //     const tabTrigger = new bootstrap.Tab(triggerEl)

    //     triggerEl.addEventListener('click', (e) => {
    //         e.preventDefault()
    //         tabTrigger.show()
    //     })
    // })
</script>
@endpush
