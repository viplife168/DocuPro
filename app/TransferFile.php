<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferFile extends Model
{
    protected $fillable = [
        'file_number',
        'user_id',
        'receipient',
        'date_apply',
        'status',
        'notes',
    ];
    public function transfer()
    {
        return $this->morphTo();
    }
}
