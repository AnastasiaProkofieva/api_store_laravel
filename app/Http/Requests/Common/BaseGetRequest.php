<?php

namespace App\Http\Requests\Common;

class BaseGetRequest extends BaseRequest
{
    public const PER_PAGE = 8;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'page' => 'nullable|int',
            'limit' => 'nullable|int',
            'category' => 'nullable|int',
            'min_price'=>'nullable|int',
            'max_price'=>'nullable|int',
            'search'=>'nullable|string',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'limit' => $this->limit ?? self::PER_PAGE,
            'category' => $this->category ?? 0,
            'min_price'=> $this->min_price ?? 0,
            'max_price'=> $this->max_price ?? 0,
            'search'=> $this->search ?? '',
        ]);
    }
}
