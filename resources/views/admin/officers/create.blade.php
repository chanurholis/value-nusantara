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
                        <div class="form-group col-6">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" id="first_name" value="{{ old('first_name') }}" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Nama Depan" autofocus>
                            <div class="invalid-feedback">
                                @error('first_name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" id="last_name" value="{{ old('last_name') }}" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Nama Belakang" autofocus>
                            <div class="invalid-feedback">
                                @error('last_name') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Surel</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="surel@contoh.com">
                            <div class="invalid-feedback">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="phone_number">No. Telepon</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Minimal 8-14 Angka">
                            <div class="invalid-feedback">
                                @error('phone_number') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="level">Wewenang</label>
                            <select name="level_id" id="level" class="form-control">
                                <option value="" selected>-- Pilih Wewenang --</option>
                                @foreach ($levels as $key => $level)
                                    @if (old('level_id') == $key)
                                        <option value="{{ $key }}" selected>{{ translation_level($level) }}</option>
                                    @else 
                                        <option value="{{ $key }}">{{ translation_level($level) }}</option>
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