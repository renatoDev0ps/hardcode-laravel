<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $links = new LinksGenerator;
        $links->addGet('self', route('address.show', $this->id));
        $links->addPut('update', route('address.update', $this->id));
        $links->addDelete('delete', route('address.destroy', $this->id));

        return [
            "id" => $this->id,
            "zipcode" => $this->zipcode,
            "publicplace" => $this->publicplace,
            "complement" => $this->complement,
            "neighborhood" => $this->neighborhood,
            "locality" => $this->locality,
            "uf" => $this->uf,
            "pacient_id" => new PacientResource($this->whenLoaded('pacient')),
            "links" => $links->toArray()
        ];
    }
}
