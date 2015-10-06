<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'creation', 'website', 'slack', 'facebook'];

    public function perms()
    {
        return $this->hasMany(ClubRole::class);
    }

    public function posts()
    {
        return $this->hasMany(ClubPost::class);
    }

}
