<?php

namespace App\Http\Resources;

use App\Services\LinksGenerator;
use Illuminate\Http\Resources\Json\JsonResource;

class PacientResource extends JsonResource
{
    public function toArray($request)
    {
        /**
         * Transform the resource into an array
         *
         * @param \Illuminate\Http\Request $request
         * @return array
         */
        $links = new LinksGenerator;
        $links->addGet('self', route('pacients.show', $this->id));
        $links->addPut('update', route('pacients.update', $this->id));
        $links->addDelete('delete', route('pacients.destroy', $this->id));

        return [
            "id" => $this->id,
            "fullname" => $this->fullname,
            "cpf" => $this->cpf,
            "cns" => $this->cns,
            "birth" => $this->birth,
            "mothername" => $this->mothername,
            "fone" => $this->fone,
            "email" => $this->email,
            "address" => new AddressResource($this->whenLoaded('address')),
            "links" => $links->toArray()
        ];
    }
}
