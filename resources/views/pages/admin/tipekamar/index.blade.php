@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-3"><b>Tipe Kamar </b><a href="#" class="float-end btn btn-outline-success btn-sm mb-2" >Tambah</a></h3>
                        {{--  {{ route('tipe-kamar.create') }}  --}}
                    </div>

                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        <div class="table-responsive">
                            <table id="tb_datakamar" class="table table-hover scroll-horizontal-vertical w-100">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama Kamar </th>
                                        <th> Slug </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-script')
<script>
    function btnUpdateDataKamar(id){
        alert(id);
    }
</script>

<script>
    $('#tb_datakamar').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        
        ordering: [[1, 'asc']],
        ajax: {
            url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'action', name: 'action' },
        ],
    });
</script>

@endpush