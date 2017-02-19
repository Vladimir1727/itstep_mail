<?php

namespace itstep\Http\Requests\Subscribers;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
            'first_name'=>'required|max:128|min:2',
            'last_name'=>'required|max:128|min:2',
            'email'=>'email|max:128|min:5',

        ];
    }
}
