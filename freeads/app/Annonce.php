<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonce';

    protected $fillable = [
        'id', 'user_id', 'titre', 'description', 'photo', 'prix',
    ];
}
