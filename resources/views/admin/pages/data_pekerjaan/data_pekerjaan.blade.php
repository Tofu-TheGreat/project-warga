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
                            <li class="breadcrumb-item active" aria-current="page">Data Pekerjaan</li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4  bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/dashboard" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3 p-1 rounded-circle"></i>
                            </a>
                            <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Data
                                Pekerjaan
                            </h2>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#modaltambah_pekerjaan"
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
        <div class="row card p-3 mx-2">
            <table id="myTable1" class="table table-bordered table-responsive table-striped">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Kuli Bangunan</td>
                        {{-- Tombol Action --}}
                        <td class="">
                            <a class="btn btn-primary dropdown-toggle show" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
                            </a>
                            <ul class="dropdown-menu ">
                                <a class="dropdown-item has-icon text-info" href="/detail-pekerjaan"><i
                                        class="far bi-eye"></i>
                                    Detail</a>
                                <a class="dropdown-item has-icon text-warning" href="/edit-pekerjaan"><i
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
    <div class="modal fade" id="modaltambah_pekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-5 ">
                <div class="modal-header p-4 d-flex ">
                    <h1 class="modal-title fs-2 bold justify-center">Tambah Data Pekerjaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.rt') }}" id="pekerjaan_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-5">
                        <input type="text" name="peran" value="pekerjaan" hidden>
                        <div class="row">
                            <div class="form-group col">
                                <label for="nama_pekerjaan">Nama Pekerjaan : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-briefcase fs-2"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control capitalize @error('nama_pekerjaan') is-invalid @enderror"
                                        value="{{ old('nama_pekerjaan') }}" id="nama_pekerjaan" name="nama_pekerjaan"
                                        placeholder="Masukkan Nama Pekerjaan">
                                </div>
                                @error('nama_pekerjaan')
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
    document.getElementById('pekerjaan_form').addEventListener('submit', function(event) {
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- DATA TABLES --}}
<script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable1');
    });
</script>
