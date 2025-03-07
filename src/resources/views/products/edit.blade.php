@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>商品一覧 > {{ $product->name }}</h2>

    <form class="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <div class="form-group__img">
                <label for="image">商品画像</label><br>
                @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150"><br><br>
                @endif
                <input type="file" name="image" class="form-control-file" @error('image') is-invalid @enderror">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group__name">
                <ul>
                    <li><label for="name">商品名</label></li>
                    <li><input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required></li>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <li><label for="price">値段</label></li>
                    <li><input type="number" name="price" class="form-control" @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required></li>
                    @error('price')
                    <li><div class="text-danger">{{ $message }}</div></li>
                    @enderror
                    <li><label for="seasons">季節</label></li>
                    @error('seasons')
                    <li><div class="text-danger">{{ $message }}</div></li>
                    @enderror
                    <li><div class="seasons-item">
                        <label>
                            <input type="checkbox" name="seasons[]" value="spring"
                            {{ in_array('spring', old('seasons', $product->seasons->pluck('name')->toArray(), true)) ? 'checked' : '' }}> 春</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="spring"
                            {{ in_array('summer', old('seasons', $product->seasons->pluck('name')->toArray(), true)) ? 'checked' : '' }}> 夏</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="autumn"
                            {{ in_array('autumn', old('seasons', $product->seasons->pluck('name')->toArray(), true)) ? 'checked' : '' }}> 秋</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="winter"
                            {{ in_array('winter', old('seasons', $product->seasons->pluck('name')->toArray(),true)) ? 'checked' : '' }}> 冬</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group__mes">
            <label for="description">商品説明</label>
            <textarea name="description-mes" class="form-control" @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary">変更を保存</button>
    </form>
</div>
@endsection
