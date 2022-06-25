@extends('layouts.public-master')

@section('title', '| Lelang')

@section('content')
<main>
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(mobster/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h3 class="mb-4 fw-medium">Lelang</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row">
                @foreach ($auctions as $auction)
                <div class="col-lg-8 py-3">
                    <article class="blog-entry">
                        <div class="entry-header">
                            <div class="post-thumbnail">
                                <img src="{{ 'goodsFile/' . $auction->goods->photo }}" alt="">
                            </div>
                            <div class="post-date">
                                <h3>{{ custom_date($auction->start_date, 'd') }}</h3>
                                <span>{{ custom_date($auction->start_date, 'M') }}</span>
                            </div>
                        </div>
                        <div class="post-title"><a href="blog-details.html">{{ $auction->goods->goods }}</a></div>
                        <div class="entry-meta mb-2">
                            <div class="meta-item entry-author">
                                <div class="icon">
                                    <span class="mai-person"></span>  
                                </div>
                                <a href="#">{{ $auction->user->name }}</a>
                            </div>
                            <div class="meta-item">
                                <div class="icon">
                                    <span class="mai-chatbubble-ellipses"></span>
                                </div>
                                <a href="#">24 Penawara</a>
                            </div>
                            <div class="meta-item">
                                <div class="icon">
                                    <span class="mai-location-outline"></span>
                                </div>
                                <a href="#">Bendungan, Pagaden Barat.</a>
                            </div>
                        </div>
                        <div class="entry-content">
                            <p>{{ Str::limit($auction->goods->description, 200, '...') }}</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ikuti</a>
                    </article>
                </div>
                @endforeach

                <!-- Sidebar -->
                {{-- <div class="col-lg-4 py-3">
                    <div class="widget-wrap">
                        <form action="#" class="search-form">
                            <h3 class="widget-title">Search</h3>
                            <div class="form-group">
                                <span class="icon mai-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>

                    <div class="widget-wrap">
                        <h3 class="widget-title">Jobs</h3>
                        <ul class="categories">
                            <li><a href="#">Graphic Designer <span>12</span></a></li>
                            <li><a href="#">Visual Assistant <span>22</span></a></li>
                            <li><a href="#">Programing <span>37</span></a></li>
                            <li><a href="#">Office Admin <span>42</span></a></li>
                            <li><a href="#">Web Designer <span>14</span></a></li>
                            <li><a href="#">Language <span>140</span></a></li>
                        </ul>
                    </div>
                </div>  --}}
                <!-- end sidebar -->
            </div>
        </div>
    </div>
</main>
@endsection