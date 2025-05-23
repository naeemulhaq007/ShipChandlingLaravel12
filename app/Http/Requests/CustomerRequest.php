<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
{
    $customerId = $this->route('customer');

    return [
        'CustomerCode' => 'required|unique:customersetup,CustomerCode,' . $customerId . ',id', // Assuming the primary key is named 'id'
        'customername' => 'required',
        // Add other validation rules for your fields
    ];
}

}
