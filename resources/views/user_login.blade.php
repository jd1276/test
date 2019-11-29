@extends('layouts.main')

@section('content')
<div class="container">

    @if (Session::has('error'))
    <div class="alert alert-warning" role="alert">
        {{Session::get('error')}}
    </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-warning" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">User LogIn</h5>
                    <form class="form-signin" method="POST" action="{{ route('user-login') }}">
                        @csrf
                        <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

                        </div>

                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

                        </div>
                        <br/>

                        <button class="btn btn-sm btn-primary btn-block text-uppercase" type="submit">Sign in</button>

                        <button class="btn btn-sm btn-primary btn-block text-uppercase" style="cursor: pointer" onclick="window.location='{{route('register')}}'">Register</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
