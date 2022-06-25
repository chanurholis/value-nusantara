@extends('layouts.admin-master')

@section('title', '| My Lelang')

@section('title-header', 'My Lelang')

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
        <h4>My Lelang <span>({{ $auctions->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.auctions.export') }}" target="_blank" class="btn btn-danger">Ekpor <i class="fas fa-file-export"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Akhir</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    @foreach ($auctions as $auction)      
                    <tr>
                        <td>{{ $auction->goods->goods }}</td>
                        <td>Rp. {{ $auction['final_price'] }}</td>
                        <td>{{ $auction['start_date'] }}</td>
                        <td>{{ $auction['end_date'] }}</td>
                        <td>@if ($auction['status'] == 'opened') <div class="badge badge-success">{{ auction_status($auction['status']) }}</div> @else <div class="badge badge-warning">{{ auction_status($auction['status']) }}</div> @endif</td>
                        <td class="text-right">
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