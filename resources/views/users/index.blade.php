<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD</title>
    {{-- Bootstrap--}}
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card border-0 my-3 shadow">
                <div class="card-body">
                    <h1 class="text-center">CRUD</h1>
                    <form class="form-row d-flex justify-content-center"
                          action="{{ route('users.store') }}"
                          method="POST">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" placeholder="Email"
                                   name="email"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" placeholder="Password"
                                   name="password"
                                   value="{{ old('password') }}">
                        </div>
                        <div class="col-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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

</main>
</body>
</html>
