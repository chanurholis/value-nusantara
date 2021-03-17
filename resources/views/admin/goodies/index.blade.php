@extends('layouts.admin-master')

@section('title', 'Barang')

@section('title-header', 'Barang')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Barang <span>({{ $goodies->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.goodies.create') }}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Deskripsi Barang</th>
                    <th scope="col"></th>
                    @foreach ($goodies as $goods)      
                    <tr>
                        <td>{{ $goods['goods'] }}</td>
                        <td>{{ $goods['date'] }}</td>
                        <td>{{ $goods['initial_price'] }}</td>
                        <td>{{ $goods['description'] }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-danger" onclick="deleteConfirmation({{ $goods['id'] }})"><i class="fa fa-trash"></i></a>
                            <a href="{{ '/admin/goodies/' . $goods['id'] . '/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ '/admin/goodies/' . $goods['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{-- {{ $goodies->links() }} --}}
            </ul>
        </nav>
    </div>
</div>

<script>
    function deleteConfirmation(id) {
    swal({
        title: "Hapus Pengguna?",
        text: "Harap pastikan dan konfirmasi!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, jangan!",
        reverseButtons: !0
    }).then(function (e) {
        if (e.value === true) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: "{{url('/admin/goodies/')}}/" + id,
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON',
                success: function (results) {
                    if (results.success === true) {
                        swal("Berhasil!", results.message, "success");
                    } else {
                        swal("Gagal!", results.message, "error");
                    }
                }
            });
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
        return false;
    })
}
</script>

@endsection