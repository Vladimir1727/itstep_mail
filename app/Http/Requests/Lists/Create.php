<?php

namespace itstep\Http\Requests\Lists;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()//проверка доступа пользователя к конкретному ресурсу
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//правила валидации запроса
    {
        return [
            'name'=>'required|max:128|min:2',
        ];
    }
}
