@extends('layouts.admin-master')

@section('title', 'Petugas')

@section('title-header', 'Petugas')

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
        <h4>Petugas <span>({{ $officers->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.officers.create') }}" class="btn btn-danger">Ekspor <i class="fas fa-file-export"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama</th>
                    <th scope="col">Surel</th>
                    <th scope="col">Wewenang</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    @foreach ($officers as $officer)      
                    <tr>
                        <td>{{ $officer['name'] }}</td>
                        <td>{{ $officer['email'] }}</td>
                        <td>{{ officer_level($officer->level_id) }}</td>
                        <td>@if ($officer['email_verified_at']) <div class="badge badge-success">Aktif</div> @else <div class="badge badge-danger">Belum Aktif</div> @endif</td>
                        <td class="text-right">
                            <form action="{{ '/admin/officers/' . $officer->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <a href="{{ '/admin/officers/' . $officer['id'] . '/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ '/admin/officers/' . $officer['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
                            </form>
                            {{-- <a href="#" class="btn btn-danger" onclick="deleteConfirmation({{ $officer['id'] }})"><i class="fa fa-trash"></i></a> --}}
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
                {{-- {{ $officers->links() }} --}}
            </ul>
        </nav>
    </div>
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
                url: "{{url('/admin/officers/')}}/" + id,
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