@extends('layouts.app')

@section('title', 'Detail Tipe Kamar')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Detail Tipe Kamar
				<a href="{{ url('pemilik/tipe-kamar') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title mb-5">Data Tipe Kamar <b class="text-primary">{{ $item->name }}</b></h4>
                <form class="form-sample" action="{{ url('pemilik/tipe-kamar') }}" method="POST">
					@csrf
					<div class="card">
						<div class="form-group">
							<label for="name"><b>Nama Tipe Kamar</b></label>
							<input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama Tipe Kamar" autocomplete="off" required value="{{ $item->name }}" disabled/>
						</div>
						<div class="form-group">
							<label for="slug" class="form-label"><b>Slug</b></label>
							<input name="slug" id="slug" type="text" class="form-control" placeholder="Masukkan Slug" autocomplete="off" required value="{{ $item->slug }}" disabled/>
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


<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function(){
    fetch('tipe-kamar/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
  {{--  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })  --}}
</script>

{{--  <script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
     fetch('/tipe-kamar/checkSlug?name='+name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
  })
</script>  --}}

@endsection