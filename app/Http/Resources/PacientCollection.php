<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PacientCollection extends ResourceCollection
{
    public $collects = \App\Http\Resources\PacientResource::class;

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
                'create' => route('pacients.store')
            ]
        ];
    }
}
