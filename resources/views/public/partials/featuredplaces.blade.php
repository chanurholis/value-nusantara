<section class="featured-places" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Barang Segera Berakhir</span>
                    <h2>Praesent nec dui sed urna</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($auctions as $auction)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="featured-item">
                    <div class="thumb">
                        <img src="{{ asset('venue/img/featured_item_1.jpg') }}" alt="">
                        <div class="overlay-content">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <div class="date-content">
                            <h6>28</h6>
                            <span>August</span>
                        </div>
                    </div>
                    <div class="down-content">
                        <h4>{{ $auction->goods->goods }}</h4>
                        <span>Category One</span>
                        <p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
                        <div class="row">
                            <div class="col-md-6 first-button">
                                <div class="text-button">
                                    <a href="#">Add to favorites</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-button">
                                    <a href="#">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>