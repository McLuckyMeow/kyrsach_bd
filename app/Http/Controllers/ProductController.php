<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $items = Product::where(collect($request->all())->except('page')->toArray())->with('category')->paginate(6);
//        dd($items);
        return view('layouts.product', compact('items'));
    }

    public  function show(Product $product)
    {

        return view('layouts.product_card', compact('product'));
    }

    public function store(CreateProductRequest $request)
    {
//        dd($request);  проверка отправки запроса на добавление товара
        Product::create($request->validated());
        sleep(1);
        return redirect(route('product.all'));
    }

    public function editView(Product $product)
    {
        return view('layouts.edit_product', compact('product'));
    }

    public function update(Product $product)
    {
        $request = request();

        if(!is_null($request['image'])) {

            $file = $request->file('image');
            $content = $file->getContent();
            Storage::disk('public')->put($product->image, $content);
        }

        $request = $request->toArray();
        unset($request["image"]);

        $product->update($request);
        $product->save();
        sleep(1);
        return redirect(route('product.all'));
    }

    public function destroy(Product $product)
    {
        foreach ($product->basket as $item) {
            $item->delete();
        }
        $product->delete();
        sleep(1);
        return redirect(route('product.all'));
    }

//    public function search(Request  $request)
//    {
//        $s = $request->search;
//        dd($s);
//        return view('/');
//    }

    public  function showOnAdminPanel(Request $request)
    {

        return view('layouts.admin_panel', compact('admin'));
    }

}
