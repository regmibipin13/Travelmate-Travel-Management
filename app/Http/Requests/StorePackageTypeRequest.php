<?php

namespace App\Http\Requests;

use App\Models\PackageType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePackageTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:package_types',
            ],
        ];
    }
}
