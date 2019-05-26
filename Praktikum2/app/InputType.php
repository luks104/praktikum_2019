<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputType extends Model
{
    protected $table = 'input_types';

    public function inputType_input() {
        return $this->hasMany('App\Input');
    }
}
