<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "zipcode" => "required",
            "publicplace" => "required",
            "complement" => "required",
            "neighborhood" => "required",
            "locality" => "required",
            "uf" => "required",
            "pacient_id" => "required"
        ];
    }
}
