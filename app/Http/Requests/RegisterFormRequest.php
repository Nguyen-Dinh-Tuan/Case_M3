<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'email'=> 'required|email|unique:customers',
            'password'=>'required',
            'phone'=>'required|unique:customers',
            'user'=>'required',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        $messages =[
            'email.required'=>'Email không đúng!',
            'email.unique'=>'Email đã tồn tại!',
            'user.required'=>'Yêu cầu nhập tên khách hàng!',
            'phone.required '=>'Yêu cầu nhâp số điện thoại!',
            'phone.unique'=>'Số điện thoại này đã tồn tại!',
            'password.required'=>'Yêu cầu nhập mật khẩu!',
            'address'=>'Yêu cầu nhập địa chỉ!'
        ];

        return $messages;

    }
}
