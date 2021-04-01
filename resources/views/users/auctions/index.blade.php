@extends('layouts.user-master')

@section('title', '| Lelang')

@section('title-header', 'Lelang')

@section('content')
<div class="row">
    @foreach ($auctions as $auction)
    <div class="col-12 col-md-4 col-lg-4">
        <article class="article article-style-c">
            <div class="article-header">
                <div class="article-badge">
                    <div class="article-badge-item bg-danger">Rp. {{ $auction->goods->initial_price }}</div>
                </div>
                <img src="{{ asset('goodsFile/' . $auction->goods->photo) }}" alt="" class="article-image" style="max-width:100%; height:auto;">
            </div>
            <div class="article-details">
                <div class="article-category"><div class="badge badge-info">{{ custom_date($auction->start_date, 'd M Y') }}</div></div>
                <div class="article-title">
                    <h2><a href="{{ '/user/auctions/' . $auction->id . '/detail' }}">{{ $auction->goods->goods }}</a></h2>
                </div>
                <p>{{ Str::limit($auction->goods->description, 50, '...') }}</p>
                <div class="article-user">
                    <img alt="image" src="@if(Auth::user()->avatar == null) {{ asset('stisla/assets/img/avatar/avatar-1.png') }} @elseif(strstr($auction->user->avatar, 'https')) {{ $auction->user->avatar }} @else {{ '/usersFile/' . $auction->user->avatar }} @endif">
                    <div class="article-user-details">
                        <div class="user-detail-name">
                            <a>@if ( $auction->user->id == Auth::user()->id ) Saya @else {{ $auction->user->name }} @endif</a>
                        </div>
                        <div class="text-job">{{ $auction->goods->village }}</div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection