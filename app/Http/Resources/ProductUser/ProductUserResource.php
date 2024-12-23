<?php

namespace App\Http\Resources\ProductUser;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
class ProductUserResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

//        $amount = [];
//
//        if ($this->pivot->quantity) {
//            $quantity=$this->pivot->quantity;
//            $price=$this->price;
//            $amount['amount'] = $quantity * $price;
//        }

        return
            [
                'id' => $this->getKey(),
                'product_name' => $this->name,
                'price' => $this->price,
                'buyingDate' => $this->pivot->created_at->format('d-m-Y')
            ]
        ;
    }
}
