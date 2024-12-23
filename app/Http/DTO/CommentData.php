<?php

namespace App\Http\DTO;

use App\Http\Requests\Common\BaseRequest;
use App\Models\Product;

readonly class CommentData extends BaseDto
{


    public function __construct(
        public int $user_id,
        public int $product_id,
        public string $textarea,

    ) {
    }
    public static function fromRequest($request): self
    {
        return new self(
            user_id: $request->user()->id,
            product_id: $request->product_id,
            textarea: $request->input('textarea'),


        );
    }
}

