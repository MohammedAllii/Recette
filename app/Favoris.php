<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected $fillable = [
        'id_user','id_recette',
       ];
}
