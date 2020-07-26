<?php

namespace App\Http\Resources;

use League\Fractal;

class AddressTransformer extends Fractal\TransformerAbstract
{
    public function transform($address)
    {
        return [
            "id" => (int) $address->id,
            "zipcode" => $address->zipcode,
            "publicplace" => $address->publicplace,
            "complement" => $address->complement,
            "neighborhood" => $address->neighborhood,
            "locality" => $address->locality,
            "uf" => $address->uf,
        ];
    }
}
