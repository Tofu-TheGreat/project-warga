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
                                Pekerjaan<span class="badge bg-secondary">{{ $count }}
                                    Total Pekerjaan</span>
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
                    @foreach ($pekerjaan as $show)
                        <tr>
                            <th scope="row">{{ $show->id_pekerjaan }}</th>
                            <td>{{ $show->nama_pekerjaan }}</td>
                            {{-- Tombol Action --}}
                            <td class="">
                                <a class="btn btn-primary dropdown-toggle show" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical btn-tambah-data"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <a class="dropdown-item has-icon text-info"
                                        href="/detail_pekerjaan/{{ $show->id_pekerjaan }}"><i class="far bi-eye"></i>
                                        Detail</a>
                                    <a class="dropdown-item has-icon text-warning"
                                        href="/edit_pekerjaan/{{ $show->id_pekerjaan }}"><i
                                            class="far bi-pencil-square"></i>
                                        Edit</a>

                                    <a type="button" href="/hapus_pekerjaan/{{ $show->id_pekerjaan }}"
                                        class="confirm dropdown-item has-icon text-danger btn-hapus">
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
    <div class="modal fade" id="modaltambah_pekerjaan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-5 ">
                <div class="modal-header p-4 d-flex ">
                    <h1 class="modal-title fs-2 bold justify-center">Tambah Data Pekerjaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.pekerjaan') }}" method="POST" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-5">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    // Show loading overlay
                    Swal.fire({
                        title: 'Loading',
                        html: 'Menghapus item...',
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form asynchronously using AJAX
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            _method: 'GET',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Hide loading overlay
                            Swal.close();

                            // Show success Swal alert
                            Swal.fire({
                                title: 'Sukses',
                                text: response.message,
                                icon: 'success'
                            }).then(function() {
                                // Redirect to the specified route
                                window.location.href =
                                    '{{ route('show.rt') }}';
                            });
                        },
                        error: function(xhr) {
                            // Hide loading overlay
                            Swal.close();

                            // Show error Swal alert
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
                        window.location.href = '/data_pekerjaan';
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
