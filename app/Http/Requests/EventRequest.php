<?php

namespace App\Http\Requests;

use App\Models\Events;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            //
            // |unique:eventinvoice,EventNo,' . $this->route('events') . ',' . (new Events())->getKeyName(),
            'EventNo' => 'required',
            'ETA' => 'required',
            'BidDUeDate' => 'required',
            'Customercode' => 'required',
            'IMONo' => 'required',
        ];
    }
}
