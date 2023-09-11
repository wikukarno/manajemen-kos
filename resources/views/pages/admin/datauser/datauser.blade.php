@extends('layouts.app')

@section('title', 'Data User')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" style="overflow-x: auto">
        <h4 class="card-title">Data Pendaftar</h4>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            {{--  @if($items)
                @foreach ($items as $item)  --}}
                    <tr>
                        <td> 1 </td>
                        {{--  <td class="py-1">
                            @if($item->profil != null)
                                <img src="{{ Storage::url($item->profil) }}" alt="image"/>
                            @else
                                <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
                            @endif
                        </td>  --}}
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->email }} </td>
                        <td> {{ $item->role }} </td>
                        <td> {{ $item->status_akun }} </td>
                        <td> {{ $item->hp }} </td>
                        <td>
                            {{--  <a href="#" class="badge bg-info text-white" >  --}}
                            <a href="" class="btn btn-outline-info btn-sm" >
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
                {{--  @endforeach
            @endif  --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection