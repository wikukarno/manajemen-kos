@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-3"><b>Data Kamar </b><a href="{{ route('data-kamar.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah</a></h3>
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
                                        <th> No. Kamar </th>
                                        <th> Id Tipe </th>
                                        <th> Deskripsi </th>
                                        <th> Status </th>
                                        <th> Slug </th>
                                        <th> Harga </th>
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
            { data: 'nomor_kamar', name: 'nomor_kamar' },
            { data: 'id_tipe', name: 'id_tipe' },
            {
                data: 'deskripsi',
                name: 'deskripsi',
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        // Batasi teks hingga 20 karakter dan tambahkan elipsis jika lebih panjang
                        return data.length > 20 ? data.substr(0, 20) + '...' : data;
                    }
                    return data;
                }
            },
            { data: 'status', name: 'status' },
            { data: 'slug', name: 'slug' },
            { data: 'harga', name: 'harga' },
            { data: 'action', name: 'action' },
        ],
    });
</script>

<script>
    // hapus pengurus
    function btnDeleteDataKamar(id) {
    
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('pemilik/data-kamar/delete') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: (ress) => {
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil dihapus.',
                            'success'
                        )
                        $('#tb_datakamar').DataTable().ajax.reload();
                    },
                    error: (err) => {
                        Swal.fire(
                            'Gagal!',
                            'Data gagal dihapus.',
                            'error'
                        )
                    }
                });
            }
        })
    }
</script>
@endpush