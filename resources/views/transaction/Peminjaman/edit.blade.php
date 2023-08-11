@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
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
                                <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="no_peminjaman">Kode Pinjam</label>
                                            <input type="text" name="no_peminjaman" class="form-control" required
                                                autocomplete="off" value="{{ $peminjaman->no_peminjaman }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" class="form-control" required
                                                autocomplete="off" value="{{ $peminjaman->nama_peminjam }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="no_telepom">No Telepon</label>
                                            <input type="text" name="no_telepon" class="form-control" required
                                                autocomplete="off" value="{{ $peminjaman->no_telepon }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki" @if ($peminjaman->jenis_kelamin == 'Laki-laki') selected @endif>
                                                    Laki-laki</option>
                                                <option value="Perempuan" @if ($peminjaman->jenis_kelamin == 'Perempuan') selected @endif>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" required>{{ $peminjaman->alamat }}</textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="cars_id">Jenis Peminjaman</label>
                                            <select name="cars_id" class="form-control" required>
                                                <option value="">-- Pilih Jenis Peminjaman --</option>
                                                @foreach ($cars as $car)
                                                    <option value="{{ $car->id }}"
                                                        @if ($peminjaman->cars_id == $car->id) selected @endif>
                                                        {{ $car->merek }} -
                                                        {{ $car->model }}</option> )
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-4">
                                            <label for="tanggal_peminjaman">Tanggal Pinjam</label>
                                            <input type="date" name="tanggal_peminjaman" class="form-control" required
                                                autocomplete="off" value="{{ $peminjaman->tanggal_peminjaman }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="tanggal_pengembalian">Tanggal Kembali</label>
                                            <input type="date" name="tanggal_pengembalian" class="form-control" required
                                                autocomplete="off" value="{{ $peminjaman->tanggal_pengembalian }}">
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
