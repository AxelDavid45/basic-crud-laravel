@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card border-0 my-3 shadow">
                <div class="card-body">
                    @include('users.form')
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route("users.destroy", ['user' => $user]) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick=" return confirm('¿Estas seguro de borrar el usuario?')"
                                    type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
