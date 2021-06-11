<div class="modal fade" id="formDaftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="formDaftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDaftarLabel">Form Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="form-group mb-2">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Daftar!</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    const picker = new LitePicker({
        element: document.getElementById('date-of-birth')
    });
</script>
@endpush
