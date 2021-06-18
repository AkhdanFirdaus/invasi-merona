@extends('layouts.dashboard')
@push('nav')
<li class="breadcrumb-item active">Pendaftaran</li>
@endpush

@section('content')
<div class="mt-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('daftar.index') }}" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

@include('components.message')

<div class="mt-4 table-responsive">
    <table id="datatable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tgl Vaksinasi</th>
                <th>Jenis Vaksin</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@include('components.dialog')

@endsection

@push('script')
<script>
    axios.get('/api/pendaftaran-list').then(response => {
        console.log(response.data);
            $('#datatable').DataTable({
                data: response.data,
                columns: [
                    { data: 'id' },
                    {
                        // data: 'created_at',
                        render: function(data, type, row, meta) {
                            return row.date + ", " + row.start;
                        }
                     },
                    { data: 'vaksin_nama' },
                    { data: 'name' },
                    { data: 'email' },
                    {
                        "render": function ( data, type, row, meta ) {
                            return `
                            <div class="d-grid gap-2 d-md-flex">
                                <a class="btn btn-primary" href="/daftar/${row.nik}/berhasil">View</a>
                            </div>`;

                        }
                    }
                ],
            });
    });

    function onDelete(id) {
        console.log(id);
        document.getElementById('delete-data').innerText = id;
        document.getElementById('form-delete').setAttribute('action', '/dashboard/artikel/' + id);
        let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>
@endpush
