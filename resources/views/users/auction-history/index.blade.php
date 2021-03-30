@extends('layouts.user-master')

@section('title', '| Lelang')

@section('title-header', 'Lelang')

@section('content')
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
                    <h2><a href="{{ '/user/auction-history/' . $auction->id }}">{{ $auction->goods->goods }}</a></h2>
                </div>
                <p>{{ Str::limit($auction->goods->description, 50, '...') }}</p>
                <div class="article-user">
                    <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png">
                    <div class="article-user-details">
                        <div class="user-detail-name">
                            <a href="#">{{ $auction->user->name }}</a>
                        </div>
                        <div class="text-job">Bendungan, Pagaden Barat.</div>
                    </div>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection