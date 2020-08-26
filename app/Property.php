<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    public function path()
    {
        return url("/real-estate/{$this->id}-" . Str::slug($this->name));
    }
}
