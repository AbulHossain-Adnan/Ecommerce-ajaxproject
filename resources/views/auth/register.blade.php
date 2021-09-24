@extends('layouts.app')
@section('userMain')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span
                    class="tx-info tx-normal">admin</span></div>
            <div class="tx-center mg-b-60">User Registration</div>
            <div class="form-group">
                <div class="form-group row">

                    <div class="col-12">
                        <input placeholder="Name" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input placeholder="Email" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input placeholder="Password" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign Up</button>

            <div class="mg-t-60 tx-center">already registered ? <a href="{{ route('login') }}" class="tx-info">Sign
                    In</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
</form>
@endsection