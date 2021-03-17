@extends('layouts.admin-master')

@section('title', 'Lelang')

@section('title-header', 'Lelang')

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
        <h4>Lelang <span>({{ $auctions->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.auctions.create') }}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
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
                    @foreach ($auctions as $auction)      
                    <tr>
                        <td>{{ $auction['auction'] }}</td>
                        <td>{{ $auction['date'] }}</td>
                        <td>{{ $auction['initial_price'] }}</td>
                        <td>{{ $auction['description'] }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-danger" onclick="deleteConfirmation({{ $auction['id'] }})"><i class="fa fa-trash"></i></a>
                            <a href="{{ '/admin/auctions/' . $auction['id'] . '/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ '/admin/auctions/' . $auction['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
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
                {{-- {{ $auctions->links() }} --}}
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
                url: "{{url('/admin/auctions/')}}/" + id,
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