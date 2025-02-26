@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<main>
  <div class="register-form">
    <h2 class="register-form__heading content__heading">商品登録</h2>
    <div class="register-form__inner">
      <!-- <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"> -->
      <form action="/products/update" method="post">
        @method('PATCH')
        @csrf
        <div class="register-form__name">
          <div class="register-form__label">
            <p class="register-form__category">商品名</p>
            <p class="register-form__category-required">必須</p>
          </div>
          <input class="register-product_name" type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力" required>
          <input type="hidden" name="id" value="{{ $products['id'] }}">
          <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__price">
          <div class="register-form__label">
            <p class="register-form__category">値段</p>
            <p class="register-form__category-required">必須</p>
          </div>
          <input class="register-product_price" type="number" name="price" value="{{ old('price') }}" placeholder="値段を入力" required>
          <div class="form__error">
            @error('price')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__img">
          <div class="register-form__label">
            <p class="register-form__category">商品画像</p>
            <p class="register-form__category-required">必須</p>
          </div>
          <label for="product_image" class="custom-file-label">画像を選択</label>
          <input class="register-product_img" type="file" name="product_image" id="product_image" accept="//src/storage/fruits-img/" accept="image/*" required>
          <div class="form__error">
            @error('image')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__season">
          <div class="register-form__label">
            <p class="register-form__category">季節</p>
            <p class="register-form__category-required">必須</p>
            <p class="register-form__category-required-ok">複数選択可</p>
          </div>
          <form action="register-product_season" method="post" required>
            <label><input type="checkbox" name="seasons[]" value="spring"> 春</label>
            <label><input type="checkbox" name="seasons[]" value="summer"> 夏</label>
            <label><input type="checkbox" name="seasons[]" value="autumn"> 秋</label>
            <label><input type="checkbox" name="seasons[]" value="winter"> 冬</label>
          </form>
          <div class="form__error">
            @error('season')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__season">
          <div class="register-form__label">
            <p class="register-form__category">商品説明</p>
            <p class="register-form__category-required">必須</p>
          </div>
          <textarea class="register-product_text" type="text" name="description" rows="5" cols="40" placeholder="商品の説明を入力" required>{{ old('description') }}</textarea>
          <div class="form__error">
            @error('description')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__btn">
          <input class="register-form__btn-back" type="submit" name="back" value="戻る">
          <input class="register-form__btn-entry" type="submit" name="entry" value="登録">
        </div>
      </form>
    </div>
  </section>
</main>
@endsection

