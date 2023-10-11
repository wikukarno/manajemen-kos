@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-3">Data Penghuni <a href="{{ route('data-penyewa.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah</a></h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        <div class="table-responsive">
                            <table id="tb_datapenyewa" class="table table-hover scroll-horizontal-vertical w-100">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama Lengkap </th>
                                        <th> Email </th>
                                        <th> Tempat Lahir </th>
                                        <th> Tanggal Lahir </th>
                                        <th> Role </th>
                                        <th> Status Akun </th>
                                        <th> Alamat </th>
                                        <th> No. Hp </th>
                                        <th> Nama Wali </th>
                                        <th> No. Hp Wali </th>
                                        <th> Username </th>
                                        <th> Id Telegram </th>
                                        <th> Mac Address </th>
                                        <th> KTP </th>
                                        <th> Fasilitas </th>
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
    function btnUpdateDataPenyewa(id){
        alert(id);
    }
</script>

<script>
    $('#tb_datapenyewa').DataTable({
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
            { data: 'email', name: 'email' },
            { data: 'tempat_lahir', name: 'tempat_lahir' },
            { data: 'tanggal_lahir', name: 'tanggal_lahir' },
            { data: 'role', name: 'role' },
            { data: 'status_akun', name: 'status_akun' },
            { data: 'alamat', name: 'alamat' },
            { data: 'hp', name: 'hp' },
            { data: 'wali', name: 'wali' },
            { data: 'hp2', name: 'hp2' },
            { data: 'uname', name: 'uname' },
            { data: 'id_telegram', name: 'id_telegram' },
            { data: 'mac_addr', name: 'mac_addr' },
            { data: 'dokumen', name: 'dokumen' },
            {
                data: 'fasilitas',
                name: 'fasilitas',
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
    function btnDeleteDataPenyewa(id) {
    
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
                    url: "{{ url('pemilik/data-penyewa/delete') }}",
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
                        $('#tb_datapenyewa').DataTable().ajax.reload();
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