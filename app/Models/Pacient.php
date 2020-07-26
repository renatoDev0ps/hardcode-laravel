<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $table = 'pacients';

    protected $fillable =[
        "avatar",
        "fullname",
        "cpf",
        "cns",
        "birth",
        "gender",
        "mothername",
        "fone",
        "email",
        "password"
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
