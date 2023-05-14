@extends('base')
@section('content')
<main class="login-form flex-grow-1">
    <div class="cotainer">
        <div class="row justify-content-center w-100 mt-5">
            <div class="col-md-4 px-5">
                <div class="card mb-4">
                    <h3 class="card-header text-center">Halaman Login</h3>
                    <div class="card-body px-5">
                        <form method="POST" action="{{ route('login.custom') }}" class="my-5">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" class="form-control" name="username" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                            <div class="row mx-auto mt-5">
                                <div class="col ps-0 pe-1">
                                    <button type="submit" class="btn btn-success btn-block w-100">Login</button>
                                </div>
                                <div class="col ps-1 pe-0">
                                    <button class="btn btn-secondary btn-block w-100" id="clear-button">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection