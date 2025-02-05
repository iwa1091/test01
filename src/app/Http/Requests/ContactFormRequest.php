<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|max:255',
            'phone_1' => 'required|numeric|digits:3',
            'phone_2' => 'required|numeric|digits:4',
            'phone_3' => 'required|numeric|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category' => 'required|exists:categories,id',
            'detail' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'phone_1.required' => '電話番号（3桁）を入力してください',
            'phone_2.required' => '電話番号（4桁）を入力してください',
            'phone_3.required' => '電話番号（4桁）を入力してください',
            'phone_1.numeric' => '電話番号（3桁）は数字で入力してください',
            'phone_2.numeric' => '電話番号（4桁）は数字で入力してください',
            'phone_3.numeric' => '電話番号（4桁）は数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'category.exists' => '選択したお問い合わせの種類が無効です',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
