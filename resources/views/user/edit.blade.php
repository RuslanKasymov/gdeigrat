@extends('layouts.user')

@section('content')
    <div class="title">Редактирование пользователя</div>
    <div class="auth-form">
        <img src="{{  "$user->avatar" }}" alt="{{ $user->name }}">
        <h2>{{ $user->name }}'s Profile</h2>
        <form enctype="multipart/form-data" method="POST" action="/users/{{ $user->id }}/updateAvatar">
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="pull-right btn btn-sm btn-primary">
        </form>
        @if(!empty($success_update_avatar))
            <div>{{$success_update_avatar}}</div>
        @endif
    </div>
    <div class="auth-form">
        <form method="POST" action="/users/{{ $user->id }}/update">
            @csrf
            <label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name')?:$user->name }}" placeholder="{{ __('auth.name') }}" required
                       autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </label>
            <label>
                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                       name="surname" value="{{ old('surname')?:$user->surname }}"
                       placeholder="{{ __('auth.surname') }}">

                @if ($errors->has('surname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
            </label>
            <label>
                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                       name="phone" value="{{ old('phone')?:$user->phone }}" placeholder="{{ __('auth.phone') }}"
                       required>

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </label>
            <label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email')?:$user->email }}" placeholder="{{ __('auth.email') }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </label>
            <label>
                <input id="city" type="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                       name="city" value="{{ old('city')?:$user->city }}" placeholder="{{ __('auth.city') }}">

                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </label>
            <button class="btn-gp">Сохранить</button>
        </form>
    </div>
@endsection