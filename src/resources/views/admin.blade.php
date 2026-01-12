@extends('layouts.app')
@section('nav')
  <form action="/logout" method="post">
    @csrf
    <button class="header__nav-button">logout</button>
  </form>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <div class="search-form">
    <form class="search-form__search" action="/search" method="get">
      @csrf
      <input class="search-form__keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" size="38">
      <select class="search-form__gender" name="gender">
        <option value="" selected>性別</option>
        <option value="" >全て</option>
        <option value="1" >男性</option>
        <option value="2" >女性</option>
        <option value="3" >その他</option>
      </select>
      <select class="search-form__category" name="category_id">
        <option value="" selected>お問い合わせの種類</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->content}}</option>
        @endforeach
      </select>
      <input class="search-form__date" type="date" name="date">
      <button class="search-form__button-submit" type="submit">検索</button>
    </form>
    <form class="search-form__reset" action="reset" method="get">
      @csrf
      <button class="search-form__reset-submit">リセット</button>
    </form>
  </div>
  <div class="list-actions">
    <div>
      <form action="export" method="get">
        @csrf
        <button class="list-actions__export-submit" type="submit">エクスポート</button>
      </form>
    </div>
    <div>{{$contacts->links('vendor.pagination.custom-bootstrap-4')}}</div>
  </div>
  <table class="admin__table">
    <tr class="admin__table--row-head">
      <th class="admin__table-heading">お名前</th>
      <th class="admin__table-heading">性別</th>
      <th class="admin__table-heading">メールアドレス</th>
      <th class="admin__table-heading">お問い合わせの種類</th>
    </tr>
    @foreach($contacts as $contact)
      <tr>
        <td class="admin__table-data">{{$contact->last_name.$contact->first_name}}</td>
        <td class="admin__table-data">{{$contact->gender_label}}</td>
        <td class="admin__table-data">{{$contact->email}}</td>
        <td class="admin__table-data">
          <span class="admin__table-category">
            {{$contact->category->content}}
          </span>
          <span>
            <livewire:contact-detail-button :contact-id="$contact->id" :key="$contact->id">
          </span>
        </td>
      </tr>
    @endforeach
  </table>
</div>


<div id="contact-modal" class="modal-overlay" aria-hidden="true">
  <div class="modal-panel" role="dialog" aria-modal="true">
    <div class="modal-header">
      <button type="button" class="js-close">×</button>
    </div>

    <div class="modal-body">
      <dl>
        <dt>お名前</dt><dd id="m-name"></dd>
        <dt>性別</dt><dd id="m-gender"></dd>
        <dt>メールアドレス</dt><dd id="m-email"></dd>
        <dt>電話番号</dt><dd id="m-tel"></dd>
        <dt>住所</dt><dd id="m-address"></dd>
        <dt>建物名</dt><dd id="m-building"></dd>
        <dt>お問い合わせの種類</dt><dd id="m-category"></dd>
        <dt>お問い合わせ内容</dt><dd id="m-detail" style="white-space:pre-wrap;"></dd>
      </dl>
    </div>

    <div class="modal-footer">
      <form class="delete-form" action="delete" method="post">
        @method('DELETE')
        @csrf
        <div class="delete-form__button">
          <input type="hidden" id="contact_id" name="contact_id">
          <button type="submit">削除</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
.modal-overlay{position:fixed; inset:0; background:rgba(0,0,0,.5); display:none; align-items:center; justify-content:center; padding:16px;}
.modal-overlay.is-open{display:flex;}
.modal-panel{background:#fff; width:min(720px,100%); border-radius:12px; overflow:hidden;}
.modal-header,.modal-footer{padding:12px 16px; border-bottom:1px solid #eee;}
.modal-body{padding:16px;}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('contact-modal');

  const setText = (id, v) => document.getElementById(id).textContent = v ?? '';

  const openModalWith = (data) => {
    setText('m-name', `${data.last_name} ${data.first_name}`);
    setText('m-gender', data.gender);
    setText('m-email', data.email);
    setText('m-tel', data.tel);
    setText('m-address', data.address);
    setText('m-building', data.building);
    setText('m-category', data.category);
    setText('m-detail', data.detail);

    document.getElementById('contact_id').value = data.id;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
  };

  const closeModal = () => {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
  };

  window.addEventListener('contact-modal:open', (e) => {
    openModalWith(e.detail);
  });

  modal.querySelectorAll('.js-close').forEach(btn => btn.addEventListener('click', closeModal));
  modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });
});
</script>
@endsection