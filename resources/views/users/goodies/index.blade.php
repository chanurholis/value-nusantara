@extends('layouts.user-master')

@section('title', '| Barang')

@section('title-header', 'Barang')

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
<div class="card">
    <div class="card-header">
        <h4>Barang <span>({{ $goodies->count() }})</span></h4>
        <div class="card-header-action">
            <button class="btn btn-danger" id="modal-5">Ekspor <i class="fas fa-file-export"></i></button>
        </div>
    </div>
    <!-- Export Modal -->
    <form class="modal-part" id="modal-login-part" action="{{ route('user.goodies.export_filter') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="start_export">Dari</label>
            <div class="input-group">
                <input type="date" name="start_export" id="start_export" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="end_export">Sampai</label>
            <div class="input-group">
                <input type="date" name="end_export" id="end_export" class="form-control">
            </div>
        </div>
    </form>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col"></th>
                    @foreach ($goodies as $goods)
                    <tr>
                        <td>{{ $goods['goods'] }}</td>
                        <td>Rp. {{ $goods['initial_price'] }}</td>
                        <td>{{ $goods['created_at'] }}</td>
                        <td class="text-right">
                            <a href="{{ '/user/goodies/' . $goods['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{-- {{ $goodies->links() }} --}}
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
