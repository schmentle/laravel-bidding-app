@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    {{ Form::open(['route' => 'login']) }}
                        <div class="form-label-group py-3">
                            {{ Form::email('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid':'')]) }}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-label-group py-3">
                            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid':'')]) }}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            {{ Form::checkbox('remember', old('remember') ? 'checked' : '', [ 'id' => 'remember']) }}
                            <label class="label" for="remember">Remember me</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-4">
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
