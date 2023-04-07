<?php

namespace App\Http\Requests;

use App\Models\Package;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_create');
    }

    public function rules()
    {
        return [
            'package_type_id' => [
                'required',
                'integer',
            ],
            'destination_id' => [
                'required',
                'integer',
            ],
            'duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_people' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_price' => [
                'required',
            ],
            'min_age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'package_title' => [
                'string',
                'required',
                'unique:packages',
            ],
            'display_image' => [
                'required',
            ],
            'slider_images' => [
                'array',
            ],
            'overview' => [
                'required',
            ],
        ];
    }
}
