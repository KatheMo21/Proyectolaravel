<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->method()== "PUT"){
            return [
                'nameEdit'         => ['required', 'string', 'max:255'],
                'descriptionEdit'  => ['required', 'string', 'max:255'],
                'sizeEdit'         => ['required', 'string', 'max:255'],
                'colorEdit'        => ['required', 'string', 'max:255'],
                'priceEdit'        => ['required', 'string', 'max:255'],
                'categoryEdit'     => ['required', 'string', 'max:255'],
                'stockEdit'        => ['required', 'string', 'max:255'],
            ];
        }

        


        // dd($this->all());
        return [
            'name'            => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'size'        => ['required', 'string', 'max:255'],
            'color'       => ['required', 'string', 'max:255'],
            'price'       => ['required', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:255'],
            'stock'       => ['required', 'string', 'max:255'],
            
        ];
    }
    
}