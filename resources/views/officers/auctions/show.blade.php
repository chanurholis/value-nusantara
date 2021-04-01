@extends('layouts.officer-master')

@section('title', '| Detail Permintaan Lelang')

@section('title-header', 'Detail Permintaan Lelang')

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td colspan="2"><a href="{{ '/goodsFile/' . $model->goods->photo }}"><img src="{{ '/goodsFile/' . $model->goods->photo }}" style="max-width:100%; height:auto;"></a></td>
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
                            <th scope="col">Pemohon</th>
                            <td>{{ $model->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Dibuat</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Diperbarui</th>
                            <td>{{ $model->updated_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Status</th>
                            <td>@if ($model['status'] == 'opened') <div class="badge badge-success">{{ auction_status($model['status']) }}</div> @else <div class="badge badge-warning">{{ auction_status($model['status']) }}</div> @endif</td>
                        </tr>
                        {{-- <tr>
                            <th scope="col"></th>
                            <td><a href="#" class="btn btn-danger" onclick="deleteConfirmation({{ $model }})">Hapus</a></td>
                        </tr> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <form action="{{ '/officer/auction-request/' . $model->id }}" method="post">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @foreach ($status as $item)
                                    @if ($model->status == $item)
                                        <option value="{{ $item }}" selected>{{ auction_status($item) }}</option>
                                    @else 
                                        <option value="{{ $item }}">{{ auction_status($item) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feddback">
                                @error('status') {{ $message }} @enderror
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