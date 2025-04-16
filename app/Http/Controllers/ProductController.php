<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ProductStoreRequest, ProductUpdateRequest};
use App\Models\{Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Http};

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request->toArray())->latest()->paginate(9);

        return view('product.index', compact('products'));
    }

    public function fetchApi(Request $request)
    {
        $response = Http::withoutVerifying()->get('https://dummyjson.com/products');
        if ($response->successful()) {
            $products = $response->json()['products'];
            foreach ($products as $product) {
                Product::updateOrCreate(
                    ['title' => $product['title']],
                    [
                        'title' => $product['title'],
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'thumbnail' => $product['thumbnail'],
                    ]
                );
            }
        }
        return redirect('/')->with('success', 'Successfully fetch the API data.');
    }

    public function create()
    {
        return view('product.create');
    }

    public function Store(ProductStoreRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Product::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'price' => $request->price,
                    'thumbnail' => $request->thumbnail,
                ]);
            });
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect('/product')->with('success', 'Successfully stored.');
    }

    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return view('product.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            DB::transaction(function () use ($request, $product) {
                $product->update([
                    'title' => $request->title ?? $product->title,
                    'description' => $request->description ?? $product->title,
                    'price' => $request->price ?? $product->price,
                    'thumbnail' => $request->thumbnail ?? $product->thumbnail,
                ]);
            });
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect('/product')->with('success', 'Successfully updated.');
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product) $product->delete();
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
        return redirect('/product')->with('success', 'Successfully deleted.');
    }
}
