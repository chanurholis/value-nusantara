@extends('layouts.user-master')

@section('title', '| Detail Lelang')

@section('title-header', 'Detail Lelang')

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
                            <td><a href="{{ asset('goodsFile/' . $model->goods->photo) }}"><img src="{{ asset('goodsFile/' . $model->goods->photo) }}" style="max-width:100%; height:auto;"></a></td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <td>{{ $model->goods->goods }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Lelang Mulai</th>
                            <td>{{ custom_date($model->start_date, 'd M Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Lelang Berakhir</th>
                            <td>{{ custom_date($model->end_date, 'd M Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Batas Penawaran</th>
                            <td>Rp. {{ $model->final_price }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Deskripsi</th>
                            <td class="text-justify">{{ $model->goods->description }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Petugas</th>
                            <td>@if($model->officer_id) {{ $model->officer_id }} @else <div class="badge badge-info">Sedang Diproses</div> @endif</td>
                        </tr>
                        <tr>
                            <th scope="col">Dibuat</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Diperbarui</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>@if ($model['status'] == 'opened') <div class="badge badge-success">{{ auction_status($model['status']) }}</div> @else <div class="badge badge-warning">{{ auction_status($model['status']) }}</div> @endif</td>
                        </tr>
                        <tr>
                            <th scope="col"></th>
                            <td>
                                <form action="{{ '/user/auctions/' . $model->id }}" method="post" id="auctionDelete">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" data-confirm="Yakin?|Apakah Anda ingin melanjutkan?" data-confirm-yes="event.preventDefault(); document.getElementById('auctionDelete').submit();">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <form action="{{ '/user/auctions/' . $model->id }}" method="post">
                @method('patch')
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $model->start_date, date('Y-m-d') }}">
                            <div class="invalid-feddback">
                                @error('start_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="end_date">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $model->end_date, date('Y-m-d') }}">
                            <div class="invalid-feddback">
                                @error('end_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4 float-right">
                        <div class="col-sm-12 col-md-7 float-right">
                            <button class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endpush