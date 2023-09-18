@extends('layouts.app')

@section('title', 'Sewa Kamar')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sewa Kamar</h4>
            <form class="forms-sample">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name">
              </div>
              <div class="form-group">
                <label for="noktp">No. KTP</label>
                <input type="number" class="form-control" id="noktp" placeholder="No. KTP" name="no_ktp">
              </div>
              <div class="form-group">
                <label for="tempatlahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir" name="tempat_lahir">
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal" placeholder="dd/mm/yyyy" name="tanggal_lahir">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
              </div>
              <div class="form-group">
                <label for="hp">Nomor Handphone</label>
                <input type="number" class="form-control" id="hp" placeholder="Nomor Handphone" name="hp">
              </div>
              <div class="form-group">
                <label for="harga">Harga Kamar</label>
                <input type="text" class="form-control" id="harga" placeholder="" name="harga">
              </div>
              <div class="form-group">
                <label for="fasilitas">Fasilitas</label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Listrik </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Air </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Wifi </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Tempat Tidur </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Kasur </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Lemari </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Meja Belajar </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Kursi Belajar </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Kipas Angin </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Kloset Kamar Mandi </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Keran </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Shower </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
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