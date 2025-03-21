@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>商品一覧 > {{ $product->name }}</h2>

    <div class="form">
        <div class="form-group__img">
        @if ($product->image)
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="No Image">
        @endif
        </div>

        <div class="form-group__text">
            <div class="form-group__text-title">
                <ul>
                    <li><label class="name">商品名</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}"></li>
                    <li><label class="price">値段</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ number_format($product->price) }}"/>
                    </li>
                    <li><label class="seasons">季節</label>
                        <div class="season-buttons">
                        @php
                        $seasonOptions = ['春', '夏', '秋', '冬'];
                        @endphp

                        @foreach ($seasonOptions as $season)
                        <label class="season-label">
                        <input type="radio" name="season" value="{{ $season }}"
                        {{ isset($product->seasons) && in_array($season, $product->seasons->pluck('name')->toArray()) ? 'checked' : '' }}>
                        <span class="season-name">{{ $season }}</span>
                        </label>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
                <!-- <h3>季節</h3>
                <ul>
                    @foreach ($product->seasons as $season)
                <li>{{ $season->name }}</li>
                    @endforeach
                </ul> -->

    <div class="form-group__text-content">
                <label class="description">商品説明</label>
                <textarea name="description-mes" class="form-control" rows="4">{{ $product->description }}</textarea>
    </div>

    <div class="btn">
        <a href="{{ route('products.index') }}" class="btn-secondary">戻る</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn-warning">変更を保存</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">削除</button>
        </form>
    </div>
</div>
@endsection