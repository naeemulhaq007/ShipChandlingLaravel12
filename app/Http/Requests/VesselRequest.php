<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VesselRequest extends FormRequest
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
        return [
            'imo' => 'required|unique:vesselsetup,IMONo,' . $this->route('vessel'), // Assuming your model is named Customer
            'vesselname' => 'required',
            'vesseltype' => 'required',
            'callsign' => 'required',
        ];
    }
}
