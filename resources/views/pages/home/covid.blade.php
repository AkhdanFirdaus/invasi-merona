@extends('layouts.home')

@section('content')
<div class="row mt-5">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title"><i class="fas fa-info-circle"></i> Informasi Covid</h2>
                <p class="card-title small">Dimuat pada: <div id="load-time"></div>
                </p>
                <div class="row row-cols-1 row-cols-md-2 g-2 my-3">
                    <div class="col">
                        <div class="card bg-warning">
                            <div class="card-body text-center">
                                <h5 class="card-title">Positif</h5>
                                <h2 id="covid-positif">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Sembuh</h5>
                                <h2 id="covid-sembuh">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger">
                            <div class="card-body text-center">
                                <h5 class="card-title">Meninggal</h5>
                                <h2 id="covid-meninggal">Loading</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title">Dirawat</h5>
                                <h2 id="covid-dirawat">Loading</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    axios.get('/api/covid-summary').then(function(response) {
            console.log(response.data);
            document.getElementById('covid-positif').innerHTML = response.data[0]['positif'];
            document.getElementById('covid-sembuh').innerHTML = response.data[0]['sembuh'];
            document.getElementById('covid-meninggal').innerHTML = response.data[0]['meninggal'];
            document.getElementById('covid-dirawat').innerHTML = response.data[0]['dirawat'];
            document.getElementById('load-time').innerHTML = Date();
        });
</script>
@endpush
@endsection
