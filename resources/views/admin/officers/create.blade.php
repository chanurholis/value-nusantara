@extends('layouts.admin-master')

@section('title', 'Petugas Baru')

@section('title-header', 'Petugas Baru')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <form action="{{ route('admin.officers.store') }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" autofocus>
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" id="username" value="{{ old('username') }}" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Nama Pengguna">
                            <div class="invalid-feedback">
                                @error('username') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="form-group col">
                            <label for="email">Surel</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="surel@contoh.com">
                            <div class="invalid-feedback">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="form-group col">
                            <label for="level">Wewenang</label>
                            <select name="level_id" id="level" class="form-control">
                                <option value="" selected>-- Pilih Wewenang --</option>
                                @foreach ($levels as $level)
                                    @if (old('level_id') == $level->id)
                                        <option value="{{ $level->id }}" selected>{{ $level->level }}</option>
                                    @else 
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter & berisi alfanumerik" autocomplete="new-password">
                            <div class="invalid-feedback">
                                @error('password') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label for="password2">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" id="password2" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter & berisi alfanumerik" autocomplete="new-password">
                            <div class="invalid-feedback">
                                @error('password') {{ $message }} @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group row mb-4 float-right">
                        <div class="col-sm-12 col-md-7 float-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection