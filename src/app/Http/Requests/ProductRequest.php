<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'max:5'],
            'image' => ['required'],
            'image.*' => ['image', 'mimes:png,jpeg'],
            'seasons' => ['required'],
            'description' => ['required', 'string', 'max:120'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '商品を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.max' => '0~10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'season[]' => '季節を選択してください'
            'description' => '商品説明を入力してください'
            'description.max' => '120文字以内で入力してください'
        ]
    }
}
