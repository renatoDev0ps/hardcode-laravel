<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        "zipcode",
        "publicplace",
        "complement",
        "neighborhood",
        "locality",
        "uf",
        "pacient_id"
    ];

    public function pacients()
    {
        return $this->belongsToMany(Pacient::class);
    }
}
