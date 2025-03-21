<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Register;
use App\Models\Season;
use App\Models\Product_season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');
        $sort = $request->input('sort', 'asc');

        $query = Product::query();

        $products = Product::simplePaginate(6);

        // dd($products);
        return view('products.index', compact('products', 'keyword', 'sort'));
    }
    // 商品詳細
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $seasons = Season::all();
        return view('products.show',compact('product', 'seasons'));
    }
    // 商品更新処理
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        $product->seasons()->sync($validated['seasons'] ?? []);

        return view('products.show');
        // $product = $request->only(['name', 'price', 'seasons', 'image' ,'description']);

        // return redirect('products.index');
    }
    // 商品登録画面
    public function create()
    {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }
    // 商品登録処理
    public function store(ProductRequest $request)
    {
        $product = $request->only([
            'name','price','image','image.*','seasons','season_id','description']);
            Product::create($product);

        // 商品データ作成
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->seasons = $request->seasons;
        $product->season_id = $request->season_id;
        $product->image = $imagePath;
        $product->description = $request->description;

        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
            $product->save();
        }
        $product->save();
        return view('/products', ['product' => $product]);
    }
    public function getSearch(Request $request)
    {
        $sort = $request->input('sort', 'asc');

        $query = Product::query();

        if ($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $query->where('name', 'like', '%' . $keyword. '%');
        }

        $products = $query->orderBy('price', 'sort')->get();

        return view('products.index', compact('products', 'keyword', 'sort'));
    }
    public function postSearch(Request $request)
    {
        $sort = $request->input('sort', 'asc');

        $query = Product::query();

        if ($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $query->where('name', 'like', '%' . $keyword. '%');
        }

        $products = $query->orderBy('price', 'sort')->get();

        return view('products.index', compact('products', 'keyword', 'sort'));
    }

    // 商品削除
    public function delete($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return redirect()->route('products.index');
    }
}