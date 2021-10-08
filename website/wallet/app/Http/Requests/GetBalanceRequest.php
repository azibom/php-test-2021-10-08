<?php

namespace App\Http\Requests;

class GetBalanceRequest extends BaseRequest
{
    /**
     * Get all of the input and files for the request.
     *
     * @param  array|mixed|null  $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $user_id = $this->route()->parameter('user_id');
        $data['user_id'] = $user_id;

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = $this->route()->parameter('user_id');
        $this->merge(['user_id' => $user_id]);
        return [
            'user_id' => 'required|numeric',
        ];
    }
}
