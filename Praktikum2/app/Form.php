<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    public function form_user() {
        return $this->belongsTo('App\User');
    }

    public function form_input() {
        return $this->hasMany('App\Input');
    }

    public function form_categorie() {
        return $this->belongsTo('App\Categorie');
    }
}
