<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('admin.partial.header')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.partial.navbar')
        @include('admin.partial.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid" id="konten">
                @yield('konten')
            </div>
            @include('admin.partial.footer')
        </div>
    </div>
    @include('admin.partial.script')
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- DATA TABLES --}}
<script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<script>
    function routeToDataWarga(id_user) {
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/data_warga/" + id_user, // Gunakan id_user dalam URL
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            success: function(data) {
                // Hapus sidebar dan komponen lain yang tidak diperlukan dari respons
                const content = $(data).find('#konten').html();
                $("#konten").html(content);

                // Atur ulang event listeners atau komponen lain yang perlu diatur ulang
                // ...

                // Misalnya, jika ada event listeners yang perlu diatur ulang, lakukan di sini
                // ...
                $('#myTable').DataTable(); // Initialize DataTables on the updated table
                const newUrl = "/data_warga/" + id_user; // Ganti dengan URL yang sesuai
                history.pushState(null, null, newUrl);
            }
        });
    }

    function routeToDetail(id_user) {
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/detail-rt/" + id_user, // Gunakan id_user dalam URL
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            success: function(data) {
                // Hapus sidebar dan komponen lain yang tidak diperlukan dari respons
                const content = $(data).find('#konten').html();
                $("#konten").html(content);

                // Atur ulang event listeners atau komponen lain yang perlu diatur ulang
                // ...

                // Misalnya, jika ada event listeners yang perlu diatur ulang, lakukan di sini
                // ...
                $('#myTable').DataTable(); // Initialize DataTables on the updated table
                const newUrl = "/detail-rt/" + id_user; // Ganti dengan URL yang sesuai
                history.pushState(null, null, newUrl);
            }
        });
    }
</script>
