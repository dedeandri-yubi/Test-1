@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
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
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form method="post" action="{{ route('peminjaman.store') }}" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="no_peminjaman">Kode Pinjam</label>
                                            <input type="text" name="no_peminjaman" class="form-control" required
                                                autocomplete="off" value="{{ $no_peminjaman }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="no_telepom">No Telepon</label>
                                            <input type="text" name="no_telepon" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="cars_id">Jenis Peminjaman</label>
                                            <select name="cars_id" class="form-control" required>
                                                <option value="">-- Pilih Jenis Peminjaman --</option>
                                                @foreach ($cars as $item)
                                                    <option value="{{ $item->id }}">{{ $item->merek }} -
                                                        {{ $item->model }} - {{ $item->plat_nomor }}</option> )
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="tanggal_peminjaman">Tanggal Pinjam</label>
                                            <input type="date" name="tanggal_peminjaman" class="form-control" required
                                                autocomplete="off">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="tanggal_pengembalian">Tanggal Kembali</label>
                                            <input type="date" name="tanggal_pengembalian" class="form-control" required
                                                autocomplete="off">
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
