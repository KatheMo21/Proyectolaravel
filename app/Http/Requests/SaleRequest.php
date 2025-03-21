<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == "PUT") {
            return [
                /* 'idEdit'               => ['required', 'string', 'max:255'], */
                'productEdit'          => ['required', 'string', 'max:255'],
                'amountEdit'           => ['required', 'string', 'max:255'],
                'total_costEdit'      => ['required', 'string', 'max:255'],
                'purchase_dateEdit'          => ['required', 'string', 'max:255'],
                'order_statusEdit'     => ['required', 'string', 'max:255'],
                'shipping_detailsEdit' => ['required', 'string', 'max:255'],
                'user_idEdit'     => ['required', 'string', 'max:255'],
                'product_idEdit' => ['required', 'string', 'max:255'],
            ];
        }




        // dd($this->all());
        return [
            /* 'id'               => ['required', 'string', 'max:255'], */
            'product'          => ['required', 'string', 'max:255'],
            'amount'           => ['required', 'string', 'max:255'],
            'total_cost'      => ['required', 'string', 'max:255'],
            'purchase_date'          => ['required', 'string', 'max:255'],
            'order_status'     => ['required', 'string', 'max:255'],
            'shipping_details' => ['required', 'string', 'max:255'],
            'user_id'     => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'string', 'max:255'],

        ];
    }
}
