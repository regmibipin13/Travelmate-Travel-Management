<?php

namespace App\Http\Requests;

use App\Models\PackagePlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackagePlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_plan_edit');
    }

    public function rules()
    {
        return [
            'package_id' => [
                'required',
                'integer',
            ],
            'plan_title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
