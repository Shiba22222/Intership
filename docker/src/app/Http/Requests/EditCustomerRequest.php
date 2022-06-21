<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomerRequest extends FormRequest
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
            'image' => 'image|max: 2048|mimes: jpg,jpeg,png,gif',
            'phone' => 'required',
            'address' => 'required',
            'birthday' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'image.image' => 'Phải là hình ảnh',
            'image.mimes' => 'Hình ảnh không đúng định dạng.(Định dạng đúng là: jpg,jpeg,png,gif)',
            'image.max' => 'Không được quá 2MB',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'birthday.required' => 'Ngày sinh không được bỏ trống'
        ];
    }
}
