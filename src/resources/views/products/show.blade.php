@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>{{ $product->name }} の詳細</h2>

    <div class="card mb-4" style="max-width: 600px;">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        @else
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="No Image">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text"><strong>価格:</strong> ¥{{ number_format($product->price) }}</p>
            <div class="product-seasons">
                <h5>季節</h5>
                <ul>
                    @foreach ($product->seasons as $season)
                    <li>{{ $season->name }}</li>
                    @endforeach
                </ul>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
            <a href="{{ route('products.edit', $product->id]) }}" class="btn btn-warning">変更を保存</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
    </div>
</div>
@endsection