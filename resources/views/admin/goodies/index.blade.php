@extends('layouts.admin-master')

@section('title', '| Barang')

@section('title-header', 'Barang')

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
        <h4>Barang <span>({{ $goodies->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.goodies.export') }}" target="_blank" class="btn btn-danger">Ekpor <i class="fas fa-file-export"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col"></th>
                    @foreach ($goodies as $goods)      
                    <tr>
                        <td>{{ $goods['goods'] }}</td>
                        <td>Rp. {{ $goods['initial_price'] }}</td>
                        <td>{{ $goods['created_at'] }}</td>
                        <td class="text-right">
                            <a href="{{ '/admin/goodies/' . $goods['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
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
                {{-- {{ $goodies->links() }} --}}
            </ul>
        </nav>
    </div>
</div>
@endsection