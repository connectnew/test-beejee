
@extends('layouts.index')

@section('content')

<form action="/regist" method="post">
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
        <label>Email</label>
        <input type="email" name="email"
               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
               aria-describedby="emailHelp" />
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>

        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <span>{{ $errors->first('email') }}</span>
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
    <div class="form-group">
        <label>Repeat Password</label>
        <input type="password" name="password_confirmation"
               class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" />

        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                <span>{{ $errors->first('password_confirmation') }}</span>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    @if ($errors->any())
        <div class="alert alert-warning mt-3" role="alert">
            You has been not sign up!
        </div>
    @endif
</form>

@endsection
