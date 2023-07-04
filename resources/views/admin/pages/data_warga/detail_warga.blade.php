@extends('admin.pages.index')

@section('konten')
    <div class=" mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item"><a href="/datawarga" class="link">Data Warga</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Warga</li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4 bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/datawarga" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                            </a>
                            <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Detail
                                Warga
                            </h2>
                        </div>
                        <a href="/edit" class="btn btn-info rounded-pill" role="button">
                            <i class="bi bi-pencil text-white "></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body ">
                        <form action="/administrator" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="justify-content-center mt-3 ms-4">
                                        <img src="{{ asset('images/logo-sidawar-icon.png') }}" alt="foto"
                                            class="foto-user w-75 rounded-circle">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text ">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control capitalize @error('nama_lengkap') is-invalid @enderror"
                                                        value="" id="nama_lengkap" name="nama_lengkap" readonly>
                                                </div>
                                                @error('nama_lengkap')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-person-vcard-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        value="" id="nik" name="nik" readonly>
                                                </div>
                                                @error('nik')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="alamat">Alamat : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-geo-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        value="" id="alamat" name="alamat" readonly>
                                                </div>
                                                @error('alamat')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="user_id">Dari RT : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-list-ol"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control phone @error('user_id') is-invalid @enderror"
                                                        value="" id="user_id" name="user_id" readonly>
                                                </div>
                                                @error('user_id')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="agama">Agama : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-book-half"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('agama') is-invalid @enderror"
                                                        value="" id="agama" name="agama" readonly>
                                                </div>
                                                @error('agama')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis kelamin : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi bi-gender-ambiguous"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                        value="" id="jenis_kelamin" name="jenis_kelamin" readonly>
                                                </div>
                                                @error('jenis_kelamin')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status_perkawinan">Status Perkawinan : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text ">
                                                    <i class="bi bi-postcard-heart-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control capitalize @error('status_perkawinan') is-invalid @enderror"
                                                value="" id="status_perkawinan" name="status_perkawinan" readonly>
                                        </div>
                                        @error('status_perkawinan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status_kependudukan">Status kependudukan : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-geo-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('status_kependudukan') is-invalid @enderror"
                                                value="" id="status_kependudukan" name="status_kependudukan"
                                                readonly>
                                        </div>
                                        @error('status_kependudukan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="peran">Peran : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-stack"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('peran') is-invalid @enderror" value=""
                                                id="peran" name="peran" readonly>
                                        </div>
                                        @error('peran')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kewarganegaraan">Kewarganegaraan </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-globe-americas"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control phone @error('kewarganegaraan') is-invalid @enderror"
                                                value="" id="kewarganegaraan" name="kewarganegaraan" readonly>
                                        </div>
                                        @error('kewarganegaraan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="id_pekerjaan">Pekerjaan : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-briefcase"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('id_pekerjaan') is-invalid @enderror"
                                                value="" id="id_pekerjaan" name="id_pekerjaan" readonly>
                                        </div>
                                        @error('id_pekerjaan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nomor_telpon">Nomor telpon : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-telephone-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('nomor_telpon') is-invalid @enderror"
                                                value="" id="nomor_telpon" name="nomor_telpon" readonly>
                                        </div>
                                        @error('nomor_telpon')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar-event-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="" id="tanggal_lahir" name="tanggal_lahir" readonly>
                                    </div>
                                    @error('tanggal_lahir')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
@endsection
