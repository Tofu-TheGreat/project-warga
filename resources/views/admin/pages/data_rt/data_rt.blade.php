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
                            <li class="breadcrumb-item active" aria-current="page">Data RT</li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4  bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/dashboard" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3 p-1 rounded-circle"></i>
                            </a>
                            <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Data RT
                            </h2>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#modaltambah_rt" class="btn btn-info rounded-pill">
                            <i class="bi bi-patch-plus text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif
    <div class="container-fluid ">
        <div class="row ms-5">
            @foreach ($user as $show)
                <div class="col">
                    <div class="card person">

                        <a class="btn btn-danger btn-hapus" href="/hapus_rt/{{ $show->id_user }}" role="button">
                            <i class="bi bi-trash"></i>
                        </a>
                        <a class="btn btn-info btn-detail" href="/detail-rt/{{ $show->id_user }}" role="button">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-waring btn-warga" role="button">
                            <i class="bi bi-people"></i>
                        </a>

                        <div class="d-flex justify-content-center">
                            <div class="card-border-top">
                            </div>
                            <div class="mt-4">
                                @if ($show->foto == null)
                                    <img src="{{ asset('images/kosong.webp') }}" alt="foto" class="img-rt "
                                        src="#" alt="Preview">
                                @else
                                    <img src="../image_save/{{ $show->foto }}" alt="foto" class="img-rt "
                                        src="#" alt="Preview">
                                @endif
                            </div>
                        </div>
                        <span> {{ $show->nama_lengkap }}</span>
                        <p class="job"> {{ $show->nomor }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modaltambah_rt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-5 ">
                <div class="modal-header p-4 d-flex ">
                    <h1 class="modal-title fs-2 bold justify-center">Tambah Data RT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.rt') }}" id="myForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-5">
                        <input type="text" name="peran" value="rt" hidden>
                        <div class="row">
                            <div class="form-group col">
                                <label for="nama_lengkap">Nama Lengkap: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-person-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control capitalize @error('nama_lengkap') is-invalid @enderror"
                                        value="{{ old('nama_lengkap') }}" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Masukkan Nama Lengkap">
                                </div>
                                @error('nama_lengkap')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="nik">NIK: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-person-vcard-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control capitalize @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}" id="nik" name="nik"
                                        placeholder="Masukkan NIK">
                                </div>
                                @error('nik')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="alamat">Alamat: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi bi-geo-alt fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control capitalize @error('alamat') is-invalid @enderror"
                                        value="{{ old('alamat') }}" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat">
                                </div>
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="" class="form-label">Agama</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-book-half fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="agama" aria-label="Default select example">
                                        <option selected>Pilih di bawah ini</option>
                                        <option value="0">Islam</option>
                                        <option value="1">Kristen Protestan</option>
                                        <option value="2">Kristen Katolik</option>
                                        <option value="3">Khonghucu</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Buddha</option>
                                    </select>
                                </div>
                                @error('agama')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="tanggal_lahir">Tanggal lahir: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-calendar-event-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="date"
                                        class="form-control capitalize @error('tanggal_lahir') is-invalid @enderror"
                                        value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir"
                                        placeholder="Masukkan Tanggal lahir">
                                </div>
                                @error('tanggal_lahir')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="" class="form-label">Jenis kelamin</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-gender-ambiguous fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                        <option selected>Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                            Laki - Laki
                                        </option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                                @error('jenis_kelamin')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="status_perkawinan">Status Perkawinan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-postcard-heart-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="status_perkawinan"
                                        aria-label="Default select example">
                                        <option selected>Pilih di bawah ini</option>
                                        <option value="0">Sudah Menikah</option>
                                        <option value="1">Belum Menikah</option>
                                        <option value="2">Cerai</option>
                                    </select>
                                </div>
                                @error('status_perkawinan')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="status_kependudukan">Status Kependudukan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-geo-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="status_kependudukan"
                                        aria-label="Default select example">
                                        <option selected>Pilih di bawah ini</option>
                                        <option value="0">Menetap</option>
                                        <option value="1">Berkunjung</option>
                                    </select>
                                </div>
                            </div>
                            @error('status_kependudukan')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="kewarganegaraan">Kewarganegaraan: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-globe-americas fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="kewarganegaraan"
                                        aria-label="Default select example">
                                        <option selected>Pilih di bawah ini</option>
                                        <option value="0">WNI</option>
                                        <option value="1">WNA</option>
                                    </select>
                                </div>
                                @error('kewarganegaraan')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="nomor_telpon">Nomor Telepon: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-telephone-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="number"
                                        class="form-control capitalize @error('nomor_telpon') is-invalid @enderror"
                                        value="{{ old('nomor_telpon') }}" id="nomor_telpon" name="nomor_telpon"
                                        placeholder="Masukkan Nomor Telepon">
                                </div>
                                @error('nomor_telpon')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="nomor">Nomor RT: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-list-ol fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control capitalize @error('nomor') is-invalid @enderror"
                                        value="RT-{{ old('nomor') }}" id="nomor" name="nomor"
                                        placeholder="Masukkan Nomor Telepon">
                                </div>
                                @error('nomor')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="password">Password : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-key fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control capitalize @error('password') is-invalid @enderror"
                                        value="" id="password" name="password" placeholder="Masukkan Password ">
                                </div>
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> <label for="formFile" class="form-label">Foto (Opsional)</label>
                                <input class="form-control" name="foto" type="file" id="formFile"
                                    onchange="previewImage(event)">

                                <div class="mt-2">
                                    <img id="preview" src="#" alt="Preview"
                                        style="max-width: 200px; max-height: 200px; display: none;">
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="password_confirmation">Password Confirmation : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-key-fill fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control capitalize @error('password_confirmation') is-invalid @enderror"
                                        value="" id="password_confirmation" name="password_confirmation"
                                        placeholder="Masukkan Konfirmasi Password ">
                                </div>
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Menggunakan jQuery untuk menangani penyerahan formulir
    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form dari submit normal

            // Menampilkan SweetAlert loading
            Swal.fire({
                title: 'Loading...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: function() {
                    Swal.showLoading();
                }
            });

            // Submit formulir secara asinkron dengan menggunakan AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.close(); // Menutup SweetAlert loading setelah permintaan berhasil
                    // Tampilkan SweetAlert sukses
                    Swal.fire({
                        title: 'Sukses',
                        text: response
                            .message, // Anda dapat menyesuaikan pesan sukses dengan respons yang diterima dari server
                        icon: 'success'
                    }).then(function() {
                        // Redirect ke halaman lain jika perlu
                        window.location.href = '/datart';
                    });
                },
                error: function(xhr) {
                    Swal.close(); // Menutup SweetAlert loading jika terjadi kesalahan
                    // Tampilkan SweetAlert error
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memproses permintaan.',
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('.btn-hapus').on('click', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Submit formulir secara asinkron dengan menggunakan AJAX
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            _method: 'GET',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Tampilkan SweetAlert sukses
                            Swal.fire({
                                title: 'Sukses',
                                text: response.message,
                                icon: 'success'
                            }).then(function() {
                                // Refresh halaman setelah menghapus item
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan SweetAlert error
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat memproses permintaan.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });
</script>
