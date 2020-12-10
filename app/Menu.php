<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable =[
        'name',
        'parent_menu',
        'slug',
        'type',
        'icon',
        'link',
        'bootclass',
        'menu_order',
        'access',
        'created_at',
        'updated_at',
    ];
}
