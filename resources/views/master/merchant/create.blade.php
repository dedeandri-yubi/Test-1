@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Merchant</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"> Merchant</a></li>
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
                                <form method="post" action="{{ route('merchant.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="city">City</label>
                                            <select name="city_id" class="form-control" required>
                                                <option value="">-- Choose City --</option>
                                                @foreach ($city as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="expired_date">Expired Date</label>
                                            <input type="date" name="expired_date" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" cols="3" class="form-control"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
