<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['role_id', 'nickname'];
    
    public function club()
    {
        return $this->hasMany(ClubRole::class);
    }
}
