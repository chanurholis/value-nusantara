@extends('layouts.user-master')

@section('title', '| Dihapus')

@section('title-header', 'Dihapus')

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
        <h4>Dihapus <span>({{ $trashed->count() }})</span></h4>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Tanggal Dihapus</th>
                    <th scope="col"></th>
                    @foreach ($trashed as $trash)
                    <tr>
                        <td>{{ $trash['goods'] }}</td>
                        <td>Rp. {{ $trash['initial_price'] }}</td>
                        <td>{{ $trash['deleted_at'] }}</td>
                        <td class="text-right">
                            <a href="{{ '/user/restore/' . $trash['id'] }}" class="btn btn-primary">Pulihkan <i class="fa fa-trash-restore"></i></a>
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
                {{-- {{ $trashed->links() }} --}}
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
@endsection
