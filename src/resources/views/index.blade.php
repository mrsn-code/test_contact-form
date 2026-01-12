@extends('layouts.form')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__separated">
          <input class="form__separated--text" type="text" name="last_name" value="{{old('last_name')}}" placeholder="例：山田">
          <input class="form__separated--text" type="text" name="first_name" value="{{old('first_name')}}" placeholder="例：太郎">
        </div>
        <div class="form__error">
          @error('last_name')
            {{$message}}
          @enderror
          @error('first_name')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__radio">
          <div class="form__radio-button">
            <input type="radio" name="gender" id="male" value="1"
            {{old('gender', session('form.gender', '1'))=='1' ? 'checked':''}}><label for="male">男性</label>
          </div>
          <div class="form__radio-button">
            <input type="radio" name="gender" id="female" value="2"
            {{old('gender', session('form.gender', '1'))=='2' ? 'checked':''}}><label for="female">女性</label>
          </div>
          <div class="form__radio-button">
            <input type="radio" name="gender" id="other" value="3"
            {{old('gender', session('form.gender', '1'))=='3' ? 'checked':''}}><label for="other">その他</label>
          </div>
        </div>
        <div class="form__error">
          @error('gender')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input class="form__input--text" type="text" name="email" value="{{old('email')}}" placeholder="例: test@example.com">
        </div>
        <div class="form__error">
          @error('email')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__separated">
          <input class="form__separated--number" type="text" name="tel_first" value="{{old('tel_first')}}" placeholder="080">
          <div>-</div>
          <input class="form__separated--number" type="text" name="tel_second" value="{{old('tel_second')}}" placeholder="1234">
          <div>-</div>
          <input class="form__separated--number" type="text" name="tel_third" value="{{old('tel_third')}}" placeholder="5678">
        </div>
        <div class="form__error">
          @error('tel_first')
            {{$message}}
          @enderror
          @error('tel_second')
            {{$message}}
          @enderror
          @error('tel_third')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input class="form__input--text" type="text" name="address" value="{{old('address')}}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        <div class="form__error">
          @error('address')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <input class="form__input--text" type="text" name="building" value="{{old('building')}}" placeholder="例: 千駄ヶ谷マンション">
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <select name="category_id">
            <option value="" selected>選択してください</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}"
              {{old('category_id', session('form.category_id', ''))==$category->id ? 'selected':''}}>{{$category->content}}</option>
            @endforeach
          </select>
        </div>
        <div class="form__error">
          @error('category_id')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
            {{$message}}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit">確認画面</button>
    </div>
  </form>
</div>
@endsection