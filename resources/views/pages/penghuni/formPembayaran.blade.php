@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Pembayaran</h4>
        <form class="forms-sample">
          <div class="form-group">
            <label for="exampleInputName1">Nama Penghuni Kos</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Masa Pembayaran</label>
            <select class="form-control" id="exampleSelectGender" style="height: 1.2cm">
              <option>1 Bulan</option>
              <option>2 Bulan</option>
              <option>3 Bulan</option>
              <option>6 Bulan</option>
              <option>1 Tahun</option>
            </select>
          </div>
          <div class="form-group">
            <label>Unggah Bukti Transfer</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info"  placeholder="Unggah Gambar">
              {{--  <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>  --}}
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Riwayat Pembayaran</h4>
        </p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Nama </th>
              <th> Masa Pembayaran </th>
              <th> Bukti </th>
              <th> Tanggal Pembayaran </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 1 </td>
              <td> Herman Beck </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $ 77.99 </td>
              <td> May 15, 2015 </td>
            </tr>
            <tr>
              <td> 2 </td>
              <td> Messsy Adam </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $245.30 </td>
              <td> July 1, 2015 </td>
            </tr>
            <tr>
              <td> 3 </td>
              <td> John Richards </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $138.00 </td>
              <td> Apr 12, 2015 </td>
            </tr>
            <tr>
              <td> 4 </td>
              <td> Peter Meggik </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $ 77.99 </td>
              <td> May 15, 2015 </td>
            </tr>
            <tr>
              <td> 5 </td>
              <td> Edward </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $ 160.25 </td>
              <td> May 03, 2015 </td>
            </tr>
            <tr>
              <td> 6 </td>
              <td> John Doe </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $ 123.21 </td>
              <td> April 05, 2015 </td>
            </tr>
            <tr>
              <td> 7 </td>
              <td> Henry Tom </td>
              <td>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </td>
              <td> $ 150.00 </td>
              <td> June 16, 2015 </td>
            </tr>
          </tbody>
        </table>
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