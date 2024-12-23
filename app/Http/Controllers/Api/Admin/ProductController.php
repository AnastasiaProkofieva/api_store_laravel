<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\DTO\ProductData;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    public function __construct(
        private ProductService $service
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BaseGetRequest $request): AnonymousResourceCollection
    {
        return ProductResource::collection(
            $this->service->getAll(
                $request->validated()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): ProductResource
    {
        $productData = new ProductData(...$request->validated());
        return ProductResource::make(
            $this->service->create($productData)
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, UpdateProductRequest $request): JsonResponse
    {
        $productData = new ProductData(...$request->validated());
        return $this->service->update($productData, $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {

        return $this->service->delete($product);
    }
    /**
     * Display the specified resource.
     */
//    public function show(Product $product)
//    {
//        return ProductResource::make(
//            $this->service->show($product)
//        );
//    }

    /**
     * Show the form for editing the specified resource.
     */



}
