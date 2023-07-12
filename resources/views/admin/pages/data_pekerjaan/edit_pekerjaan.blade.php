@extends('admin.pages.index')

@section('konten')
    <div class=" mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                {{-- @foreach ($user as $show) --}}
                @foreach ($pekerjaan as $show)
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item"><a href="/data_pekerjaan" class="link">Data Pekerjaan</a></li>
                                <li class="breadcrumb-item"><a href="/detail_pekerjaan/{{ $show->id_pekerjaan }}"
                                        class="link">Detail
                                        Pekerjaan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Pekerjaan</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card p-3 px-4 bg-primary">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="/detail_pekerjaan/{{ $show->id_pekerjaan }}" class="d-inline text-info">
                                    <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                                </a>
                                <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:12px; left: 60px">Edit
                                    Pekerjaan
                                </h2>
                            </div>
                            <a href="/hapus_pekerjaan/{{ $show->id_pekerjaan }}"
                                class="btn btn-danger rounded-pill btn-hapus" role="button">
                                <i class="bi bi-trash text-white "></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                @foreach ($pekerjaan as $show)
                    <div class="card">
                        <div class="card-body ">
                            {{-- @foreach ($user as $show) --}}
                            <form action="{{ route('edit.pekerjaan.action') }}" id="myForm" method="post"
                                enctype="multipapekerjaan/form-data">
                                @csrf
                                <input type="text" name="id_pekerjaan" value="{{ $show->id_pekerjaan }}" hidden
                                    id="">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Pekerjaan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text ">
                                                                <i class="bi bi-briefcase fs-2"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nama_pekerjaan') is-invalid @enderror"
                                                            value="{{ $show->nama_pekerjaan }}" id="nama_pekerjaan"
                                                            name="nama_pekerjaan">
                                                    </div>
                                                    @error('nama_pekerjaan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <a type="button" href="/data_pekerjaan" class="btn btn-secondary me-2">Keluar</a>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                @endforeach
                </section>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalepekerjaan2@11"></script>
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
                                    '{{ route('show.pekerjaan') }}';
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
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function() {
        // Update image preview when the page loads
        var fotoInput = document.getElementById('foto');
        if (fotoInput && fotoInput.files.length > 0) {
            previewImage({
                target: {
                    files: [fotoInput.files[0]]
                }
            });
        }

        // Update image preview when the image input changes
        $('#foto').on('change', function(event) {
            previewImage(event);
        });

        $('#myForm').on('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Loading...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: function() {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.close();
                    Swal.fire({
                        title: 'Sukses',
                        text: response.message,
                        icon: 'success'
                    }).then(function() {
                        window.location.href = '{{ route('show.pekerjaan') }}';
                    });
                },
                error: function(xhr) {
                    Swal.close();
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
