@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection
@section('nav')
  <a class="header__nav-button" href="/login">login</a>
@endsection

@section('content')
<div class="register__content">
  <div class="register__heading">
    <h2>Register</h2>
  </div>
  <form class="form" action="/register" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        お名前
      </div>
      <input class="form__group-content" type="text" name="name" placeholder="例:山田　太郎">
      <div class="form__error">
          @error('name')
            {{$message}}
          @enderror
      </div>
    </div>
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
    <div class="form__button">
      <button class="form__button-submit">登録</button>
    </div>
  </form>
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