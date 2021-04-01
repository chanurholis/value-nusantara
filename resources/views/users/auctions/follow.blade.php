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
    <div class="alert alert-danger">
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
                            <th scope="col">Harga Awal</th>
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
            <form action="{{ '/user/auctions/' . $model->id . '/follow' }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Sampurasun, {{ Auth::user()->first_name }}!</h2>
                            <p class="lead">Silahkan klik tombol <b>Ikuti</b> jika ingin mengikuti lelang ini!</p>
                            <div class="mt-4">
                                <button class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-gavel"></i> Ikuti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection