@extends('layouts.user-master')

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
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card">
            <form action="{{ route('user.auctions.store') }}" method="post">
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
@endsection