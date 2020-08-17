<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'avatar' => 'image',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'phone.required' => 'SĐT không được để trống',
            'phone.nummeric' => 'Không đúng định dạng',
            'avatar.image' => 'Không đúng định dạng',
            'address.required' => 'Địa chỉ không được để trống',
        ];
    }
}
