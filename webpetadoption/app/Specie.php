<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public function pets()
    {
        return $this
            ->belongsTo(Pet::class)
            ->withTimestamps();
    }
}
