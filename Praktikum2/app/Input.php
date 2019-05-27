<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'inputs';

    public function input_form() {
        return $this->belongsTo('App\Form');
    }

    public function input_inputTemplate() {
        return $this->belongsTo('App\InputTemplate');
    }
}
