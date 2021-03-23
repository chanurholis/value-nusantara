@extends('layouts.admin-master')

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
                            <td><img src="{{ asset('goodsFile/' . $model->photo) }}" style="max-width:100%; height:auto;"></td>
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
                            <th scope="col">Desktripsi</th>
                            <td>{{ $model->description }}</td>
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
                            <td><a href="#" class="btn btn-danger" onclick="deleteConfirmation({{ $model['id'] }})">Hapus</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-6">
        <div class="card">
            <form action="{{ '/admin/goodies/' . $model->id }}" method="post" enctype="multipart/form-data">
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

    function deleteConfirmation(id) {
    swal({
        title: "Hapus Pengguna?",
        text: "Harap pastikan dan konfirmasi!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, jangan!",
        reverseButtons: !0
    }).then(function (e) {
        if (e.value === true) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url: "{{url('/admin/goodies/')}}/" + id,
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON',
                success: function (results) {
                    if (results.success === true) {
                        swal("Berhasil!", results.message, "success");
                    } else {
                        swal("Gagal!", results.message, "error");
                    }
                }
            });
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
        return false;
    })
}
</script>
@endsection