<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\DTO\CommentData;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;


class CommentController extends Controller
{
    public function __construct(
        private CommentService $service
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BaseGetRequest $request): AnonymousResourceCollection
    {
        return CommentResource::collection(
            $this->service->getAll(
                $request->validated()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request): CommentResource
    {

        $commentData = CommentData:: fromRequest($request);
        return CommentResource::make(
            $this->service->create($commentData)
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment):JsonResponse
    {
        Gate::authorize('delete', $comment);
        return $this->service->delete($comment);
    }
}
