@extends('layouts.admin-master')

@section('title', 'Lelang Baru')

@section('title-header', 'Lelang Baru')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <form action="{{ route('admin.auctions.store') }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col">
                            <label for="goods">Barang</label>
                            <select name="goods_id" id="goods" class="form-control @error('goods_id') is-invalid @enderror">
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($goodies as $goods)
                                    @if (old('goods_id') == $goods->id)
                                        <option value="{{ $goods->id }}" selected>{{ $goods->goods }}</option>
                                    @else 
                                        <option value="{{ $goods->id }}">{{ $goods->goods }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('goods_id') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" id="start_date" value="{{ old('start_date'), date('Y-m-d') }}" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('start_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="end_date">Tanggal Selesai</label>
                            <input type="date" id="end_date" value="{{ old('end_date'), date('Y-m-d') }}" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('end_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="form-group col">
                            <label for="final_price">Harga Akhir</label>
                            <input type="text" id="final_price" value="{{ old('final_price') }}" name="final_price" class="form-control @error('final_price') is-invalid @enderror" placeholder="Rp. 000.000">
                            <div class="invalid-feedback">
                                @error('final_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group row mb-4 float-right">
                        <div class="col-sm-12 col-md-7 float-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var rupiah = document.getElementById('final_price');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		  = number_string.split(','),
        sisa     		  = split[0].length % 3,
        rupiah     		  = split[0].substr(0, sisa),
        ribuan     		  = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection