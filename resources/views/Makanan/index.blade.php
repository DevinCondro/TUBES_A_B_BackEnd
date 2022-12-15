@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pemesanan Makanan & Minuman</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('makanan')}}">Pemesanan Makanan & Minuman</a>
                    </li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Makanan</th>
                                            <th class="text-center"> Jenis</th>
                                                <th class="text-center">Jumlah Pemesanan</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($makanan as $item)
                                                <tr>
                                                    <td class="text-center">{{
                                                        $item->nama }}</td>
                                                        <td class="text-center">{{
                                                            $item->jenis }}</td>
                                                            <td class="text-center">{{
                                                                $item->jumlah }}</td>
                                                            </tr>
                                                            @empty
                                                            <div class="alert alert-danger">
                                                                Data Makanan belum tersedia
                                                            </div>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection
@extends('dashboard')