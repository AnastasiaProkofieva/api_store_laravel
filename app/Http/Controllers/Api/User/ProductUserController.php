<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Resources\ProductUser\ProductUserResource;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
/**
 * @mixin Product
*/
class ProductUserController extends Controller
{
    public function __construct(
        private ProductService $service
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BaseGetRequest $request)
    {
        /* @var User $user */

        $user = auth()->user();
        return ProductUserResource::collection(
            $this->service->getByUser(
                $request->validated(),
                $user,


            )
        );
    }
    public function buy(BaseGetRequest $request): JsonResponse
    {

        /* @var User $user */
        $user = auth()->user();
        return $this->service->buy($request->product, $user);
    }

}
