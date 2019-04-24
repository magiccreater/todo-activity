@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-4 is-offset-4">
        <nav class="panel login">
            <p class="panel-heading">
                Register
            </p>
            <div class="panel-block">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="field">
                        <label class="label">Name</label>
                        <input id="name" type="text" class="input is-medium" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                        @if ($errors->has('name'))
                            <span class="error-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <input id="email" type="email" class="input is-medium" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="error-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <input id="password" type="password" class="input is-medium" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="error-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="input is-medium" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div>
                        <button type="submit" class="button is-info is-medium">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
