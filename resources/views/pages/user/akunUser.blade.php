@extends('layouts.app')

@section('title', 'Akun')

@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form action="{{ route('akun-pendaftar.update', $item->id) }}" method="POST" enctype="multipart/form-data" id="form-akun">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center">
                            <div class="profile mb-5">
                                @if($item->profil != null)
                                    <img src="{{ Storage::url($item->profil) }}" alt="image" name="profil" width="150" class="rounded"/>
                                @else
                                    <img src="#" class="img-fluid w-25 h-25" alt="Foto Profil">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="name" id="nama" value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="hp">Nomor WA (Aktif)</label>
                                <input type="number" class="form-control" name="hp" id="hp" value="{{ auth()->user()->hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="profil">Foto Profile</label>
                                <input type="file" class="form-control" name="profil" id="profil">
                            </div>
                        </div>
                    </div>
                    {{--  <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                            </div>
                        </div>
                    </div>  --}}
                    <div class="d-grid gap-2 d-flex">
                        <a href="#" class="btn btn-secondary col">Batal</a>
                        <button type="submit" class="btn btn-gradient-primary col" id="btnSave">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>
@endpush