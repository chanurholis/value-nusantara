@extends('layouts.user-master')

@section('title', 'Persyaratan Lelang')

@section('title-header', Auth::user()->name)

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
                            <th></th>
                            <td><a href="{{ '/identityCardFile/' . $model->photo }}"><img src="{{ '/identityCardFile/' . $model->photo }}" style="max-width:50%; height:auto;"></a></td>
                        </tr>
                        <tr>
                            <th scope="col">NIK</th>
                            <td>{{ $model->nik }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tempat Lahir</th>
                            <td>{{ $model->place_of_birth }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Lahir</th>
                            <td>{{ $model->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Jenis Kelamin</th>
                            <td>{{ $model->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Pekerjaan</th>
                            <td>{{ $model->profession }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Provinsi</th>
                            <td>{{ $model->province->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Kabupaten/Kota</th>
                            <td>{{ $model->city->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Kecamatan</th>
                            <td>{{ $model->district->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Desa</th>
                            <td>{{ $model->village->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection