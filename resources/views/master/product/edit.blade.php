@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                                <form method="POST" action="{{ route('product.update', $product->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" required
                                                autocomplete="off" value="{{ $product->name }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="merchant">Merchant</label>
                                            <select name="merchant_id" class="form-control" required>
                                                <option value="">-- Choose Merchant --</option>
                                                @foreach ($merchant as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $product->merchant_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="price">price</label>
                                            <input type="number" name="price" class="form-control" required
                                                autocomplete="off" value="{{ $product->price }}">
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
