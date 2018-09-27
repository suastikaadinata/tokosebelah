@extends('admin.layout')

@section('title', 'User')

@section('title-header', 'List User')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Jumlah Iklan</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="fit">{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ count($user->iklan) }}</td>
                <td class="fit">
                    <button data-id="{{ $user->id }}" class="btn btn-xs btn-danger hapus-user-btn"
                        data-toggle="modal" data-target=".hapus-user">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade hapus-user" tabindex="-1" role="dialog" aria-labelledby="hapusUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    <h4 class="model-title">Hapus user ini?</h4>
                </div>
                <div class="modal-body">
                    <P>
                        Apakah anda yakin ingin menghapus user ini<br/>
                        Semua iklan oleh user ini juga akan terhapus!!
                    </p>
                </div>
                <div class="modal-footer">
                    <form data-url="{{ url('/admin/list-user/delete') }}" method="POST" action="">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                            Batal
                        </button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection