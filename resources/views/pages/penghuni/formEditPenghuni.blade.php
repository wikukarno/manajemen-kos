@extends('layouts.app')

@section('title', 'Akun')

@section('content')
<form action="{{ route('form-penghuni.update', $item->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Form Penghuni</h3>
            <form class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->name }}" name="name">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Uname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->uname }}" name="uname">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->email }}" name="email">
                      </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->alamat }}" name="alamat">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp }}" name="hp">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Handphone Wali</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp2 }}" name="hp2">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Wali</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->wali }}" name="wali">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Id Telegram</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->id_telegram }}" name="id_telegram">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="tempatlahir" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}">
                  </div>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">KTP</label>+
                    <div class="col-sm-9">
                        <div class="mt-2 justify-content-center">
                            @if ($item->dokumen != null)
                            <img src="{{ Storage::url($item->dokumen) }}"class="img-fluid" id="dokumen-preview">
                            @else
                            <img src="https://source.unsplash.com/500x200?" class="img-fluid" id="dokumen-preview" style="display: none;">
                            <input type="hidden">
                            @endif
                            <div class="mt-3">
                              <input class="form-control 
                              @error('dokumen') 
                              is-invalid
                              @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()">
                              @error('dokumen')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row mt-5">
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                      </div>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
</form>


<form action="" id="" name="" method=""</form>

@endsection

@push('after-script')
<script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>
<script>
  // Fungsi untuk menampilkan pratinjau dokumen
  function previewDocument() {
      const inputDokumen = document.getElementById('#dokumen');
      const dokumenPreview = document.getElementById('.dokumen-preview');

      if (inputDokumen.files && inputDokumen.files[0]) {
          const reader = new FileReader();

          reader.onload = function(e) {
              dokumenPreview.src = e.target.result;
              dokumenPreview.style.display = 'block';
          };

          reader.readAsDataURL(inputDokumen.files[0]);
      } else {
          dokumenPreview.style.display = 'none';
      }
  }
</script>
@endpush