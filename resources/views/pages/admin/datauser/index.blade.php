@extends('layouts.app')

@section('title', 'Data User')

@section('content')
<section class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-3"><b>Data User </b><a href="{{ route('data-user.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah</a></h3>
                    </div>

                    <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif
                        <div class="table-responsive">
                            <table id="tb_datauser" class="table table-hover scroll-horizontal-vertical w-100">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama Lengkap </th>
                                        <th> Email </th>
                                        <th> Role </th>
                                        <th> Status Akun </th>
                                        <th> No. Hp </th>
                                        <th> Alasan Penolakan </th>
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
    function btnUpdateDataUser(id){
        alert(id);
    }
</script>

<script>
    $('#tb_datauser').DataTable({
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
            {
                data: 'name',
                name: 'name',
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        // Batasi teks hingga 20 karakter dan tambahkan elipsis jika lebih panjang
                        return data.length > 20 ? data.substr(0, 20) + '...' : data;
                    }
                    return data;
                }
            },
            {
                data: 'email',
                name: 'email',
                render: function (data, type, full, meta) {
                    if (type === 'display') {
                        // Batasi teks hingga 20 karakter dan tambahkan elipsis jika lebih panjang
                        return data.length > 20 ? data.substr(0, 20) + '...' : data;
                    }
                    return data;
                }
            },
            { data: 'role', name: 'role' },
            { data: 'status_akun', name: 'status_akun' },
            { data: 'hp', name: 'hp' },
            {
                data: 'alasan_penolakan',
                name: 'alasan_penolakan',
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
    function btnDeleteDataUser(id) {
    
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
                    url: "{{ url('pemilik/data-user/delete') }}",
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
                        $('#tb_datauser').DataTable().ajax.reload();
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