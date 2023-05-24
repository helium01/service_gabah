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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Status Jemuran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>@if($sensors->status==1)
                                    terbuka
                                    @else
                                    tertutup
                                    @endif
                                </td>
                                <td>
                                    @if($sensors->status==1)
                                    <a class="btn btn-danger" href="/api/servos/1/update" role="button">Tutup</a>
                                    @else
                                    <a class="btn btn-info" href="/api/servos/1/update" role="button">Buka</a>
                                    @endif
                                </td>
                            </tr>
                            
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
    
@endsection
