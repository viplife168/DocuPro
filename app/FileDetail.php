<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDetail extends Model
{
    protected $fillable =[
        'file_user_id',
        'file_number',
        'res_collect_date',
        'res_return_date',
        'res_renew_count',
        'file_status',
        'file_notes',
        'incharge_officer',
    ];
    public function reservation()
    {
        return $this->morphTo();
    }
}
