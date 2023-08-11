@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Management Pengguna</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"> Cars</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                            required autocomplete="off" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                            required autocomplete="off" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon"
                                            value="{{ auth()->user()->nomor_telepon }}" class="form-control" required
                                            autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <label for="">Nomor Sim</label>
                                        <input type="text" value="{{ auth()->user()->nomor_sim }}" class="form-control"
                                            required autocomplete="off" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" required readonly>{{ auth()->user()->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <button type="button" onclick="back()" class="btn btn-secondary"><i
                                                class="fas
                                            fa-arrow-left"></i>
                                            Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content -->
    </div>
    <script>
        function back() {
            window.history.back();
        }
    </script>
@endsection
