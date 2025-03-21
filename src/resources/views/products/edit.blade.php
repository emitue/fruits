@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="/products/{productId}/update" method="post">
        @csrf
    <h2>商品一覧 > {{ $product->name }}</h2>
    <div class="form">
        <div class="form-group">
            <div class="form-group__img">
                <label for="image">商品画像</label><br>
                @if ($product->image)
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                @endif
                <input type="file" name="image" class="form-control-file" value="{{ old('image', $product->image) }}"/>
                @if ($errors->any())
                <div class="form__error">
                    <ul>@foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form-group__text">
                <div class="form-group__text-title">
                <ul>
                    <li>
                        <label for="name">商品名</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required/>
                        @if ($errors->any())
                        <div class="form__error">
                            <ul>@foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                    <li>
                        <label for="price">値段</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required/>
                        <div class="form__error">
                            <ul>@error('price')
                                <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </li>
                    <li>
                        <label for="seasons">季節</label>
                        <div class="form__error">
                            <ul>@error('seasons')
                                <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="seasons-item">
                            @php
                            $selectedSeasons = old('seasons', $product->seasons->pluck('name')->toArray() ?? []);
                            @endphp
                        <label>
                            <input type="checkbox" name="seasons[]" value="spring"
                            {{ in_array('spring', $selectedSeasons) ? 'checked' : '' }}/> 春</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="summer"
                            {{ in_array('summer', old('seasons', $product->seasons->pluck('name')->toArray() ?? [])) ? 'checked' : '' }}/> 夏</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="autumn"
                            {{ in_array('autumn', old('seasons', $product->seasons->pluck('name')->toArray() ?? [])) ? 'checked' : '' }}/> 秋</label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="winter"
                            {{ in_array('winter', old('seasons', $product->seasons->pluck('name')->toArray() ?? [])) ? 'checked' : '' }}/> 冬</label>
                        </div>
                        <div class="form__error">
                            <ul>@error('name')
                                <li>{{ $message }}</li>
                            @enderror
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group__text-content">
            <label for="description">商品説明</label>
            <textarea name="description-mes" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="button-group">
            <a href="{{ route('products.index') }}" class="button-group__back">戻る</a>
            <div class="update-form__button">
                <button class="update-form__button-submit" type="submit">変更を保存</button>
            </div>
        </div>
    </form>
</div>
@endsection
