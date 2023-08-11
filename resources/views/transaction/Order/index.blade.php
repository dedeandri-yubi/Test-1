@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Items</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Order Items</a></li>
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
                <form method="GET">
                    <div class="row mb-2">
                        <div class="col-lg-2">
                            <a href="{{ route('order_items.create') }}" class="btn btn-block btn-primary btn-md"><i
                                    class="nav-icon fas fa-plus"></i> Add Order Items</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET">
                                    <div class="row float-right">
                                        <div class="col-lg-9">
                                            <input type="text" id="search" name="search"
                                                value="{{ request()->get('search') }}" class="form-control"
                                                placeholder="Search..." aria-label="Search" aria-describedby="button-addon2"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-info" id="button-addon2">Search</button>
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
                                            <th>Status</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order_items as $sw)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sw->product->name }}</td>
                                                <td>{{ $sw->date }}</td>
                                                <td>{{ number_format($sw->product->price) }}</td>
                                                <td>{{ $sw->quantity }}</td>
                                                <td>
                                                        {{ $sw->order_status->status->name }}
                                                    {{-- {{ $sw->order_status->status->name }}</td> --}}
                                                <td>{{ $sw->user->name }}</td>
                                                <td>
                                                    <a href="{{ route('order_items.edit', $sw->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('order_items.destroy', $sw->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure delete data?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Data is empty</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                                {{ $order_items->withQueryString()->links('pagination::bootstrap-5') }}
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
