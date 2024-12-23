<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\DTO\ProductData;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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
            $this->service
                ->getAll($request->validated())

        );
    }
    public function filtered(BaseGetRequest $request): AnonymousResourceCollection
    {
       return ProductResource::collection(
             $this->service->list($request->validated())
         );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(StoreProductRequest $request): ProductResource
    {
        $productData = new ProductData(...$request->validated());
        return ProductResource::make(
            $this->service->create($productData)
        );
    }

}
