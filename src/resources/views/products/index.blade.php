@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
  <section>
    <div class="search">
      <h2>商品一覧</h2>
      <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">＋商品を追加</a>
    </div>
  </section>
  <section>
    <div class="blade__inner">
      <form class="search-form" method="GET" action="{{ route('products.index') }}" class="mb-4">
        @csrf
        <input class="search-form__keyword-input" type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword', $keyword) }}">
        <button type="submit">検索</button>
        <p class="search-price">価格順で表示</p>
        <select name="sort">
          <option value="">価格で並び替え</option>
          <option value="src">価格の安い順</option>
          <option value="desc">価格の高い順</option>
        </select>
      </form>
      @if($products->count())
      <div class="goods_list">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
          <a href="{{ route('products.show', $product) }}" class="text-decoration-none text-dark">
            <div class="card h-100">
              @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name }}" width="150">
              @else
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image">
              </div>
              @endif
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">¥{{ number_format($product->price) }}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>
      @endif
      <!-- ページネーション -->
      <div class="d-flex justify-content-center">
        {{ $products->appends(['keyword' => $keyword])->links() }}
      </div>
    </div>
  </section> 
@endsection