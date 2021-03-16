@extends('layouts.admin-master')

@section('title', 'Pengguna')

@section('title-header', 'Pengguna')

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
        <h4>Pengguna <span>({{ $users->count() }})</span></h4>
        <div class="card-header-action">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <th scope="col">Nama</th>
                    <th scope="col">Surel</th>
                    <th scope="col"></th>
                    @foreach ($users as $user)      
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-danger @if($user['id'] == Auth::user()->id) d-none @endif" onclick="deleteConfirmation({{ $user['id'] }})"><i class="fa fa-trash"></i></a>
                            <a href="{{ '/admin/users/' . $user['id'] . '/edit' }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ '/admin/users/' . $user['id'] }}" class="btn btn-info"><i class="fa fa-search"></i></a>
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
                {{-- {{ $users->links() }} --}}
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
                url: "{{url('/admin/users/')}}/" + id,
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