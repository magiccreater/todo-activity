@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-4 is-offset-4">
        <nav class="panel login">
            <p class="panel-heading">
                Reset Password
            </p>
            <div class="panel-block">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-medium" id="email" name="email" value="{{ old('email') }}"  type="email" placeholder="E-Mail Address" required autofocus>
                        <span class="icon is-small">
                            <i class="fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="error-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="button is-info is-medium">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>

@endsection
