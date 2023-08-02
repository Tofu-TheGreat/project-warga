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
                            <li class="breadcrumb-item active" aria-current="page">Data Warga </li>
                        </ol>
                    </nav>
                </div>

                <div class="card p-3 px-4  bg-primary">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="/datart" class="d-inline text-info">
                                <i class="bi bi-arrow-left-circle-fill d-inline fs-3 p-1 rounded-circle"></i>
                            </a>
                            @foreach ($nomor as $show)
                                <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Data
                                    Warga {{ $show->nomor }}
                                </h2>
                            @endforeach
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#modaltambah_warga"
                            class="btn btn-info rounded-pill">
                            <i class="bi bi-patch-plus text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            <span class="badge bg-success p-2 px-3">{{ $count }}
                Total Warga</span>
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
    @endif
    <div class="container-fluid ">
        <div class="row card p-3 mx-2">
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        @foreach ($rt2 as $show)
                            <a href="/export/{{ $show->id_user }}" type="button" class="btn text-white justify-content-end"
                                style="background: linear-gradient(45deg, rgb(37, 94, 54), rgb(83, 196, 61));"><i
                                    class="bi bi-filetype-xlsx"></i> Export</a>
                        @endforeach
                    </div>
                    <div class="col-3 import-button">
                        <form action="">
                            <div class="input-group mb-3 ">
                                <label for="inputGroupFile03" class="btn input-group-text text-white"
                                    style="background: linear-gradient(45deg, rgb(137, 145, 72), rgb(216, 228, 58)); border-radius:5px">
                                    <i class="bi bi-database-fill-down p-2"> Import</i>
                                </label>
                                <input type="file" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
                                    aria-label="Upload" style="display:none;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table id="myTable" class="table table-bordered table-responsive table-striped">
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
                    <?php
                    $no = 0;
                    ?>
                    @foreach ($warga as $show)
                        <?php
                        $no++;
                        ?>
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $show->nama_lengkap }}</td>
                            <td>{{ $show->nik }}</td>
                            <td>{{ $show->agama == '0' ? 'Islam' : '' }}

                                {{ $show->agama == '1' ? 'Kristen Protestan' : '' }}
                                {{ $show->agama == '2' ? 'Kristen Katolik' : '' }}
                                {{ $show->agama == '3' ? 'Khonghucu' : '' }}
                                {{ $show->agama == '4' ? 'Hindu' : '' }}
                                {{ $show->agama == '5' ? 'Buddha' : '' }}
                            </td>
                            <td class="text-center">
                                @if ($show->jenis_kelamin == 'L')
                                    <span class="badge text-bg-primary rounded-circle p-2">
                                        <i class="bi bi-gender-male"></i>
                                    </span>
                                @else
                                    <span class="badge rounded-circle p-2" style="background-color: rgb(255, 146, 164)">
                                        <i class="bi bi-gender-female"></i>
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($show->status_kependudukan == '0')
                                    <span class="badge text-bg-success">
                                        Menetap
                                    </span>
                                @else
                                    <span class="badge text-bg-warning">
                                        Berkunjung
                                    </span>
                                @endif
                            </td>
                            <td>{{ $show->user->nomor }}</td>
                            <td>{{ $show->nomor_telpon }}</td>
                            {{-- Tombol Action --}}
                            <td class="">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <a class="dropdown-item has-icon text-info"
                                        href="/detail_warga/{{ $show->id_warga }}"><i class="far bi-eye"></i>
                                        Detail</a>
                                    <a class="dropdown-item has-icon text-warning" href="/edit-warga"><i
                                            class="far bi-pencil-square"></i>
                                        Edit</a>

                                    <a type="button" href="/hapus_warga/{{ $show->id_warga }}"
                                        class="confirm dropdown-item has-icon text-danger">
                                        <i class="far bi-trash-fill mt-2"></i><small>Hapus</small></a>

                                </ul>
                            </td>
                            {{-- Tombol Action --}}
                        </tr>
                    @endforeach
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
                <form action="{{ route('create.warga') }}" id="myForm" method="POST" enctype="multipart/form-data">
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
                                    <input type="text"
                                        class="form-control capitalize @error('nik') is-invalid @enderror"
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
                                    <select class="form-select " name="id_user" aria-label="Default select example">
                                        <option selected disabled>Pilih di bawah ini</option>
                                        @foreach ($rt as $show)
                                            <option value="{{ $show->id_user }}">
                                                {{ $show->nomor }} | {{ $show->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_user')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="id_pekerjaan">Pekerjaan Warga : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text ">
                                            <i class="bi bi-briefcase fs-2"></i>
                                        </div>
                                    </div>
                                    <select class="form-select " name="id_pekerjaan" aria-label="Default select example">
                                        <option selected disabled>Pilih di bawah ini</option>
                                        @foreach ($pekerjaan as $show)
                                            <option value="{{ $show->id_pekerjaan }}">{{ $show->nama_pekerjaan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_pekerjaan')
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- DATA TABLES --}}
<script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
{{-- SELECT2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script> --}}

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        var preview = document.getElementById('preview');

        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(event.target.files[0]);
    }
</script>
{{--
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
                        // Redirect to the previous page
                        window.history.back();
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
</script> --}}
