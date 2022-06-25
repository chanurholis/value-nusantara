@extends('layouts.admin-master')

@section('title', '| Detail Lelang')

@section('title-header', 'Detail Lelang')

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
                            <td><img src="{{ asset('goodsFile/' . $model->goods->photo) }}" style="max-width:100%; height:auto;"></td>
                        </tr>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <td>{{ $model->goods->goods }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Harga Akhir</th>
                            <td>Rp. {{ $model->final_price }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Desktripsi</th>
                            <td>{{ $model->goods->description }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Petugas</th>
                            <td>{{ $model->officer }}</tdchr>
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
                            <th scope="col">Status</th>
                            <td>@if ($model['status'] == 'opened') <div class="badge badge-success">{{ auction_status($model['status']) }}</div> @else <div class="badge badge-warning">{{ auction_status($model['status']) }}</div> @endif</td>
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
            <form action="{{ '/admin/auctions/' . $model->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $model->start_date, date('Y-m-d') }}">
                            <div class="invalid-feddback">
                                @error('start_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="end_date">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $model->end_date, date('Y-m-d') }}">
                            <div class="invalid-feddback">
                                @error('end_date') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @foreach ($status as $item)
                                    @if ($model->status == $item)
                                        <option value="{{ $item }}" selected>{{ auction_status($item) }}</option>
                                    @else 
                                        <option value="{{ $item }}">{{ auction_status($item) }}</option>
                                    @endif
                                @endforeach
                            </select>
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