<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';

    protected $fillable = [
        'id', 'annonce_id', 'img_name',
    ];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
