@extends('layouts.user-master')

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
            <button class="btn btn-danger" id="modal-5">Ekspor <i class="fas fa-file-export"></i></button>
        </div>
    </div>
    <!-- Export Modal -->
    <form class="modal-part" id="modal-login-part" action="{{ route('user.goodies.export_filter') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="start_export">Dari</label>
            <div class="input-group">
                <input type="date" name="start_export" id="start_export" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="end_export">Sampai</label>
            <div class="input-group">
                <input type="date" name="end_export" id="end_export" class="form-control">
            </div>
        </div>
    </form>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Harga Akhir</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    @foreach ($auctions as $auction)      
                    <tr>
                        <td>{{ $auction->goods->goods }}</td>
                        <td>{{ $auction->goods->village }}</td>
                        <td>Rp. {{ $auction['final_price'] }}</td>
                        <td>{{ custom_date($auction['start_date'], 'd M Y') }}</td>
                        <td>{{ custom_date($auction['end_date'], 'd M Y') }}</td>
                        <td>
                            @if ($auction['status'] == 'opened')
                                <div class="badge badge-success">{{ auction_status($auction['status']) }}</div>
                            @elseif($auction['status'] == 'process')
                                <div class="badge badge-warning">{{ auction_status($auction['status']) }}</div>
                            @else
                                <div class="badge badge-danger">{{ auction_status($auction['status']) }}</div>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ '/user/auctions/' . $auction['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
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
                {{ $auctions->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endpush