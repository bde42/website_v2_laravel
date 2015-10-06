<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubPost extends Model
{
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
