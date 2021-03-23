@extends('layouts.admin-master')

@section('title', 'Detail Pengguna')

@section('title-header', 'Detail Pengguna')

@section('content')
<div class="card">
    <div class="card-header">
    <h4 class="card-title">{{ $model['name'] }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col">Nama</th>
                    <td>{{ $model['name'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Surel</th>
                    <td>{{ $model['email'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Dibuat</th>
                    <td>{{ $model['created_at'] }}</td>
                </tr>
                <tr>
                    <th scope="col">Diperbarui</th>
                    <td>{{ $model['updated_at'] }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection