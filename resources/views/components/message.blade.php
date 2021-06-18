@if (session('sukses'))
<div class="mt-4">
    <div class="mb-4 alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('sukses') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if (session('gagal'))
<div class="mt-4">
    <div class="mb-4 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('gagal') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
