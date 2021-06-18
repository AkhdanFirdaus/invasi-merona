@extends('layouts.dashboard')
@push('nav')
<li class="breadcrumb-item active">Vaksin</li>
@endpush

@section('content')
<div class="mt-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('vaksin.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

@include('components.message')

<div class="mt-4 table-responsive">
    <table id="datatable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tgl Publikasi</th>
                <th>Vaksin</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@include('components.dialog')

@endsection

@push('script')
<script>
    axios.get('/api/vaksin-list').then(response => {
        console.log(response.data);
            $('#datatable').DataTable({
                data: response.data,
                columns: [
                    { data: 'id' },
                    {
                        // data: 'created_at',
                        render: function(data, type, row, meta) {
                            return row.created_at.substring(0, 10);
                        }
                     },
                    { data: 'name' },
                    { data: 'description' },
                    {
                        "render": function ( data, type, row, meta ) {
                            return `
                            <div class="d-grid gap-2 d-md-flex">
                                <a class="btn btn-warning" href="vaksin/${row.id}/edit">Edit</a>
                                <a class="btn btn-danger" onclick="onDelete(${row.id})">Delete</a>
                            </div>`;

                        }
                    }
                ],
            });
    });

    function onDelete(id) {
        console.log(id);
        document.getElementById('delete-data').innerText = id;
        document.getElementById('form-delete').setAttribute('action', '/dashboard/vaksin/' + id);
        let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>
@endpush
