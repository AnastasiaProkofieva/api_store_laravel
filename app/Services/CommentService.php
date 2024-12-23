<?php

namespace App\Services;

use App\Http\DTO\CommentData;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class CommentService
{
    public function __construct(
        private CommentRepository $repository

    ) {
    }
    public function getAll(array $params): LengthAwarePaginator
    {
        return $this->repository->getAll($params);
    }
    public function create(CommentData $commentData): Comment|Model
    {
        return $this->repository->create($commentData);
    }
    public function delete(Comment $comment): JsonResponse
    {
        $this->repository->delete($comment);
        return response()->json();
    }
}
