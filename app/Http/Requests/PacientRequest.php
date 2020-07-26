<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "avatar" => "required",
            "fullname" => "required",
            "cpf" => "required",
            "cns" => "required",
            "birth" => "required",
            "gender" => "required",
            "mothername" => "required",
            "fone" => "required",
            "email" => "required",
            "password" => "required"
        ];
    }
}
