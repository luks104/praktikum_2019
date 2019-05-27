<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inputTemplate extends Model
{
    protected $table = 'input_templates';

    public function inputTemplate_input() {
        return $this->hasMany('App\Input');
    }
}
