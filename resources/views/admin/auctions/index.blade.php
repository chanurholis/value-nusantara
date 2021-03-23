@extends('layouts.admin-master')

@section('title', 'Lelang')

@section('title-header', 'Lelang')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-primary">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    @foreach ($auctions as $auciton)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
        <article class="article article-style-b">
            <div class="article-header">
                <div class="article-image"><img src="{{ asset('goodsFile/' . $auciton->goods->photo) }}" style="max-width:100%; height:auto;"></div>
                <div class="article-badge">
                    <div class="article-badge-item bg-danger">Rp. {{ $auciton->goods->initial_price }}</div>
                </div>
            </div>
            <div class="article-details">
                <div class="article-title">
                    <h2><a href="#">{{ $auciton->goods->goods }}</a></h2>
                </div>
                <p>{{ substr($auciton->goods->description, 0, 55) }}...</p>
                <div class="article-cta">
                    <a href="{{ '/admin/auctions/' . $auciton['id'] }}">Lanjut <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>

<script>
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
                url: "{{url('/admin/auctions/')}}/" + id,
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