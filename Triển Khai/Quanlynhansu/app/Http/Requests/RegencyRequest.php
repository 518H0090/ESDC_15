<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegencyRequest extends FormRequest
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
//            'name' => 'required|max:50',
            'basic_money' => 'required',
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Làm ơn nhập tên chức vụ',
//            'name.max' => 'độ dài tên chỉ có tối đa 50 ký tự',
            'basic_money.required' => 'Làm ơn nhập tiền',
        ];
    }
}
