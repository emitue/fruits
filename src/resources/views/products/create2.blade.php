@extends('layouts.app')

@section('content')
<div class="container">
    <h2>商品登録</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">価格</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
