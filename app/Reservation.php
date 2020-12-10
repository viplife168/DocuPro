<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'department',
        'apply_date',
        'collection_date',
        'return_date',
        'res_status',
        'res_notes',
    ];
    public function file_details()
    {
        return $this->morphMany('App\FileDetail', 'reservation');
    }
}
