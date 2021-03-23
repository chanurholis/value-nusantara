@extends('layouts.admin-master')

@section('title', 'Barang')

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
{{-- <div class="row">
    @foreach ($goodies as $goods)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article article-style-b">
            <div class="article-header">
                <div class="article-image"><img src="{{ asset('goodsFile/' . $goods['photo']) }}" style="max-width:100%; height:auto;"></div>
                <div class="article-badge">
                    <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                </div>
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h2><a href="#">{{ $goods['goods'] }}</a></h2>
                </div>
                <p>{{ substr($goods['description'], 0, 55) }}...</p>
                <div class="article-cta">
                    <a href="{{ '/admin/goodies/' . $goods['id'] }}">Lanjut <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div> --}}

<div class="card">
    <div class="card-header">
        <h4>Pengguna <span>({{ $goodies->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.goodies.create') }}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col"></th>
                    @foreach ($goodies as $goods)      
                    <tr>
                        <td>{{ $goods['goods'] }}</td>
                        <td>Rp. {{ $goods['initial_price'] }}</td>
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