@extends('layouts.user-master')

@section('title', '| Lelang Diikuti')

@section('title-header', 'Lelang Diikuti')

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
        <h4>Lelang Diikuti <span>({{ $model->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('user.auctions.export') }}" target="_blank" class="btn btn-danger">Ekpor <i class="fas fa-file-export"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Penawaran Saya</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col"></th>
                    @foreach ($model as $auction)      
                    <tr>
                        <td>{{ $auction->goods->goods }}</td>
                        <td>Rp. {{ $auction->auction->final_price }}</td>
                        <td>Rp. {{ $auction['bid'] }}</td>
                        <td>{{ custom_date($auction->auction->start_date, 'd M Y') }}</td>
                        <td>{{ custom_date($auction->auction->end_date, 'd M Y') }}</td>
                        <td class="text-right">
                            <a href="{{ 'auctions/' . $auction->auction_id . '/detail' }}" class="btn btn-info"><i class="fa fa-search"></i></a>
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
                {{-- {{ $model->links() }} --}}
            </ul>
        </nav>
    </div>
</div>
@endsection