<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    
    public function categorie_form() {
        return $this->hasMany('App\Form');
    }
}