<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'date_apply',
        'user_id',
        'department',
        'receipient',
        'notes',
    ];

    public function files()
    {
        return $this->morphMany('App\TransferFile', 'transfer');
    }
}
