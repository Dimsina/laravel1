<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonce';

    protected $fillable = [
        'id', 'user_id', 'titre', 'description', 'prix',
    ];

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public function postPhoto(Photo $photo)
    {
        return $this->photo()->save($photo);
    }
}

