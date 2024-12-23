<?php

namespace App\Http\Resources\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @mixin Comment
 */


class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->getKey(),
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'textarea' => $this->textarea,
                'published_at' => $this->created_at->format('d-m-Y')
            ];
    }
}
