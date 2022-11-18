<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponseTrait;

class StoreOrderRequest extends FormRequest
{
    use ResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_details' => 'required|array|min:1',
            'order_details.*.product_id' => 'required',
            'order_details.*.quantity_ordered' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'order_details' => 'Please select products to place an order',
            'order_details.*.product_id' => 'Please include a product to place an order',
            'order_details.*.quantity_ordered' => 'Please select a quantity for your product',
        ];
    }

    public function failedValidation(Validator $validator) { 
        throw new HttpResponseException($this->formatResponse(false, $validator->errors()->all()));
    }
}
