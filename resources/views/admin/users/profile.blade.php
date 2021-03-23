@extends('layouts.admin-master')

@section('title', 'Profil')

@section('title-header', 'Profil')

@section('content')
<h2 class="section-title">Hai, {{ Auth::user()->name }}</h2>
<p class="section-lead">
    Ubah informasi tentang diri Anda di halaman ini.
</p>

<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-5">
    <div class="card profile-widget">
        <div class="profile-widget-header">
        <img alt="image" src="http://172.20.10.3/TEMPLATE/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
        <div class="profile-widget-items">
            <div class="profile-widget-item">
            <div class="profile-widget-item-label">Barang</div>
            <div class="profile-widget-item-value">187</div>
            </div>
            <div class="profile-widget-item">
            <div class="profile-widget-item-label">Lelang</div>
            <div class="profile-widget-item-value">6,8K</div>
            </div>
            <div class="profile-widget-item">
            <div class="profile-widget-item-label">Terjual</div>
            <div class="profile-widget-item-value">2,1K</div>
            </div>
        </div>
        </div>
        <div class="profile-widget-description">
        <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
        {{ Auth::user()->name }} is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
        </div>
        <div class="card-footer text-center">
        <div class="font-weight-bold mb-4"></div>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
    <div class="card">
        <form method="post" class="needs-validation" novalidate="">
        <div class="card-header">
            <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                <label>First Name</label>
                <input type="text" class="form-control" value="Ujang" required="">
                <div class="invalid-feedback">
                    Please fill in the first name
                </div>
                </div>
                <div class="form-group col-md-6 col-12">
                <label>Last Name</label>
                <input type="text" class="form-control" value="Maman" required="">
                <div class="invalid-feedback">
                    Please fill in the last name
                </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                <label>Email</label>
                <input type="email" class="form-control" value="ujang@maman.com" required="">
                <div class="invalid-feedback">
                    Please fill in the email
                </div>
                </div>
                <div class="form-group col-md-6 col-12">
                <label>Phone</label>
                <input type="tel" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Save Changes</button>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection