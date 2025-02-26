@extends('layouts.app')

@section('content')
<div class="container">
    <h2>商品編集: {{ $product->name }}</h2>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">値段</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="seasons">季節</label>
            <form action="register-product_season" method="post" value="{{ old('seasons', $product->seasons) }}" required>
            <label><input type="checkbox" name="seasons[]" value="spring"> 春</label>
            <label><input type="checkbox" name="seasons[]" value="summer"> 夏</label>
            <label><input type="checkbox" name="seasons[]" value="autumn"> 秋</label>
            <label><input type="checkbox" name="seasons[]" value="winter"> 冬</label>
            </form>

        <div class="form-group">
            <label for="image">商品画像</label><br>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150"><br><br>
            @endif
            <input type="file" name="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary">変更を保存</button>
    </form>
</div>
@endsection
