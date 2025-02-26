@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('register.css') }}">
@endsection

@section('content')
<main>
  <div class="register-form">
    <h2 class="register-form__heading content__heading">登録確認</h2>
    <div class="register-form__inner">
      <form class="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="register-form__name">
          <p class="register-form__category">商品名</p>
          <input class="confirm-product_name" type="text" name="name" value="{{ $product['name'] }}" readonly />
        </div>
        <div class="register-form__price">
          <p class="register-form__category">値段</p>
          <input class="register-product_price" type="number" name="price" value="{{ $product['price'] }}" readonly />
        </div>
        <div class="register-form__img">
          <p class="register-form__category">商品画像</p>
          <input class="register-product_img" type="file" name="product_image" value="{{ $product['image'] }}" readonly />
        <div class="register-form__season">
          <p class="register-form__category">季節</p>
          <p class="register-form__category-required-ok">複数選択可</p>
          <form action="register-product_season" method="post">
            <label><input type="checkbox" name="seasons[]" value="{{ $product['seasons[]'] }}" readonly /> 春</label>
            <label><input type="checkbox" name="seasons[]" value="{{ $product['seasons[]'] }}" readonly /> 夏</label>
            <label><input type="checkbox" name="seasons[]" value="{{ $product['seasons[]'] }}" readonly /> 秋</label>
            <label><input type="checkbox" name="seasons[]" value="{{ $product['seasons[]'] }}" readonly /> 冬</label>
          </form>
        </div>
        <div class="register-form__season">
          <p class="register-form__category">商品説明</p>
          <input class="register-product_text" type="text" name="text" value="{{ $product['description'] }}" readonly />
        </div>
        <div class="register-form__btn-inner">
          <button class="register-form__back-btn" type="submit" name="back">戻る</button>
          <button class="register-form__entry-btn" type="submit" name="entry">登録</button>
        </div>
      </form>
    </div>
  </section>
</main>
@endsection

