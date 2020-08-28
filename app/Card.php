<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function listings(){
      return $this->belongsTo('App\Listing');
    }
}
