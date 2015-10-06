<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubRole extends Model
{
    protected $table = 'clubs_roles';
    protected $fillable = ['role_id', 'nickname', 'club_id'];
    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
