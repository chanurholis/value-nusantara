@extends('layouts.admin-master')

@section('title', '| Lelang')

@section('title-header', 'Lelang')

@section('content')
{{-- <div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div> --}}
{{-- <div class="row">
    @foreach ($auctions as $auciton)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
        <article class="article article-style-b">
            <div class="article-header">
                <div class="article-image"><img src="{{ asset('goodsFile/' . $auciton->goods->photo) }}" style="max-width:100%; height:auto;"></div>
                <div class="article-badge">
                    <div class="article-badge-item bg-danger">Rp. {{ $auciton->goods->initial_price }}</div>
                </div>
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h2><a href="#">{{ $auciton->goods->goods }}</a></h2>
                </div>
                <p>{{ substr($auciton->goods->description, 0, 55) }}...</p>
                <div class="article-cta">
                    <a href="{{ '/admin/auctions/' . $auciton['id'] }}">Lanjut <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div> --}}
<div class="row">
    @foreach ($auctions as $auction)
    <div class="col-12 col-md-4 col-lg-4">
        <article class="article article-style-c">
            <div class="article-header">
                <img src="{{ asset('goodsFile/' . $auction->goods->photo) }}" alt="" class="article-image" style="max-width:100%; height:auto;">
            </div>
            <div class="article-details">
                <div class="article-category"><div class="badge badge-info">{{ custom_date($auction->start_date, 'd/m/Y') }}</div></div>
                <div class="article-title">
                    <h2><a href="{{ '/admin/auction-history/' . $auction->id }}">{{ $auction->goods->goods }}</a></h2>
                </div>
                <p>{{ $auction->goods->description }}</p>
                <div class="article-user">
                    <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png">
                    <div class="article-user-details">
                        <div class="user-detail-name">
                            <a href="#">{{ $auction->user->name }}</a>
                        </div>
                        <div class="text-job">Web Developer</div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection