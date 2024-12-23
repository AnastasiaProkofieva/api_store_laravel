<?php

namespace App\Models;

use App\Http\Controllers\Api\User\ProductUserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string name
 * @property string description
 * @property float price
 * @property integer category_id
 * @property string image
 *
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'category_id',
        'image'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productUser(): HasMany
    {
        return $this->hasMany(ProductUser::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class);
    }
}
