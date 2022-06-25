@extends('layouts.public-master')

@section('title', ' | Kontak')

@section('content')
<div class="bg-light">
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(mobster/assets/img/hero_mini.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h3 class="mb-4 fw-medium">Kontak</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 my-3 wow fadeInUp">
                    <div class="card-page">
                        <div class="row row-beam-md">
                            <div class="col-md-6 text-center py-3 py-md-2">
                                <i class="mai-location-outline h3"></i>
                                <p class="fg-primary fw-medium fs-vlarge">Lokasi</p>
                                <p class="mb-0">Subang, Jawa Barat.</p>
                            </div>
                            <div class="col-md-6 text-center py-3 py-md-2">
                                <i class="mai-mail-open-outline h3"></i>
                                <p class="fg-primary fw-medium fs-vlarge">Surel</p>
                                <a href="mailto:nusantaravalue@gmail.com" class="mb-1">nusantaravalue@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12 my-3 wow fadeInUp">
                    <div class="card-page">
                        <h3 class="fw-normal">Get in touch</h3>
                        <form method="POST" class="mt-3">
                            <div class="form-group">
                                <label for="name" class="fw-medium fg-grey">Fullname</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="fw-medium fg-grey">Email</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="fw-medium fg-grey">Phone(optional)</label>
                                <input type="number" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="message" class="fw-medium fg-grey">Message</label>
                                <textarea rows="6" class="form-control" id="message"></textarea>
                            </div>
                            <p>*Your information will never be shared with any third party.</p>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection