@extends('layouts.admin-master')

@section('title', 'Barang Baru')

@section('title-header', 'Barang Baru')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <form action="{{ route('admin.goodies.store') }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col">
                            <label for="goods">Nama Barang</label>
                            <input type="text" id="goods" value="{{ old('goods') }}" name="goods" class="form-control @error('goods') is-invalid @enderror" placeholder="Nama Barang" autofocus>
                            <div class="invalid-feedback">
                                @error('goods') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="date">Tanggal</label>
                            <input type="date" id="date" value="{{ old('date') }}" name="date" class="form-control @error('date') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="initial_price">Harga Awal</label>
                            <input type="text" id="initial_price" value="{{ old('initial_price') }}" name="initial_price" class="form-control @error('initial_price') is-invalid @enderror" placeholder="Rp. 000.000">
                            <div class="invalid-feedback">
                                @error('initial_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="description">Deskripsi Barang</label>
                            <textarea name="description" id="description" class="form-control @error('initial_price') is-invalid @enderror" placeholder="Deskripsi Barang">{{ old('description') }}</textarea>
                            <div class="invalid-feedback">
                                @error('description') {{ $message }} @enderror
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