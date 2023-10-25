@extends('layouts.home')
@section('title')
    Form Isi Data
@endsection

@section('content')
    {{-- form pengisian data untuk pemesanan --}}
<div class="container-xxl py-2">    

      <div class="row p-4">
      <div class="col-md-5">
        <img src="/image/img/room-1.jpg" class="rounded float-start" style="width: 480px; height:380px" alt="...">
      </div>
        <div class="col-md-5">
            <h3>Data kamar</h3>
            @foreach ($items as $item)
            <div class="mb-3">
              <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
              <input type="text" id="nomor_kamar" class="form-control" value="{{$item->kamar->nomor_kamar}}" name="nomor_kamar" disabled>
            </div>
            <div class="mb-3">
              <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
              <input type="text" id="tipe_kamar" class="form-control" value="{{$item->kamar->id_tipe}}" name="tipe_kamar" disabled>
            </div>
            <div class="mb-3">
              <label for="harga_kamar" class="form-label">Harga Kamar</label>
              <input type="text" id="harga_kamar" class="form-control" value="{{$item->kamar->harga}}" name="harga_kamar" disabled>
            </div>
            <div class="mb-3">
              <label for="harga_kamar" class="form-label">Deskripsi Kamar</label>
              <div class="mb-3">
                {{$item->kamar->deskripsi}}
              </div>
              {{-- <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 100px" disabled>{{$item->kamar->deskripsi}}</textarea>
              </div> --}}
            </div>
            @endforeach
        </div>
		<div class="col-md-2">
			@if(session('message'))
				<div class="alert alert-success">
					{{ session('message') }}
				</div>
			@endif
			<form action="{{ route('isi-data.destroy', $user->id) }}" method="POST" id="hapusForm">
				@csrf
				@method('DELETE')
				<button class="btn btn-primary rounded-pill btn-sm" id="hapusData" onclick="konfirmasiHapus()">Batal Pemesanan</button>
			</form>
		</div>
		<script>
			function konfirmasiHapus() {
				if (confirm("Yakin ingin menghapus data?")) {
					// Jika pengguna menekan OK, kirim permintaan penghapusan
					document.getElementById('hapusForm').submit();
				}
			}
		</script>
        <div class="col-12 mt-4">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <h3 class="card-title mb-5">Isi Data Pemesanan <b class="text-primary"></b></h3>
                <form class="form-sample" action="{{ route('isi-data.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                {{-- <form class="form-sample" action="{{route('isi-data.store')}}" method="POST"> --}}
                @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                      <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" value="{{ auth()->user()->name}}" name="name" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ auth()->user()->email}}" name="email" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="hp" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="hp" aria-describedby="hp" value="{{ auth()->user()->hp}}" name="hp" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" name="tanggal_lahir">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="wali" class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" id="wali" aria-describedby="wali" name="wali">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="hp2" class="form-label">Nomor Hp Wali</label>
                            <input type="number" class="form-control" id="hp2" aria-describedby="hp2" name="hp2">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="id_telegram" class="form-label">ID Telegram</label>
                            <input type="text" class="form-control" id="id_telegram" aria-describedby="id_telegram" name="id_telegram">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="dokumen" class="form-label">KTP</label>
                            <input type="file" class="form-control" id="dokumen" aria-describedby="dokumen" name="dokumen">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" aria-describedby="tgl_masuk" name="tgl_masuk">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim Data</button>
                  
              </div>
            </div>
        </div>
    </div>
  </form>
</div>
@endsection