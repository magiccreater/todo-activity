@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-4 is-offset-4">
        <nav class="panel login">
            <p class="panel-heading">
                Reset Password
            </p>
            <div class="panel-block">
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                    <div class="field">
                        <label class="label">E-Mail Address</label>
                        <input id="email" type="email" class="input is-medium" name="email" value="{{ $email or old('email') }}" placeholder="E-Mail Address" required autofocus>
                        @if ($errors->has('email'))
                            <span class="error-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <input id="password" type="password" class="input is-medium" name="password" required>
                        @if ($errors->has('password'))
                            <span class="error-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="field">
                        <label class="label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="input is-medium" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="button is-info is-medium">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection
