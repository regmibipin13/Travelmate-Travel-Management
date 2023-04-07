<?php

namespace App\Http\Requests;

use App\Models\Destination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDestinationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('destination_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:destinations',
            ],
            'total_places' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
