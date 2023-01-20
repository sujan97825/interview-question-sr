<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data['variants'] = Variant::with('product_variants')->get();
        $data['productVariants'] = ProductVariant::get();


        if ($request->input()) {

            $products = Product::with('varient_prices');

            $price_from = $request->input("price_from");
            $price_to = $request->input("price_to");

            if ($request->input("variant")) {
                $variant = $request->input("variant");
                $products = $products->whereHas('varient_product', function ($query) use ($variant) {
                    $query->where('id', '=', $variant);
                });
            }

            if ($request->input("title")) {
                $title = $request->input("title");
                $products = $products->where('created_at', 'like', '%' . $title . '%');
            }
            if ($price_from && $price_to) {
                $products = $products->whereBetween('date', [$price_from, $price_to]);
            }
            if ($request->input("date")) {
                $date = $request->input("date");
                $products = $products->where('created_at', $date);
            }
            $data['products'] = $products->paginate(1);
        } else {
            $data['products'] = Product::with('varient_prices')->paginate(1);
        }

        return view('products.index')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $request->product_image;
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
