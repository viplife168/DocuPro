<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function getBilikFail()
    {
        $bilik_fail = SysSettingController::showSetting('bilik_fail');
        return $bilik_fail;
    }
    public static function getRak()
    {
        $rak = SysSettingController::showSetting('rak');
        return $rak;
    }
    public static function getTingkat()
    {
        $tingkat = SysSettingController::showSetting('tingkat');
        return $tingkat;
    }
    public static function getSeksyen()
    {
        $seksyen = SysSettingController::showSetting('seksyen');
        return $seksyen;
    }
    public static function getBilanganFail($bilik='',$rak='',$tingkat='',$seksyen='')
    {
        $location = StorageController::implodeLocation($bilik,$rak,$tingkat,$seksyen);
        $data['files'] = Spp::where('storage',$location)
                    ->where('status', 'Stored')
                    ->get();
        $data['count'] = count($data['files']);
        return $data;
    }
    public static function implodeLocation($bilik,$rak,$tingkat,$seksyen)
    {
        $dept= array_map('strtolower',SysSettingController::showSetting('departments'));
        $acr = array_search(strtolower($bilik),$dept);
        $location = $acr . '-' . $rak . '-' . $tingkat . '-' . $seksyen;
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
    public function submitTambahStoran(Request $request)
    {
        $data = $request->all();
        $data['lokasi'] = StorageController::implodeLocation($request->bilik_fail,$request->rak,$request->tingkat,$request->seksyen);
        $file_list =$data['file_list'];
        array_filter($file_list, function($value){
            return empty($value) || $value === 0 || $value === null;
        });
        dd($file_list);
    }


}
