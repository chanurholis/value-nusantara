<section class="popular-places" id="popular">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Barang Populer</span>
                    <h2>Integer sapien odio</h2>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach ($auctions as $auction)
                <div class="item popular-item">
                    <div class="thumb">
                        <img src="{{ asset('venue/img/popular_item_1.jpg') }}" alt="">
                        <div class="text-content">
                            <h4>{{ $auction->goods->goods }}</h4>
                            <span>76 Mengikuti</span>
                        </div>
                        <div class="plus-button">
                            <a href="#"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>