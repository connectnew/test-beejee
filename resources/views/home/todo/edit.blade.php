
@extends('layouts.index')

@section('content')

    <form action="/todo/edit?id={{ $todo->id }}" method="post">

        <div class="form-group">
            <label>User Name</label>
            <input type="text"
                   name="user_name"
                   value="{{ $auth->name }}"
                   class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}"
                   readonly />

            @if ($errors->has('user_name'))
                <div class="invalid-feedback">
                    <span>{{ $errors->first('user_name') }}</span>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>User Email</label>
            <input type="email"
                   name="user_email"
                   value="{{ $auth->email }}"
                   class="form-control {{ $errors->has('user_email') ? 'is-invalid' : '' }}"
                   aria-describedby="emailHelp"
                   readonly />
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>

            @if ($errors->has('user_email'))
                <div class="invalid-feedback">
                    <span>{{ $errors->first('user_email') }}</span>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>Text</label>
            <textarea name="text"
                      rows="3"
                      class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"
            >{!! $todo->text !!}</textarea>

            @if ($errors->has('text'))
                <div class="invalid-feedback">
                    <span>{{ $errors->first('text') }}</span>
                </div>
            @endif
        </div>

        @if ($auth->role === 'admin')
            <div class="form-group form-check">
                <input type="checkbox"
                       name="ready"
                       value="1"
                       class="form-check-input" {{ $todo->ready ? 'checked' : '' }}/>
                <label class="form-check-label">Mark as Done</label>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>

        @if ($errors->any())
            <div class="alert alert-warning mt-3" role="alert">
                Data has been not saved!
            </div>
        @endif
    </form>

@endsection