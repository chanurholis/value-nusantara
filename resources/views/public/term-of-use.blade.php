@include('public.partials.header')

@include('public.partials.navbar')

<main class="bg-light">
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(mobster/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h3 class="mb-4 fw-medium">Syarat dan Ketentuan Layanan</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-page">
                        <h5 class="fg-primary">Stories</h5>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est</p>
                        <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>

                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="card-page mt-3">
                        <h5 class="fg-primary">Pahlawan Kami</h5>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg py-3">
                                <div class="team-item">
                                    <div class="team-avatar">
                                    <img src="{{ asset('img/owner/chacha-nurholis.jpg') }}" alt="">
                                    </div>
                                    <h5 class="team-name">Chacha Nurholis</h5>
                                    <span class="fg-gray fs-small">Founder | Owner | Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('public.partials.footer')