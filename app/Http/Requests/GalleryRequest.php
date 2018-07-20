<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content_type' => 'required',
            'content_description' => 'required_with:content_type'
        ];
    }

    /**
    * バリデーションエラーメッセージの取得
    *
    * @return string
    */
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です',
            'description.required' => '説明は必須です',
            'content_type.required' => '該当するコンテンツタイプを選択してください',
            'content_description.required_with' => 'コンテンツ内容は必須です'
        ];
    }
}
