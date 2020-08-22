<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function propertyPhotos()
    {
        return $this->hasOne('App\PropertyPhotos');
    }
}
