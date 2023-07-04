@extends('admin.pages.index')

@section('konten')
    <div class="mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                        class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4  bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/dashboard" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3 p-1 rounded-circle"></i>
                            </a>
                            <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Data Warga
                            </h2>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#modaltambah_warga"
                            class="btn btn-info rounded-pill">
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
        <div class="row card mx-2">
            <table class="table table-bordered table-responsive table-striped">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Kependudukan</th>
                        <th>RT</th>
                        <th>Nomor Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pasya Abinaya Al mala</td>
                        <td>1050245708900002</td>
                        <td>Islam</td>
                        <td class="text-center">
                            <span class="badge text-bg-primary rounded-circle p-2">
                                <i class="bi bi-gender-male"></i>
                            </span>
                            <span class="badge rounded-circle p-2" style="background-color: rgb(255, 146, 164)">
                                <i class="bi bi-gender-female"></i>
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge text-bg-success">
                                Menetap
                            </span>
                            <span class="badge text-bg-warning">
                                Berkunjung
                            </span>
                        </td>
                        <td>1</td>
                        <td>08887878379</td>
                        {{-- Tombol Action --}}
                        <td class="">
                            <a class="btn btn-primary dropdown-toggle show" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
                            </a>
                            <ul class="dropdown-menu ">
                                <a class="dropdown-item has-icon text-info" href="/detail-warga"><i class="far bi-eye"></i>
                                    Detail</a>
                                <a class="dropdown-item has-icon text-warning" href="/edit-warga"><i
                                        class="far bi-pencil-square"></i>
                                    Edit</a>
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="confirm dropdown-item has-icon text-danger">
                                        <i class="far bi-trash-fill mt-2"></i><small>Hapus</small></button>
                                </form>
                            </ul>
                        </td>
                        {{-- Tombol Action --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modaltambah_warga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-5 ">
                <div class="modal-header p-4 d-flex ">
                    <h1 class="modal-title fs-2 bold justify-center">Tambah Data Warga</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.rt') }}" id="warga_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-5">
                        <input type="text" name="peran" value="warga" hidden>
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
                                <label for="id_user">Dari RT : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-person-square fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" name="id_user" aria-label="Default select example">
                                        <option selected>Pilih di bawah ini</option>
                                    </select>
                                </div>
                                @error('id_user')
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
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
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
<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
