<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidaton extends FormRequest
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
            'name' => 'required | max : 20 | regex:/\D/',
            'description'  => 'required | min : 15 ' ,
            'price'  => 'required | numeric ' ,
            'promotion_price'  => 'required | numeric ' ,

        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Nhập đi bố !' ,
            'name.regex' => 'Tên mà cũng có số à !',

            'description.required' => 'Nhập đi bố !' ,
            'description.min' => ' Nhập ngắn thế bố!',

            'price.required' => 'Nhập đi bố !' ,

            'promotion_price.required' => 'Nhập đi bố !' ,

        ];
        return $messages;
    }
}
