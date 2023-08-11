@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">City</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">City</a></li>
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
                                <form method="POST" action="{{ route('city.update', $city->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" required
                                                autocomplete="off" value="{{ $city->name }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="longitude">longitude</label>
                                            <input type="text" name="longitude" class="form-control" required
                                                autocomplete="off" value="{{ $city->longitude }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="latitude">latitude</label>
                                            <input type="text" name="latitude" class="form-control" required
                                                autocomplete="off" value="{{ $city->latitude }}">
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
