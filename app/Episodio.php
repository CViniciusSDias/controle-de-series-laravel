<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero', 'assistido'];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
