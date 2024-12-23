<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    /** @use HasFactory<\Database\Factories\ProductUserFactory> */
    use HasFactory;
    protected $table = 'product_user';
}
