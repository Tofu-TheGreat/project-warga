@extends('admin.pages.index')

@section('konten')
    <div class=" mx-2">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                @foreach ($user as $show)
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="/dashboard" class="link"><i
                                            class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item"><a href="/datart" class="link">Data Rt</a></li>
                                <li class="breadcrumb-item"><a href="/detail-rt/{{ $show->id_user }}" class="link">Detail
                                        Rt</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit RT</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card p-3 px-4 bg-primary">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="/datart" class="d-inline text-info">
                                    <i class="bi bi-arrow-left-circle-fill d-inline fs-3  rounded-circle"></i>
                                </a>
                                <h2 class="mb-0 fw-bold text-white" style="position: absolute; top:17px; left: 60px">Edit RT
                                </h2>
                            </div>
                            <a href="/hapus_rt/{{ $show->id_user }}" class="btn btn-danger rounded-pill btn-hapus"
                                role="button">
                                <i class="bi bi-trash text-white "></i>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body ">
                            @foreach ($user as $show)
                                <form action="{{ route('edit.rt.action') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="foto" value="{{ $show->foto }}" hidden>
                                    <input type="text" name="id_user" value="{{ $show->id_user }}" hidden id="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="justify-content-center mt-3 ms-4">
                                                @if ($show->foto == null)
                                                    <img src="{{ asset('images/kosong.webp') }}" alt="foto"
                                                        class="foto-user w-75 rounded-circle" id="preview" src="#"
                                                        alt="Preview">
                                                @else
                                                    <img src="../image_save/{{ $show->foto }}" alt="foto"
                                                        class="foto-user w-75 rounded-circle" id="preview" src="#"
                                                        alt="Preview">
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
                                                                    <i class="bi bi-person-fill fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control capitalize @error('nama_lengkap') is-invalid @enderror"
                                                                value="{{ $show->nama_lengkap }}" id="nama_lengkap"
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
                                                                    <i class="bi bi-person-vcard-fill fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control @error('nik') is-invalid @enderror"
                                                                value="{{ $show->nik }}" id="nik" name="nik">
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
                                                                    <i class="bi bi-geo-alt fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control @error('alamat') is-invalid @enderror"
                                                                value="{{ $show->alamat }}" id="alamat" name="alamat">
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
                                                                    <i class="bi bi-list-ol fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control phone @error('nomor') is-invalid @enderror"
                                                                value="{{ $show->nomor }}" id="nomor"
                                                                name="nomor">
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
                                                                    <i class="bi bi-book-half fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <select class="form-select" name="agama"
                                                                aria-label="Default select example">
                                                                <option>Pilih di bawah ini</option>
                                                                <option value="0"
                                                                    {{ $show->agama == '0' ? 'selected' : '' }}>Islam
                                                                </option>
                                                                <option value="1"
                                                                    {{ $show->agama == '1' ? 'selected' : '' }}>Kristen
                                                                    Protestan</option>
                                                                <option value="2"
                                                                    {{ $show->agama == '2' ? 'selected' : '' }}>Kristen
                                                                    Katolik
                                                                </option>
                                                                <option value="3"
                                                                    {{ $show->agama == '3' ? 'selected' : '' }}>Khonghucu
                                                                </option>
                                                                <option value="4"
                                                                    {{ $show->agama == '4' ? 'selected' : '' }}>Hindu
                                                                </option>
                                                                <option value="5"
                                                                    {{ $show->agama == '5' ? 'selected' : '' }}>Buddha
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
                                                                    <i class="bi bi-gender-ambiguous fs-2"></i>
                                                                </div>
                                                            </div>
                                                            <select class="form-select" name="jenis_kelamin"
                                                                aria-label="Default select example">
                                                                <option>Jenis Kelamin</option>
                                                                <option value="L"
                                                                    {{ $show->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                                    Laki - Laki
                                                                </option>
                                                                <option value="P"
                                                                    {{ $show->jenis_kelamin == 'P' ? 'selected' : '' }}>
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
                                                            <i class="bi bi-postcard-heart-fill fs-2"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="status_perkawinan"
                                                        aria-label="Default select example">
                                                        <option>Pilih di bawah ini</option>
                                                        <option value="0"
                                                            {{ $show->status_perkawinan == '0' ? 'selected' : '' }}>Sudah
                                                            Menikah</option>
                                                        <option value="1"
                                                            {{ $show->status_perkawinan == '1' ? 'selected' : '' }}>Belum
                                                            Menikah</option>
                                                        <option value="2"
                                                            {{ $show->status_perkawinan == '2' ? 'selected' : '' }}>Cerai
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
                                                            <i class="bi bi-geo-fill fs-2"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="status_kependudukan"
                                                        aria-label="Default select example">
                                                        <option>Pilih di bawah ini</option>
                                                        <option value="0"
                                                            {{ $show->status_kependudukan == '0' ? 'selected' : '' }}>
                                                            Menetap
                                                        </option>
                                                        <option value="1"
                                                            {{ $show->status_kependudukan == '1' ? 'selected' : '' }}>
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
                                                            <i class="bi bi-stack fs-2"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="peran"
                                                        aria-label="Default select example">
                                                        <option>Pilih di bawah ini</option>
                                                        <option value="rt"
                                                            {{ $show->peran == 'rt' ? 'selected' : '' }}>RT
                                                        </option>
                                                        <option value="rw"
                                                            {{ $show->peran == 'rw' ? 'selected' : '' }}>RW
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
                                                            <i class="bi bi-globe-americas fs-2"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-select" name="kewarganegaraan"
                                                        aria-label="Default select example">
                                                        <option selected>Pilih di bawah ini</option>
                                                        <option value="0"
                                                            {{ $show->kewarganegaraan == '0' ? 'selected' : '' }}>WNI
                                                        </option>
                                                        <option value="1"
                                                            {{ $show->kewarganegaraan == '1' ? 'selected' : '' }}>WNA
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
                                                            <i class="bi bi-briefcase fs-2"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control @error('id_pekerjaan') is-invalid @enderror"
                                                        value="" id="id_pekerjaan" name="id_pekerjaan">
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
                                                            <i class="bi bi-telephone-fill fs-2"></i>
                                                        </div>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('nomor_telpon') is-invalid @enderror"
                                                        value="{{ $show->nomor_telpon }}" id="nomor_telpon"
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
                                                        <i class="bi bi-calendar-event-fill fs-2"></i>
                                                    </div>
                                                </div>
                                                <input type="date"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    value="{{ $show->tanggal_lahir }}" id="tanggal_lahir"
                                                    name="tanggal_lahir">
                                            </div>
                                            @error('tanggal_lahir')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto : </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="bi bi-file-earmark-image fs-2"></i>
                                                    </div>
                                                </div>
                                                <input type="file"
                                                    class="form-control @error('foto') is-invalid @enderror"
                                                    onchange="previewImage(event)" id="foto" name="foto">
                                            </div>
                                            @error('foto')
                                                {{ $message }}
                                            @enderror
                                            <small class="text-secondary">Note: Maksimal 1 mb</small>
                                        </div>
                                        <div class="d-flex justify-content-end p-3">
                                            <button type="button" class="btn btn-secondary me-2">Keluar</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                    </section>
                @endforeach
            </div>
        </div>
    </div>
@endsection
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
