@extends('layouts.app')

@section('title', 'Data User')

@section('content')

{{--  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" style="overflow-x: auto">
        <h4 class="card-title">Data Pendaftar
          <a href="{{ url('pemilik/data-user/create') }}" class="float-end btn btn-outline-success btn-sm mb-2" >Tambah</a>
        </h4>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">  --}}
        {{--  <table id="tabel-data" class="table table-striped table-bordered" cellspacing="0" width="150%">  --}}

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">Data User (Pendaftar)
                <a href="{{ url('pemilik/data-user/create') }}" class="float-end btn btn-outline-success btn-sm" >Tambah Data</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nama Lengkap </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Status Akun </th>
                            <th> No. Hp </th>
                            <th> Alasan Penolakan </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->role }} </td>
                            <td> {{ $item->status_akun }} </td>
                            <td> {{ $item->hp }} </td>
                            <td> {{ $item->alasan_penolakan }} </td>
                            <td>
                                {{--  <a href="#" class="badge bg-info text-white" >  --}}
                                <a href="{{ url('pemilik/data-user/show') }}" class="btn btn-outline-info btn-sm" >
                                    <i data-feather="eye"></i>
                                    <script>
                                    feather.replace();
                                    </script>
                                </a>
                                {{--  <a href="#" class="badge bg-info text-white" >  --}}
                                <a href="" class="btn btn-outline-warning btn-sm" >
                                    <i data-feather="edit"></i>
                                    <script>
                                    feather.replace();
                                    </script>
                                </a>
                                {{--  <a href="#" class="badge bg-info text-white" >  --}}
                                <a onclick="return confirm('Are You Sure To Delete This Data')" href="" class="btn btn-outline-danger btn-sm" >
                                    <i data-feather="x-circle"></i>
                                    <script>
                                    feather.replace();
                                    </script>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection