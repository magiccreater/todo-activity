@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-4 is-offset-4">
        <nav class="panel login">
            <p class="panel-heading">
                Login
            </p>
            <div class="panel-block">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-medium" id="email" name="email" value="{{ old('email') }}"  type="email" placeholder="Email" required autofocus>
                        <span class="icon is-small">
                            <i class="fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="error-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="control has-icons-left">
                        <input class="input is-medium" id="password" name="password" type="password" placeholder="Password" required>
                        <span class="icon is-small">
                            <i class="fa fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="error-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    
                    <div>
                        <button type="submit" class="button is-info is-medium">
                            Login
                        </button>
                    </div>
                    
                </form>
            </div>
        </nav>
    </div>
</div>

@endsection
