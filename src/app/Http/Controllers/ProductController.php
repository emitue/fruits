<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Register;
use App\Models\Season;
use App\Models\Product_season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::query();
        if (!empty($keyword)) {
            $products->where('name', 'LIKE', "%{$keyword}%")->orWhere('description', 'LIKE', "%{keyword}%");
        }
        $products = $products->orderBy('created_at', 'desc')->paginate(6);
        return view('products.index', compact('products', 'keyword'));
    }
    // 商品詳細
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.show',compact('product'));
    }
    // 商品登録フォーム表示
    public function create()
    {
        return view('product.register');
    }
    // 商品登録処理
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product->seasons()->attach($validated['seasons']);
        return redirect('products.index');
    }
    // 商品編集フォーム表示
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return redirect()->route('products.edit', $product);
    }
    // 商品更新処理
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($validated);
        $product->seasons()->sync($validated['seasons'] ?? []);

        return redirect('/products');
    }
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect('products.index');
    }
}