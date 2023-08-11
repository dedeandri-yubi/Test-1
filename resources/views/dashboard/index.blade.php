@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><sup style="font-size: 30px">{{ $product }}</sup></h3>
                                <p>Jumlah Data Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/product" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><sup style="font-size: 30px">{{ $merchant }}</sup></h3>
                                <p>Jumlah Data Merchant</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/merchant" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><sup style="font-size: 30px">{{ $orderItems }}</sup></h3>
                                <p>Jumlah Data Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/order_items" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
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


{{--  --}}
