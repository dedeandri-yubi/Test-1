@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Report</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            @include('alert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="date">Date</label>
                                            <input type="date" id="date" name="date"
                                                value="{{ request()->get('date') }}" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="product">Product</label>
                                            <select name="product_id" class="form-control">
                                                <option value="">-- Choose Product --</option>
                                                @foreach ($product as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == request()->get('product_id') ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="city">City</label>
                                            <select name="city_id" class="form-control">
                                                <option value="">-- Choose City --</option>
                                                @foreach ($city as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == request()->get('city_id') ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <br>
                                            <button type="submit" class="btn btn-info mt-2"
                                                id="button-addon2">Search</button>
                                            <a href="/report" class="btn btn-danger mt-2">Clear</a>
                                        </div>
                                        <div class="col-lg-2">
                                            <br>
                                            <a href="{{ route('report.export.excel') }}"
                                                class="btn btn-success mt-2 float-right"><i
                                                    class="nav-icon fas fa-file-excel"></i> Export Excell</a>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($report as $sw)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sw->product->name }}</td>
                                                <td>{{ $sw->date }}</td>
                                                <td>{{ number_format($sw->product->price) }}</td>
                                                <td>{{ $sw->quantity }}</td>
                                                <td>{{ number_format($sw->product->price * $sw->quantity) }}</td>
                                                <td>{{ $sw->product->merchant->city->name }}</td>
                                                <td>{{ $sw->order_status->status->name }}</td>
                                                <td>{{ $sw->user->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Data is empty</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                                {{ $report->links('pagination::bootstrap-5') }}
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
        function clear() {
            console.log('clear');
        }
    </script>
@endsection
