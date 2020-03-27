@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            - {{ $error }}<br>
        @endforeach
    </div>
@endif
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
