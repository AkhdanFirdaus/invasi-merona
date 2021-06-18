@extends('layouts.home')

@section('content')
<div class="p-5 mb-4 my-3">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Article</h1>
        <p class="fs-4">Cari artikel seputar Vaksin dan Covid 19.</p>
        <div class="card mt-3 shadow border-0 w-50 mx-auto">
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control" id="cari-artikel" />
                    <div class="mx-2"></div>
                    <button class="btn btn-primary px-3" type="button" id="inputGroupFileAddon04">Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 my-3" id="artikel-grid">
    {{-- @if (count($artikels) > 0)
    @foreach ($artikels as $artikel)
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $artikel->title }}</h5>
    <p><small>{{ $artikel->name }}</small></p>
    <a href="{{ url("/artikel/$artikel->id") }}" class="card-link btn btn-primary stretched-link">See
        Detail</a>
    <p class="card-text"><small class="text-muted">Posted:
            {{ \Carbon\Carbon::parse($artikel->created_at)->toDateString() }}</small></p>
</div>
</div>
</div>
@endforeach
@else
<div class="col">
    <div class="card">
        <div class="card-body">
            <h5>Tidak Ada data</h5>
        </div>
    </div>
</div>
@endif --}}
</div>

@endsection

@push('script')
<script>
    const list = document.getElementById('artikel-grid');
    const cari = document.getElementById('cari-artikel')

    axios.get('/api/artikel-list').then(response => {
        // console.log(response.data);
        render(response.data);

        let data = [];
        data = response.data;

        cari.addEventListener('keyup', function() {
            console.log(cari.value);
            let filtered = data.filter((e) => e.title.toLowerCase().includes(cari.value.toLowerCase()));
            render(filtered);
        });


    });

    function render(data) {
        if (data.length > 0) {
            let html = "";
            data.map(artikel => {
                html += `
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${artikel.title}</h5>
                            <p><small>${artikel.name}</small></p>
                            <a href="/artikel/${artikel.id}" class="card-link btn btn-primary stretched-link">See
                                Detail</a>
                            <p class="card-text"><small class="text-muted">Posted: ${artikel.created_at.substring(0, 10)}</small></p>
                        </div>
                    </div>
                </div>
                `;
            });
            list.innerHTML = html;
        } else {
            list.innerHTML = `
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tidak ada artikel</h5>
                    </div>
                </div>
            </div>
            `;
        }
    }



</script>
@endpush
