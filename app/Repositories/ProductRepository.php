<?php

namespace App\Repositories;


use App\Http\DTO\ProductData;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use \Illuminate\Database\Eloquent\Collection;


class ProductRepository
{
    protected Model $model;

    public function __construct(
        Product $model
    )
    {
        $this->model = $model;
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->model->query()->paginate($params['limit']);
    }

    public function getFiltered(array $filters): Collection
    {

        $query = $this->model->query();

        if (!empty($filters['category'])) {
            $query->where('category_id', $filters['category']);
        }

        if (!empty($filters['min_price']) && !empty($filters['max_price'])) {
            $query->whereBetween('price', [$filters['min_price'], $filters['max_price']]);
        }

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        }

        return $query->get();
    }

    public function create(ProductData $productData): Model|Product
    {
        return Product::query()->create($productData->toArray());
    }

    public function update(ProductData $productData, Product $product): Model|Product
    {
        $product->update($productData->toArray());
        return $product;


    }

    public function delete(Product $product): void
    {
        $product->delete();
    }

//    public function show(Product $product)
//    {
//        $product->load('admin');
//        return $product;
//    }

    public function getByUser(array $params, User $user): LengthAwarePaginator
    {
        return $user->products()
            ->withPivot(['created_at'])
            ->paginate($params['limit']);

    }

    public function getById(int $id): Model|Product
    {
        return Product::query()->find($id);
    }

    public function buy(Product $product, User $user): JsonResponse
    {
        $user->products()->attach(
            $product->getKey(),
            [

                'price' => $product->price,
                'product_name' => $product->name,
                'created_at' => now()
            ]
        );

        return response()->json(['status' => 'success']);
    }
}
