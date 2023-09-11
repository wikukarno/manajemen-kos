@extends('layouts.app')

@section('title', 'Data User')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" style="overflow-x: auto">
        <h4 class="card-title">Data Pendaftar</h4>
        <table class="table table-bordered" >
        {{--  <table id="tabel-data" class="table table-striped table-bordered" cellspacing="0" width="150%">  --}}

          <thead>
            <tr>
              <th> No </th>
              <th> Nama Lengkap </th>
              <th> Email </th>
              <th> Role </th>
              <th> Status Akun </th>
              <th> No. Hp </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            {{--  <tr>
                <td> 1 </td>
                <td> Herman Beck </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
              </tr>  --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection