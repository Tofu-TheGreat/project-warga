@extends('admin.pages.index')

@section('konten')
    <div class=" mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data RT</li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 bg-primary">
                    <div class=" d-flex justify-content-between">
                        <h1 class="mb-0 fw-bold text-white">Data RT</h1>
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
                        <div class="card-border-top">
                        </div>
                        <div class="img">
                        </div>
                        <span> {{ $show->nama_lengkap }}</span>
                        <p class="job"> {{ $show->nomor }}</p>
                        <button> Click
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="modaltambah_rt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-5">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.rt') }}" id="warga_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="peran" value="rt" hidden>
                        <div class="row">
                            <div class="col"><label for="" class="form-label">Nama Lengkap</label><input
                                    class="form-control" name="nama_lengkap" type="text" placeholder="Nama Lengkap"
                                    aria-label="default input example"></div>
                            <div class="col"><label for="" class="form-label">NIK</label><input
                                    class="form-control" type="text" name="nik" maxlength="16" placeholder="NIK"
                                    aria-label="default input example"></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col"><label for="" class="form-label">Alamat</label><input
                                    class="form-control" type="text" name="alamat" placeholder="Alamat Lengkap"
                                    aria-label="default input example"></div>
                            <div class="col">
                                <label for="" class="form-label">Agama</label>
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
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label for="" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tanggal_lahir"
                                    aria-label="default input example">
                            </div>
                            <div class="col"><label for="" class="form-label">Jenis Kelamin</label> <select
                                    class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col"><label for="" class="form-label">Status Perkawinan</label>
                                <select class="form-select" name="status_perkawinan" aria-label="Default select example">
                                    <option selected>Pilih di bawah ini</option>
                                    <option value="0">Sudah Menikah</option>
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Cerai</option>
                                </select>
                            </div>
                            <div class="col"><label for="" class="form-label">Status Kependudukan</label>
                                <select class="form-select" name="status_kependudukan"
                                    aria-label="Default select example">
                                    <option selected>Pilih di bawah ini</option>
                                    <option value="0">Menetap</option>
                                    <option value="1">Berkunjung</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col"><label for="" class="form-label">Kewarganegaraan</label>
                                <select class="form-select" name="kewarganegaraan" aria-label="Default select example">
                                    <option selected>Pilih di bawah ini</option>
                                    <option value="0">WNI</option>
                                    <option value="1">WNA</option>
                                </select>
                            </div>
                            <div class="col"><label for="" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="text" placeholder="Nomor Telepon"
                                    name="nomor_telpon" aria-label="default input example">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col"> <label for="formFile" class="form-label">Foto (Opsional)</label>
                                <input class="form-control" name="foto" type="file" id="formFile">
                            </div>
                            <div class="col"> <label for="formFile" class="form-label">Nomor RT</label>
                                <input class="form-control" name="nomor" type="text" value="RT-">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col"><input class="form-control" type="password" placeholder="Password"
                                    name="password" aria-label="default input example"></div>
                            <div class="col"><input class="form-control" type="password"
                                    placeholder="Konfirmasi Password" name="password_confirmation"
                                    aria-label="default input example"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script>
    // Fungsi untuk menampilkan SweetAlert2 saat submit berhasil
    function showSuccessAlert() {
        Swal.fire({
            title: 'Sukses',
            text: 'Data berhasil disimpan.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }

    // Fungsi untuk menampilkan SweetAlert2 saat submit gagal
    function showErrorAlert() {
        Swal.fire({
            title: 'Error',
            text: 'Terjadi kesalahan saat menyimpan data.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }

    // Mendengarkan event submit form
    document.getElementById('warga_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form submit secara default

        // Menggunakan AJAX atau Fetch untuk mengirim data form secara asynchronous
        // ...

        // Setelah berhasil atau gagal menyimpan data, panggil fungsi yang sesuai
        // Contoh:
        // Jika sukses:
        showSuccessAlert();
        // Jika gagal:
        // showErrorAlert();
    });
</script>
