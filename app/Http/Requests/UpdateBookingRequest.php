<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_edit');
    }

    public function rules()
    {
        return [
            'package_id' => [
                'required',
                'integer',
            ],
            'customer_name' => [
                'string',
                'required',
            ],
            'customer_phone' => [
                'string',
                'required',
            ],
            'from_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'total_people' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_price' => [
                'required',
            ],
        ];
    }
}
