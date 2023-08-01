@extends('admin.pages.index')

@section('konten')
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif
    <!-- Di dalam file blade -->
    @if (session('error'))
        <p class="alert alert-danger"> {{ session('error') }}</p>
    @endif

    <div class=" mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item"><a href="/profile" class="link">Profile</a></li>
                            <li class="breadcrumb-item"><a class="link">Ubah-Profile</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4 bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/dashboard" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                            </a>
                            <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:13px; left: 60px">Edit
                                Profile
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body ">
                        {{-- @foreach ($user as $show) --}}
                        <form action="{{ route('edit.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden name="id_user" value="{{ auth()->user()->id_user }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="justify-content-center mt-3 ms-4">
                                        @if (auth()->user()->foto == null)
                                            <img src="{{ asset('images/kosong.webp') }}" alt="foto"
                                                class="foto-user w-75 rounded-circle">
                                        @else
                                            <img src="../image_save/{{ auth()->user()->foto }}" alt="foto"
                                                class="foto-user w-75 rounded-circle">
                                        @endif
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
                                                            <i class="bi fs-2 bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control capitalize @error('nama_lengkap') is-invalid @enderror"
                                                        value="{{ auth()->user()->nama_lengkap }}" id="nama_lengkap"
                                                        name="nama_lengkap">
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
                                                            <i class="bi fs-2 bi-person-vcard-fill"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        value="{{ auth()->user()->nik }}" id="nik" name="nik">
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
                                                            <i class="bi fs-2 bi-geo-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        value="{{ auth()->user()->alamat }}" id="alamat" name="alamat">
                                                </div>
                                                @error('alamat')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nomor">Nomor RT : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="bi fs-2 bi-list-ol"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control phone @error('nomor') is-invalid @enderror"
                                                        value="{{ auth()->user()->nomor }}" id="nomor" name="nomor">
                                                </div>
                                                @error('nomor')
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
                                                            <i class="bi fs-2 bi-book-half"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="agama"
                                                        aria-label="Default select example">
                                                        <option>Pilih di bawah ini</option>
                                                        <option value="0"
                                                            {{ auth()->user()->agama == '0' ? 'selected' : '' }}>
                                                            Islam
                                                        </option>
                                                        <option value="1"
                                                            {{ auth()->user()->agama == '1' ? 'selected' : '' }}>Kristen
                                                            Protestan</option>
                                                        <option value="2"
                                                            {{ auth()->user()->agama == '2' ? 'selected' : '' }}>Kristen
                                                            Katolik
                                                        </option>
                                                        <option value="3"
                                                            {{ auth()->user()->agama == '3' ? 'selected' : '' }}>Khonghucu
                                                        </option>
                                                        <option value="4"
                                                            {{ auth()->user()->agama == '4' ? 'selected' : '' }}>Hindu
                                                        </option>
                                                        <option value="5"
                                                            {{ auth()->user()->agama == '5' ? 'selected' : '' }}>Buddha
                                                        </option>
                                                    </select>
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
                                                            <i class="bi fs-2 bi-gender-ambiguous"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="jenis_kelamin"
                                                        aria-label="Default select example">
                                                        <option>Jenis Kelamin</option>
                                                        <option value="L"
                                                            {{ auth()->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                            Laki - Laki
                                                        </option>
                                                        <option value="P"
                                                            {{ auth()->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>
                                                    </select>
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
                                                    <i class="bi fs-2 bi-postcard-heart-fill"></i>
                                                </div>
                                            </div>
                                            <select class="form-select" name="status_perkawinan"
                                                aria-label="Default select example">
                                                <option>Pilih di bawah ini</option>
                                                <option value="0"
                                                    {{ auth()->user()->status_perkawinan == '0' ? 'selected' : '' }}>Sudah
                                                    Menikah</option>
                                                <option value="1"
                                                    {{ auth()->user()->status_perkawinan == '1' ? 'selected' : '' }}>Belum
                                                    Menikah</option>
                                                <option value="2"
                                                    {{ auth()->user()->status_perkawinan == '2' ? 'selected' : '' }}>Cerai
                                                </option>
                                            </select>
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
                                                    <i class="bi fs-2 bi-geo-fill"></i>
                                                </div>
                                            </div>
                                            <select class="form-select" name="status_kependudukan"
                                                aria-label="Default select example">
                                                <option>Pilih di bawah ini</option>
                                                <option value="0"
                                                    {{ auth()->user()->status_kependudukan == '0' ? 'selected' : '' }}>
                                                    Menetap
                                                </option>
                                                <option value="1"
                                                    {{ auth()->user()->status_kependudukan == '1' ? 'selected' : '' }}>
                                                    Berkunjung</option>
                                            </select>
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
                                                    <i class="bi fs-2 bi-stack"></i>
                                                </div>
                                            </div>

                                            <select class="form-select  @error('peran') is-invalid @enderror"
                                                name="peran" aria-label="Default select example">
                                                <option>Pilih dibawah ini</option>
                                                <option value="rt"
                                                    {{ auth()->user()->peran == 'rt' ? 'selected' : '' }}>
                                                    RT
                                                </option>
                                                <option value="rw"
                                                    {{ auth()->user()->peran == 'rw' ? 'selected' : '' }}>
                                                    RW
                                                </option>
                                            </select>
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
                                                    <i class="bi fs-2 bi-globe-americas"></i>
                                                </div>
                                            </div>
                                            <select class="form-select" name="kewarganegaraan"
                                                aria-label="Default select example">
                                                <option selected>Pilih di bawah ini</option>
                                                <option value="0"
                                                    {{ auth()->user()->kewarganegaraan == '0' ? 'selected' : '' }}>WNI
                                                </option>
                                                <option value="1"
                                                    {{ auth()->user()->kewarganegaraan == '1' ? 'selected' : '' }}>WNA
                                                </option>
                                            </select>
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
                                                    <i class="bi fs-2 bi-briefcase"></i>
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('id_pekerjaan') is-invalid @enderror"
                                                value="{{ auth()->user()->peran == 'rt' ? 'RT' : 'RW' }}" disabled>
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
                                                    <i class="bi fs-2 bi-telephone-fill"></i>
                                                </div>
                                            </div>

                                            <input type="text"
                                                class="form-control @error('nomor_telpon') is-invalid @enderror"
                                                value="{{ auth()->user()->nomor_telpon }}" id="nomor_telpon"
                                                name="nomor_telpon">
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
                                                <i class="bi fs-2 bi-calendar-event-fill"></i>
                                            </div>
                                        </div>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            value="{{ auth()->user()->tanggal_lahir }}" id="tanggal_lahir"
                                            name="tanggal_lahir">
                                    </div>
                                    @error('tanggal_lahir')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_lama">Masukkan Password Lama: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text ">
                                                <i class="bi fs-2 bi-key"></i>
                                            </div>
                                        </div>
                                        <input type="password"
                                            class="form-control capitalize @error('password_lama') is-invalid @enderror"
                                            id="password_lama" name="password_lama">
                                    </div>
                                    @error('password_lama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="card bg-info">
                                <h3 class="text-center text-white p-1">Isi dibawah ini Jika Ingin Mengubah Password</h3>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password_baru">Password Baru : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi fs-2 bi-key-fill"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control phone @error('password_baru') is-invalid @enderror"
                                                id="password_baru" name="password_baru">
                                        </div>
                                        @error('password_baru')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password_baru_ulang">Ulangi Password Baru : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi fs-2 bi-key-fill"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control phone @error('password_baru_ulang') is-invalid @enderror"
                                                id="password_baru_ulang" name="password_baru_ulang">
                                        </div>
                                        @error('password_baru_ulang')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <a type="button" href="/profile" class="btn btn-secondary me-2">Keluar</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                        {{-- @endforeach --}}
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
