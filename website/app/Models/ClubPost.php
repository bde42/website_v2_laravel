<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubPost extends Model
{
    protected $table = 'club_posts';
    protected $fillable = ['club_id', 'title', 'author', 'content'];
    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
