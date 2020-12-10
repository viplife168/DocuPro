<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['department','phone_ext','designation','gred'];

    public function user()
    {
        return $this->morphTo();
    }
}
