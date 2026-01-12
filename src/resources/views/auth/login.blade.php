@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection
@section('nav')
  <a class="header__nav-button" href="/register">register</a>
@endsection

@section('content')
<div class="register__content">
  <div class="register__content-inner">
    <div class="register__heading">
      <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          メールアドレス
        </div>
        <input class="form__group-content" type="text" name="email" placeholder="例:test@example.com">
        <div class="form__error">
          @error('email')
            {{$message}}
          @enderror
      </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          パスワード
        </div>
        <input class="form__group-content" type="text" name="password" placeholder="例:coachtech1106">
        <div class="form__error">
          @error('password')
            {{$message}}
          @enderror
      </div>
      </div>
      <button class="form__button-submit">ログイン</button>
    </form>
  </div>
</div>

@if ($errors->any())
  <div style="color:red;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@endsection