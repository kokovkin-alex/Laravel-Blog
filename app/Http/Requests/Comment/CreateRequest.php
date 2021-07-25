<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Это поле обязательно для заполнения',
            'body.required' => 'Это поле обязательно для заполнения',

            'subject.min' => 'Это поле должно иметь не менее 6 символов',
            'body.min' => 'Это поле должно иметь не менее 10 символов',
        ];
    }
}
