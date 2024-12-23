<?php

namespace App\Repositories;

use App\Http\DTO\CommentData;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CommentRepository
{
    protected Model $model;

    public function __construct(
        Comment $model
    )
    {
        $this->model = $model;
    }

    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->model->query()->paginate($params['limit']);
    }
    public function create(CommentData $commentData): Model|Comment
    {

    return   Comment::query()->create($commentData->toArray());


    }
    public function delete(Comment $comment): void
    {
        $comment->delete();
    }
}
