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
                            <li class="breadcrumb-item"><a href="/data-pekerjaan" class="link">Data Pekerjaan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pekerjaan</li>
                        </ol>
                    </nav>
                </div>
                @foreach ($pekerjaan as $show)
                    <div class="card p-3 px-4 bg-primary">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="/data-pekerjaan" class="d-inline text-info">
                                    <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                                </a>
                                <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:12px; left: 60px">Detail
                                    Pekerjaan
                                </h2>
                            </div>
                            {{-- @foreach ($user as $show) --}}
                            <a href="/edit_pekerjaan/{{ $show->id_pekerjaan }}" class="btn btn-info rounded-pill btn-edit"
                                role="button">
                                <i class="bi bi-pencil text-white"></i>
                            </a>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                @endforeach
                @foreach ($pekerjaan as $show)
                    <div class="card">
                        <div class="card-body ">
                            {{-- @foreach ($user as $show) --}}
                            <form action="/administrator" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="nama_pekerjaan">Nama Pekerjaan: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text ">
                                                                <i class="bi bi-briefcase fs-2"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control capitalize @error('nama_pekerjaan') is-invalid @enderror"
                                                            value="{{ $show->nama_pekerjaan }}" id="nama_pekerjaan"
                                                            name="nama_pekerjaan" readonly>
                                                    </div>
                                                    @error('nama_pekerjaan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                @endforeach

                </section>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda ingin mengedit item ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Proceed with the edit by redirecting to the specified URL
                    window.location.href = url;
                }
            });
        });
    });
</script>
