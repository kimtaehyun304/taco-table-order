<?php

namespace App\DTO;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'table_number' => 'required|integer',
            'status' => 'required|string',
            'order_items' => 'required|array',
            'order_items.*.food_id' => 'required|integer',
            'order_items.*.quantity' => 'required|integer'
        ];
    }
       
}