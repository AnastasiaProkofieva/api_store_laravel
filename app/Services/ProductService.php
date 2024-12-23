<?php

namespace App\Services;

use App\Http\DTO\ProductData;
use App\Models\Product;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use \Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(
        private ProductRepository $repository

    ) {
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->repository->getAll($params);
    }

    public function list(array $filters): Collection
    {
        return $this->repository->getFiltered($filters);
    }

    public function create(ProductData $productData): Product|Model
    {
        return $this->repository->create($productData);
    }
    public function update(ProductData $productData, Product $product): JsonResponse
    {
        $this->repository->update($productData, $product);
        return response()->json();
    }

    public function delete(Product $product): JsonResponse
    {
        $this->repository->delete($product);
        return response()->json();
    }

//    public function show(Product $product)
//    {
//        return $this->repository->show($product);
//    }

    public function getByUser(array $params, User $user): LengthAwarePaginator
    {
        return $this->repository->getByUser($params, $user);
    }
    public function buy(int $id, User $user): JsonResponse
    {
        $product = $this->repository->getById($id);

        return $this->repository->buy($product, $user);
    }
}
