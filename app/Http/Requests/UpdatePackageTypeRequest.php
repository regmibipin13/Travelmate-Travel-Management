<?php

namespace App\Http\Requests;

use App\Models\PackageType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackageTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:package_types,name,' . request()->route('package_type')->id,
            ],
        ];
    }
}
