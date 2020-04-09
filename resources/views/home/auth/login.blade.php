
@extends('layouts.index')

@section('content')

<form action="/login" method="post">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" />

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <span>{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password"
               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" />

        @if ($errors->has('password'))
            <div class="invalid-feedback">
                <span>{{ $errors->first('password') }}</span>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    @if ($errors->any())
        <div class="alert alert-warning mt-3" role="alert">
            You has been not sign in!
        </div>
    @endif
</form>

    @if ($accessDenied)
        <div class="alert alert-warning mt-3" role="alert">
            You do not have permission for this action.
            @if (empty($_SESSION["auth"]))
                &nbsp;Please sign ip or <a href="/regist">sign up</a> !
            @endif
        </div>
    @endif

@endsection
