<?php

namespace App\Http\Requests;

use App\Models\PostCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:post_categories,name,' . request()->route('post_category')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:post_categories,slug,' . request()->route('post_category')->id,
            ],
        ];
    }
}
