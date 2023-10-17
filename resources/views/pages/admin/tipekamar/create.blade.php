@extends('layouts.app')

@section('title', 'Tambah Tipe Kamar')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Tambah Tipe Kamar
            <a href="{{ url('pemilik/tipe-kamar') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
    </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title mb-5"><u>Data Tipe Kamar</u></h4>
                <form class="form-sample" action="{{ url('pemilik/tipe-kamar') }}" method="POST">
                  @csrf
                  <div class="card">
                    <div class="form-group">
                      <label for="name">Nama Tipe Kamar</label>
                      <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tipe Kamar" autocomplete="off" required value="{{ old('name') }}"/>
                          @error('name')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                    </div>
                    <div class="form-group">
                      <label for="slug" class="form-label">Slug</label>
                      <input name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Masukkan Slug" autocomplete="off" required value="{{ old('slug') }}"/>
                          @error('slug')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                    </div>
                    
                  </div>
                  <td colspan="2">
                    <input type="submit" class="float-end btn btn-gradient-primary btn-sm">
                  </td>
                </form>
              </div>
            </div>
          </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection