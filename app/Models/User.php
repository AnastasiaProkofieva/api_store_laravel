<?php

namespace App\Models;

use App\Enums\User\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string name
 * @property string email
 * @property UserRoleEnum role
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRoleEnum::class
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role->value === UserRoleEnum::ADMIN->value;
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function productUser(): HasMany
    {
        return $this->hasMany(ProductUser::class);
    }
    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class);
    }
}
