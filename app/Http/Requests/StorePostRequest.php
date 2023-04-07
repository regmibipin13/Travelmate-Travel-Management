<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'required',
                'unique:posts',
            ],
            'post_category_id' => [
                'required',
                'integer',
            ],
            'display_image' => [
                'required',
            ],
            'body' => [
                'required',
            ],
            'published_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'required',
                'array',
            ],
        ];
    }
}
