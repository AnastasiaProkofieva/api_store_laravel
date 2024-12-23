<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:5000',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'string'
        ];
    }

}
