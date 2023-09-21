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
                <label for="harga">Tipe Kamar</label>
                <input type="text" class="form-control" id="tipe" placeholder="" name="tipe">
              </div>
              <div class="form-group">
                <label for="harga">Nomor Kamar</label>
                <input type="text" class="form-control" id="nomor" placeholder="" name="nomor">
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
                          <input type="checkbox" class="form-check-input" name="fasilitas[]"> Listrik </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Air </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Wifi </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Tempat Tidur </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Kasur </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Lemari </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Meja Belajar </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Kursi Belajar </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Kipas Angin </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Kloset Kamar Mandi </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Keran </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"  name="fasilitas[]"> Shower </label>
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