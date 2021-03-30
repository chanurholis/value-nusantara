@extends('layouts.user-master')

@section('title', 'Detail Barang')

@section('title-header', 'Detail Barang')

@section('content')
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th scope="col">Foto</th>
                            <td><a href="{{ asset('goodsFile/' . $model->photo) }}"><img src="{{ asset('goodsFile/' . $model->photo) }}" style="max-width:100%; height:auto;"></a></td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <td>{{ $model->goods }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Harga Awal</th>
                            <td>Rp. {{ $model->initial_price }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Deskripsi</th>
                            <td class="text-justify">{{ $model->description }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Dibuat</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Diperbarui</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="col"></th>
                            <td>
                                <div class="card-body">
                                    <form action="{{ '/user/goodies/' . $model->id }}" method="post" id="goodsDelete">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" data-confirm="Yakin?|Apakah Anda ingin melanjutkan?" data-confirm-yes="event.preventDefault(); document.getElementById('goodsDelete').submit();">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <form action="{{ '/user/goodies/' . $model->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="photo">Foto</label>
                            <input type="file" name="photo" id="phto" class="form-control @error('photo') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('photo') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="goods">Nama Barang</label>
                            <input type="text" id="goods" value="{{ $model->goods }}" name="goods" class="form-control @error('goods') is-invalid @enderror" placeholder="Nama Barang" autofocus>
                            <div class="invalid-feedback">
                                @error('goods') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="initial_price">Harga Awal</label>
                            <input type="text" id="initial_price" value="Rp. {{ $model->initial_price }}" name="initial_price" class="form-control @error('initial_price') is-invalid @enderror" placeholder="Rp. 000.000">
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
                            <textarea name="description" id="description" class="form-control @error('initial_price') is-invalid @enderror" placeholder="Deskripsi Barang">{{ $model->description }}</textarea>
                            <div class="invalid-feedback">
                                @error('description') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-4 float-right">
                        <div class="col-sm-12 col-md-7 float-right">
                            <button class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
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

<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endsection