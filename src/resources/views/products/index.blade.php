@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
  <section>
    <div class="search">
      <h2>商品一覧</h2>
      <form class="create-btn" action="/products/register" method="post">
        @csrf
        <button class="create-btn__button" type="submit">＋商品を追加</button>
      </form>
    </div>
  </section>
  <section>
    <div class="blade__inner">
      <form class="search-form" method="post" action="products/search" class="mb-4">
        @csrf
        <input class="search-form__keyword-input" type="text" name="keyword" placeholder="商品名で検索">
        <button type="submit">検索</button>
        <p class="search-price">価格順で表示</p>
        <select name="sort">
          <option value="">価格で並び替え</option>
          <option value="asc">価格の安い順</option>
          <option value="desc">価格の高い順</option>
        </select>
      </form>
      <div class="card">
        @foreach ($products as $product)
        <div class="card-content">
          <a href="{{ route('products.edit', $product->id) }}" class="card-img">
            <div class="content-img">
              <img src="{{ asset($product->image) }}" alt="商品画像">
            </div>
            <div class="text-box">
              <h3 class="card-name">{{ $product->name }}</h3>
              <p class="card-price">¥{{ number_format($product->price) }}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
      <!-- ページネーション -->
    <div class="pagination">
        {{ $products->links() }}
    </div>
  </section> 
@endsection