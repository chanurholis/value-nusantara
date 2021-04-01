@extends('layouts.user-master')

@section('title', 'Persyaratan Lelang')

@section('title-header', Auth::user()->name)

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg">
        <div class="card">
            <form action="{{ route('user.identity-card') }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="photo">Foto KTP</label>
                            <input type="file" name="photo" id="phto" class="form-control @error('photo') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('photo') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" value="{{ old('nik') }}" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="16 Digit" autofocus>
                            <div class="invalid-feedback">
                                @error('nik') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="place_of_birth">Tempat Lahir</label>
                            <input type="text" id="place_of_birth" value="{{ old('place_of_birth') }}" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" placeholder="Tempat Lahir">
                            <div class="invalid-feedback">
                                @error('place_of_birth')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="date_of_birth">Tanggal Lahir</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth'), date('m-d-Y') }}" class="form-control @error('date_of_birth') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('date_of_birth') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">-- Jenis Kelamin --</option>
                                @foreach ($genders as $gender)
                                    @if ($gender == old('gender'))
                                        <option value="{{ $gender }}" selected>{{ $gender }}</option>
                                    @else 
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('gender') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="profession">Pekerjaan</label>
                            <input type="text" name="profession" id="profession" value="{{ old('profession') }}" class="form-control @error('profession') is-invalid @enderror" placeholder="Pekerjaan">
                            <div class="invalid-feedback">
                                @error('profession') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="province">Provinsi</label>
                            <select name="province" id="province" class="form-control @error('province') is-invalid @enderror">
                                <option value="">-- Provinsi --</option>
                                @foreach ($provinces as $province)
                                    @if ($province->id == old('province'))
                                        <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                    @else 
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('province') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="city">Kabupaten/Kota</label>
                            <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                <option value="">-- Kabupaten/Kota --</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('city') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="district">Kecamatan</label>
                            <select name="district" id="district" class="form-control @error('district') is-invalid @enderror">
                                <option value="">-- Kecamatan --</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('district') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="village">Desa</label>
                            <select name="village" id="village" class="form-control @error('village') is-invalid @enderror">
                                <option value="">-- Desa --</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('village') {{ $message }} @enderror
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

@push('js')
<script src="{{ asset('stisla/assets/js/axios.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#province').on('change', function () {
            axios.post('{{ route('user.city') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#city').empty();

                    $.each(response.data, function (id, name) {
                        $('#city').append(new Option(name, id))
                    })
                });
        });
    });

    $(function () {
        $('#city').on('change', function () {
            axios.post('{{ route('user.district') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#district').empty();

                    $.each(response.data, function (id, name) {
                        $('#district').append(new Option(name, id))
                    })
                });
        });
    });

    $(function () {
        $('#district').on('change', function () {
            axios.post('{{ route('user.village') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#village').empty();

                    $.each(response.data, function (id, name) {
                        $('#village').append(new Option(name, id))
                    })
                });
        });
    });
</script>
@endpush