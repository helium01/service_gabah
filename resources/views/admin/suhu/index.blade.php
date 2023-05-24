@extends('admin.layout.core')
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="row">
            <div class="col-3">
                <p>keadaan penjemuran : </p>
            </div>
            <div class="col-6">
                <p id="keadaan"></p>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <table class="table" id="tabel">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nilai Data Sensor 1</th>
                                <th scope="col">Nilai Data Sensor 2</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var currentPage = 1;
            // Fungsi untuk mengambil data menggunakan AJAX
            function fetchData() {
                $.ajax({
                    url: "/api/suhus",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Memproses data yang diterima
                        var tableData = "";
                        if (response.data.length === undefined) {
                            tableData =
                                "<tr><td colspan='4' class='text-center'>Data tidak tersedia</td></tr>";
                        } else {
                            $.each(response.data, function(index, data) {
                                tableData += "<tr>";
                                tableData += "<td>" + (index + 1) + "</td>";
                                tableData += "<td>" + data.created_at + "</td>";
                                tableData += "<td>" + data.node + "</td>";
                                tableData += "<td>" + data.node2 + "</td>";
                                tableData += "</tr>";
                            });

                        }
                        console.log(response.keadaan);
                        // Menambahkan data ke dalam tbody tabel
                        $("#tabel tbody").html(tableData);
                        $("#keadaan").html(response.keadaan);

                    },
                    complete: function() {
                        // Mengatur waktu polling (dalam milidetik)
                        setTimeout(fetchData,
                        500); // Mengambil data setiap 5 detik (ganti sesuai kebutuhan Anda)
                    }
                });
            }

            // Memanggil fungsi fetchData untuk pertama kali
            fetchData(currentPage);

            // Mengatur tindakan ketika halaman paginasi diubah
            $(document).on("click", ".pagination-link", function() {
                var page = $(this).data("page");
                currentPage = page; // Menyimpan halaman saat ini
                fetchData(page); // Mengambil data untuk halaman yang dipilih
            });
        });
    </script>
@endsection
