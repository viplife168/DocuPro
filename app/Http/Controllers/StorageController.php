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
    public static function getBilanganFail($bilik = '', $rak = '', $tingkat = '', $seksyen = '')
    {
        $data['location'] = StorageController::implodeLocation($bilik, $rak, $tingkat, $seksyen);
        $data['files'] = Spp::where('storage', $data['location'])
            ->where('status', 'Stored')
            ->get();
        $data['count'] = count($data['files']);
        return $data;
    }
    public static function implodeLocation($bilik, $rak, $tingkat, $seksyen)
    {
        $dept = array_map('strtolower', SysSettingController::showSetting('departments'));
        $acr = array_search(strtolower($bilik), $dept);
        $location = $acr . '-' . $rak . '-' . $tingkat . '-' . $seksyen;
        return $location;
    }
    public function explodeLocation($location)
    {
        $loc = explode("-", $location);
        return $loc;
    }
    public static function updateLocation($file_numbers, $location)
    {
        foreach ($file_numbers as $file) {
            // $udtfile = SPP::where('file_number', $file['file_number'])->first();
            // dd($udtfile);
            $sppfile = SppController::findBorrower($file['file_number']);
            $udtfile = SPP::where('file_number', $sppfile[0]->file_number)->first();
            $udtfile->status = 'Stored';
            $udtfile->storage = $location;
            $udtfile->save();
        }
    }
    public function submitTambahStoran(Request $request)
    {
        $data = $request->all();
        $data['lokasi'] = StorageController::implodeLocation($request->bilik_fail, $request->rak, $request->tingkat, $request->seksyen);
        $file_list = $data['file_list'];
        foreach ($file_list as $key => $file) {
            if (empty($file['file_number'])) {
                unset($data['file_list'][$key]);
            }
        }
        //   dd($data);
        StorageController::updateLocation($data['file_list'], $data['lokasi']);
        $status = [
            'type' => 'Succcess',
            'message' => 'Simpanan fail telah dikemaskini'
        ];
        $request->session()->flash('status', $status);
        return view('staff.storan');
    }
}
