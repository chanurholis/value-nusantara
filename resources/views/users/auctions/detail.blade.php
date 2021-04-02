@extends('layouts.user-master')

@section('title', '| Mengikuti Lelang')

@section('title-header', 'Mengikuti Lelang')

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-primary">
        {{ session('error') }}
    </div>
@endif
<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th scope="col">Foto</th>
                            <td><img src="{{ asset('goodsFile/' . $model->goods->photo) }}" style="max-width:100%; height:auto;"></td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <td>{{ $model->goods->goods }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Pelelang</th>
                            <td>{{ $model->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Penawaran Teringgi</th>
                            <td>Rp. {{ $model->final_price }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Deskripsi</th>
                            <td class="text-justify">{{ $model->goods->description }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Lokasi</th>
                            <td>{{ $model->goods->village }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            {{-- <form action="{{ '/user/auction-histories/' . $model->id }}" method="post">
                @method('patch')
                @csrf --}}
                <div class="card-body">

                    <div class="card chat-box card-success" id="mychatbox2">
                        <div class="card-header">
                            <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i>Penawaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th scope="col">Batas Penawaran</th>
                                        <td>Rp. <b>{{ $auction_history[0]->auction->final_price }}</b></td>
                                    </tr>
                                    @foreach ($auction_history as $item)
                                        <tr>
                                            <th scope="col">{{ $item->user->name }}</th>
                                            <td>@if(!$item->bid) Mengikuti, belum melakukan penawaran. @else Rp. {{ $item->bid }} @endif</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer chat-form">
                            <form action="{{ '/user/auctions/' . $model->id . '/bid' }}" method="post">
                                @method('patch')
                                @csrf
                                <input type="text" name="bid" class="form-control @error('bid') is-invalid @enderror" placeholder="Rp. 000.000.000" id="bid">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('stisla/assets/js/page/components-chat-box.js') }}"></script>
<script type="text/javascript">
     var rupiah = document.getElementById('bid');

rupiah.addEventListener('keyup', function(e) {
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		  = number_string.split(','),
    sisa     		  = split[0].length % 3,
    rupiah     		  = split[0].substr(0, sisa),
    ribuan     		  = split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan) {
        separator = sisa ? '.' : '';
        rupiah    += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>
@endpush