<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function getBilikFail()
    {
        $bilik_fail = SysSettingController::showSetting('bilik_fail');
        return $bilik_fail;
    }
    public function getBilanganFail($bilik='',$rak='',$tingkat='',$seksyen='')
    {
        $location = $this->implodeLocation($bilik,$rak,$tingkat,$seksyen);
        $data['files'] = Spp::where('storage',$location)
                    ->where('status', 'Stored')
                    ->get();
        $data['count'] = count($data['files']);
        return $data;
    }
    public function implodeLocation($bilik,$rak,$tingkat,$seksyen)
    {
        $location = $bilik . '-' . $rak . '-' . $tingkat . '-' . $seksyen;
        return $location;
    }
    public function explodeLocation($location)
    {
        $loc = explode("-",$location);
        return $loc;
    }
    public function updateLocation($file_numbers,$bilik,$rak,$tingkat,$seksyen)
    {
        foreach ($file_numbers as $file)
        {
            
        }
    }

}
