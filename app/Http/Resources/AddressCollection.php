<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
{
    public $collects = \App\Http\Resources\AddressCollection::class;

    /**
     * Transform the resource collection into an array
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'create' => route('address.store')
            ]
        ];
    }
}
