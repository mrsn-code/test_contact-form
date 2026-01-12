@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection
@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>
  <form class="form" action="/thanks" method="post">
    @csrf
    <table class="confirm-table">
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text">
          <p>{{$contact->last_name}}</p>
          <p>{{$contact->first_name}}</p>
          <input type="hidden" name="last_name" value={{$contact->last_name}}>
          <input type="hidden" name="first_name" value={{$contact->first_name}}>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td class="confirm-table__text">
          <p>{{$contact->gender_label}}</p>
          <input type="hidden" name="gender" value={{$contact['gender']}}>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text">
          <p>{{$contact->email}}</p>
          <input type="hidden" name="email" value={{$contact->email}}>
        </td>
      </tr>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__text">
          <p>{{$contact->tel}}</p>
          <input type="hidden" name="tel" value="{{$contact->tel}}">
          <input type="hidden" name="tel_first" value={{$contact->tel_first}}>
          <input type="hidden" name="tel_second" value={{$contact->tel_second}}>
          <input type="hidden" name="tel_third" value={{$contact->tel_third}}>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">住所</th>
        <td class="confirm-table__text">
          <p>{{$contact->address}}</p>
          <input type="hidden" name="address" value={{$contact->address}}>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__text">
          <p>{{$contact->building}}</p>
          <input type="hidden" name="building" value={{$contact->building}}>
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせの種類</th>
        <td class="confirm-table__text">
          <p>{{$category['content']}}</p>
          <input type="hidden" name="category_id" value="{{$contact->category_id}}">
        </td>
      </tr>
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__text">
          <p>{{$contact->detail}}</p>
          <input type="hidden" name="detail" value={{$contact->detail}}>
        </td>
      </tr>
    </table>
    <div class="form__button-group">
      <button class="form__button-submit" type="submit" name="action" value="submit">送信</button>
      <button class="form__button-back" type="submit" name="action" value="back">修正</button>
    </div>
  </form>
</div>
@endsection
