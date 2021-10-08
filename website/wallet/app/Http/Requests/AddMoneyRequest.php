<?php

namespace App\Http\Requests;

class AddMoneyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ];
    }
}
