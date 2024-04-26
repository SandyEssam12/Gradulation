<?php

namespace App\Http\Controllers\Api\Front;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\ProductResource;
use App\QueryBuilders\Products\ProductIndexQuery;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $queryBuilder = new ProductIndexQuery($request);

        // Get the filtered and paginated results
        $products = $queryBuilder->paginate();

        return response()->api([
            'product' =>  new ProductResource($products),
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $validatedData = $request->validated();
        $product = Product::create($validatedData);
        return response()->api([
            'product' =>  new ProductResource($product),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->api([
            'product' =>  new ProductResource($product),
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);
        return response()->api([
            'product' =>  new ProductResource($product),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->api();
    }
    }

