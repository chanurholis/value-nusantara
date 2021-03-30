@extends('layouts.user-master')

@section('title', '| Profil')

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
                <a href="@if(Auth::user()->avatar == null) {{ asset('stisla/assets/img/avatar/avatar-1.png') }} @elseif(strstr(Auth::user()->avatar, 'https')) {{ Auth::user()->avatar }} @else {{ '/usersFile/' . Auth::user()->avatar }} @endif">
                    <img alt="image" src="@if(Auth::user()->avatar == null) {{ asset('stisla/assets/img/avatar/avatar-1.png') }} @elseif(strstr(Auth::user()->avatar, 'https')) {{ Auth::user()->avatar }} @else {{ '/usersFile/' . Auth::user()->avatar }} @endif" class="rounded profile-widget-picture" style="max-width:100%; height:auto;">
                </a>
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Barang</div>
                        <div class="profile-widget-item-value">{{ $goodies->count() }}</div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">My Lelang</div>
                        <div class="profile-widget-item-value">{{ $auctions->count() }}</div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Mengikuti</div>
                        <div class="profile-widget-item-value">2</div>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Pengguna</div></div>
                {{ Auth::user()->description }}
            </div>
            <div class="card-footer text-center">
                <div class="font-weight-bold mb-4"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <form method="post" action="{{ '/user/profile/' . Auth::user()->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-header">
                    <h4>Perbarui Profil</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md col-12">
                            <label for="avatar">Foto Profil</label>
                            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        </div>
                        <div class="invalid-feedback">
                            @error('avatar') {{ $message }} @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ Auth::user()->first_name }}" autofocus>
                            <div class="invalid-feedback">
                                @error('first_name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ Auth::user()->last_name }}">
                            <div class="invalid-feedback">
                                @error('last_name') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="email">Surel</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') @enderror" value="{{ Auth::user()->email }}">
                            <div class="invalid-feedback">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="phone_numner">No. Telepon</label>
                            <input type="tel" id="phone_number" name="phone_number" class="form-control @error('phone_numner') is-invalid @enderror" value="{{ Auth::user()->phone_number }}">
                            <div class="invalid-feedback">
                                @error('phone_numner') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md col-12">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ Auth::user()->description }}</textarea>
                            <div class="invalid-feedback">
                                @error('description') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection