<?php

namespace App\Http\Resources;

use League\Fractal;

class PacientTransformer extends Fractal\TransformerAbstract
{
    public function transform($pacient)
    {
        return [
            "id" => (int) $pacient->id,
            "fullname" => $pacient->fullname,
            "cpf" => $pacient->cpf,
            "cns" => $pacient->cns,
            "birth" => $pacient->birth,
            "mothername" => $pacient->mothername,
            "fone" => $pacient->fone,
            "email" => $pacient->email,
        ];
    }
}
