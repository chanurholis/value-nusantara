@extends('layouts.admin-master')

@section('title', '| Barang Baru')

@section('title-header', 'Barang Baru')

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <form action="{{ route('admin.goodies.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    {{-- <div class="row">
                        <div class="form-group col">
                            <label class="col-form-label">Foto</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="photo" id="image-upload" />
                            </div>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="form-group col">
                            <label for="photo">Foto</label>
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('photo') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="goods">Nama Barang</label>
                            <input type="text" id="goods" value="{{ old('goods') }}" name="goods" class="form-control @error('goods') is-invalid @enderror" placeholder="Nama Barang" autofocus>
                            <div class="invalid-feedback">
                                @error('goods') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="initial_price">Harga Awal</label>
                            <input type="text" id="initial_price" value="{{ old('initial_price') }}" name="initial_price" class="form-control @error('initial_price') is-invalid @enderror" placeholder="Rp. 000.000">
                            <div class="invalid-feedback">
                                @error('initial_price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="description">Deskripsi Barang</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi Barang">{{ old('description') }}</textarea>
                            <div class="invalid-feedback">
                                @error('description') {{ $message }} @enderror
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

<script type="text/javascript">
    var rupiah = document.getElementById('initial_price');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		  = number_string.split(','),
        sisa     		  = split[0].length % 3,
        rupiah     		  = split[0].substr(0, sisa),
        ribuan     		  = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection