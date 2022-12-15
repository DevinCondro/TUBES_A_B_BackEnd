@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Booking Hotel</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('kamar')}}">Booking Hotel</a>
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
                                        <th class="text-center">Jenis Kamar</th>
                                            <th class="text-center"> Jumlah Tersedia</th>
                                                <th class="text-center">Harga</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($kamar as $item)
                                                <tr>
                                                    <td class="text-center">{{
                                                        $item->jenis }}</td>
                                                        <td class="text-center">{{
                                                            $item->jumlah }} Kamar</td>
                                                            <td class="text-center">Rp.{{
                                                                $item->harga }}</td>
                                                            </tr>
                                                            @empty
                                                            <div class="alert alert-danger">
                                                                Data Kamar belum tersedia
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