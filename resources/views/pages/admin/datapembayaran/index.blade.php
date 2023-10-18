@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-3"><b>Data Pembayaran </b><a href="{{ route('data-pembayaran.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah</a></h3>
                    </div>

                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        <div class="table-responsive">
                            <table id="tb_datapembayaran" class="table table-hover scroll-horizontal-vertical w-100">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama </th>
                                        <th> Tipe </th>
                                        <th> Harga </th>
                                        <th> Bulan </th>
                                        <th> Tahun </th>
                                        <th> Bukti </th>
                                        <th> Tanggal Bayar </th>
                                        <th> Tanggal Validasi </th>
                                        <th> Status </th>
                                        <th> Keterangan </th>
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
    $('#tb_datapembayaran').DataTable({
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
            { data: 'id_user', name: 'id_user' },
            { data: 'id_kamar', name: 'id_kamar' },
            { data: 'harga_bayar', name: 'harga_bayar' },
            { data: 'bulan', name: 'bulan' },
            { data: 'tahun', name: 'tahun' },
            { data: 'bukti_bayar', name: 'bukti_bayar' },
            { data: 'tanggal_bayar', name: 'tanggal_bayar' },
            { data: 'tanggal_validasi', name: 'tanggal_validasi' },
            { data: 'status', name: 'status' },
            {
                data: 'keterangan',
                name: 'keterangan',
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        // Batasi teks hingga 20 karakter dan tambahkan elipsis jika lebih panjang
                        return data.length > 20 ? data.substr(0, 20) + '...' : data;
                    }
                    return data;
                }
            },
            { data: 'action', name: 'action' },
        ],
    });
</script>

<script>
    // hapus pengurus
    function btnDeleteDataPembayaran(id) {
    
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
                    url: "{{ url('pemilik/data-pembayaran/delete') }}",
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
                        $('#tb_datapembayaran').DataTable().ajax.reload();
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