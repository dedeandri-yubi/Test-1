@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Pengembalian</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Pengembalian</a></li>
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
                                @include('alert')
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="post" action="{{ route('pengembalian.store') }}" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="no_pengembalian">Kode Pengembalian</label>
                                            <input type="text" name="no_pengembalian" class="form-control" required
                                                autocomplete="off" value="{{ $no_pengembalian }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="plat_nomor">Nama Peminjaman</label>
                                            <input list="peminjaman" name="plat_nomor" class="form-control" id="plat_nomor"
                                                autocomplete="off">
                                            <datalist id="peminjaman">
                                                @foreach ($peminjaman as $item)
                                                    <option value="{{ $item->car->plat_nomor }}">{{ $item->nama_peminjam }}
                                                        -
                                                        {{ $item->car->plat_nomor }}</option> )
                                                @endforeach
                                            </datalist>

                                        </div>
                                        <div class="col-lg-4">
                                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                            <input type="date" name="tanggal_pengembalian" class="form-control"
                                                id="tanggal_pengembalian" required autocomplete="off">
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
