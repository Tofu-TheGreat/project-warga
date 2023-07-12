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

            <div class="card p-3 px-4 bg-primary">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="/dashboard" class="d-inline text-info">
                            <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                        </a>
                        <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Dahboard siapa
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12">
                <div class="jumlah-data jumlah-data-1">
                    <p class="jumlah-title"><span>Jumlah RT</span></p>
                    <p class="jumlah">20 (misalkan)</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi-account-network"></i>
                </div>
            </div>
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12">
                <div class="jumlah-data jumlah-data-2">
                    <p class="jumlah-title"><span>Jumlah Warga</span></p>
                    <p class="jumlah">20 (misalkan)</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi mdi-human-male-female"></i>
                </div>
            </div>
            <div class="col-lg-4 mt-2 col-md-6 col-sm-6 col-12">
                <div class="jumlah-data jumlah-data-3">
                    <p class="jumlah-title"><span>Jumlah Pekerjaan</span></p>
                    <p class="jumlah">20 (misalkan)</p>
                    <i width="1em" height="1em" class="icon-jumlah mdi mdi-briefcase"></i>
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
                                <h4 class="card-title">Halo, siapa</h4>
                                <h6 class="card-subtitle">Chart Warga</h6>
                            </div>
                            <div class="ms-auto d-flex no-block align-items-center">
                                <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                    <li class="list-inline-item d-flex align-items-center text-info"><i
                                            class="fa fa-circle font-10 me-1"></i> Ample
                                    </li>
                                    <li class="list-inline-item d-flex align-items-center text-primary"><i
                                            class="fa fa-circle font-10 me-1"></i> Pixel
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="amp-pxl mt-4" style="height: 350px;">
                            <div class="chartist-tooltip"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar RT</h4>
                        <div class="mt-5 pb-3 d-flex align-items-center">
                            <span class="btn btn-primary btn-circle d-flex align-items-center">
                                <i class="mdi mdi-cart-outline fs-4"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bold">Top Sales</h5>
                                <span class="text-muted fs-6">Johnathan Doe</span>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-light text-muted">+68%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
