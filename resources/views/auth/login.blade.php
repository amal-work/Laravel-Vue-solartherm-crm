@extends('layouts.simple')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-2">
                    <div class="card-block">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="email" required
                                       {{ old('email') }} placeholder="Email">
                            </div>
                            {!! $errors->first('email', '<div class="alert alert-danger">:message</div>') !!}
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" required name="password"
                                       placeholder="Password">
                            </div>
                            {!! $errors->first('password', '<div class="alert alert-danger">:message</div>') !!}
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-2">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button onclick="location.href='{{ route('password.request') }}'" type="button"
                                            class="btn btn-link px-0">Forgot password?
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">--}}
                {{--<div class="card-block text-center">--}}
                {{--<div>--}}
                {{--<h2>Need help?</h2>--}}
                {{--<p>You can always get in touch with Karl Eisenhauer.</p>--}}
                {{--<button type="button" onclick="location.href='mailto:karl.jce@gmail.com'" class="btn btn-primary active mt-1">Email Karl!</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection