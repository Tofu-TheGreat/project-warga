@extends('admin.pages.index')

@section('konten')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                    </ol>
                </nav>
            </div>

            <div class="card p-4 px-4 bg-primary">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="/dashboard" class="d-inline text-info">
                            <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                        </a>
                        <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:19px; left: 60px">Dahboard <span
                                class="uppercase">{{ auth()->user()->peran }}</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12 ">
                <div class="jumlah-data jumlah-data-1">
                    <p class="jumlah-title"><span>Jumlah RT</span></p>
                    <p class="jumlah">{{ $rt }} RT</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi-account-network"></i>
                    <a href="/datart" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12">
                <div class="jumlah-data jumlah-data-2">
                    <p class="jumlah-title"><span>Jumlah Warga</span></p>
                    <p class="jumlah">{{ $warga }} Warga</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi mdi-human-male-female"></i>
                    <a href="/data_warga" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12">
                <div class="jumlah-data jumlah-data-3">
                    <p class="jumlah-title"><span>Jumlah Pekerjaan</span></p>
                    <p class="jumlah">{{ $pekerjaan }} Pekerjaan</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi-briefcase"></i>
                    <a href="/data_pekerjaan" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title uppercase">Halo, {{ auth()->user()->peran }}</h4>
                                <h6 class="card-subtitle">Chart Warga</h6>
                            </div>
                            <div class="ms-auto d-flex no-block align-items-center">
                                <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                    <li class="list-inline-item d-flex align-items-center text-info"><i
                                            class="fa fa-circle font-10 me-1"></i> Warga
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <canvas id="myChart"></canvas>
                        <div class="amp-pxl mt-4">
                            <div class="chartist-tooltip"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <h4 class="card-header d-flex">
                        <strong>Daftar RT</strong>
                        <a role="button" href="/datart" class="btn btn-info rounded-pill text-white"
                            style="position:absolute; right:25px;top:10px"><i class="bi bi-eye"></i></a>
                    </h4>
                    <div class="card-body">
                        @foreach ($datart as $show)
                            <div class="my-2 pb-3 d-flex align-items-center">
                                <span class="d-flex align-items-center mb-2">
                                    @if ($show->foto == null)
                                        <img src="{{ asset('images/kosong.webp') }}" alt="foto"
                                            class="foto-user rounded-circle" width="60px">
                                    @else
                                        <img src="../image_save/{{ $show->foto }}" alt="foto"
                                            class="foto-user rounded-circle" width="60px">
                                    @endif
                                </span>
                                <div class="ms-3">
                                    <h5 class="mb-0 fw-bold">{{ $show->nama_lengkap }}</h5>
                                    <span class="text-muted fs-6">{{ $show->nomor }}</span>
                                </div>


                                <div class="ms-auto">
                                    <span class="badge bg-light text-muted">
                                        {{ $datawarga->where('id_user', $show->id_user)->count() }} Warga</span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/chart_warga',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Proses data yang diterima untuk menghasilkan chart
                // Contoh penggunaan library chart.js untuk membuat chart
                var labels = [];
                var counts = [];

                data.forEach(function(item) {
                    labels.push(item.date);
                    counts.push(item.count);
                });

                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Warga',
                            data: counts,
                            backgroundColor: 'rgba(0, 123, 255, 0.2)',
                            borderColor: 'rgba(0, 123, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    });
</script>
