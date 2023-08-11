@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cars</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Cars</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('cars.update', $car->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="merek">Merek</label>
                                            <input type="text" name="merek" class="form-control" required
                                                autocomplete="off" value="{{ $car->merek }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="model">Model</label>
                                            <input type="text" name="model" class="form-control" required
                                                autocomplete="off" value="{{ $car->model }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" name="tahun" class="form-control" required
                                                autocomplete="off" value="{{ $car->tahun }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="warna">Warna</label>
                                            <input type="text" name="warna" class="form-control" required
                                                autocomplete="off" value="{{ $car->warna }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="plat_nomor">Plat Nomor</label>
                                            <input type="text" name="plat_nomor" class="form-control" required
                                                autocomplete="off" value="{{ $car->plat_nomor }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="harga_sewa">Harga Sewa</label>
                                            <input type="text" name="harga_sewa" class="form-control" required
                                                autocomplete="off" value="{{ $car->harga_sewa }}">
                                        </div>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" onclick="back()" class="btn btn-secondary"><i
                                                    class="fas
                                                fa-arrow-left"></i>
                                                Back</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        back = () => {
            window.history.back();
        }
    </script>
@endsection
