<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationContainer extends Model
{
private $data;
public function __construct()
{

}


}

class Res
{
    private $data;
    public function store($value)
    {
        $this->data = $value;
    }
    public function get()
    {
        return $this->data;
    }
}
