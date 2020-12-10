<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SysSetting;
use DateTime;
use Carbon\Carbon;

class SysSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function showSetting($setting_key)
    {
        $settings = SysSetting::where('setting_key',$setting_key)->pluck('setting_value');
        $data = unserialize($settings[0]);
        if (count($data)>1)
        {
            return $data;
        }
        elseif (count($data)==1)  return $data[0];
        else return 0;
    }
    public static function addSetting($setting_key,$setting_value)
    {
        $settings = SysSetting::where('setting_key',$setting_key)->pluck('setting_value');
        if(count($settings)){
            $settings = unserialize($settings[0]);
            if(!in_array($setting_value,$settings))
                array_push($settings,$setting_value);
        }
        else {
            $settings = [$setting_value];
        }

        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert([
            'setting_key'=>$setting_key
        ],
        [
            'setting_value'=> $serialize_settings,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        return true;
    }


    public static function removeSetting($setting_key,$setting_value)
    {
        $settings = SysSetting::where('setting_key',$setting_key)->pluck('setting_value');
        $settings = unserialize($settings[0]);

        foreach($settings as $key => $setting)
        {
            if ($setting == $setting_value)
            {

                    unset($settings[$key]);
            }
        }
        $settings = array_values($settings);
        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert([
            'setting_key'=>$setting_key
        ],
        [
            'setting_value'=> $serialize_settings,
            'updated_at' => now()
            ]);
        return true;
    }
    public static function updateSetting($setting_key,$setting_value,$setting_new_value)
    {
        $settings = SysSetting::where('setting_key',$setting_key)->pluck('setting_value');
        $settings = unserialize($settings[0]);

        foreach($settings as $key => $setting)
        {
            if ($setting === $setting_value)
            {
                    $position = $key;
            }
        }
        array_splice($settings,$position,0,$setting_new_value);
        dd($settings);
        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert([
            'setting_key'=>$setting_key
        ],
        [
            'setting_value'=> $serialize_settings,
            'updated_at' => now()
            ]);
        return true;
    }
    public static function viewableDate($date)
    {

        $date = date_create($date);
        return date_format($date,'d/m/yy');
    }
    public static function classDateCompare($date)
    {
        $return_date = Carbon::parse($date);
        $now = Carbon::now();
        $length = $return_date->diffInDays($now);
        if ($return_date->gt($now))
        {
            if($length <= self::showSetting('file-expire-warning')) return 'table-warning';
            else return 'table-success';
        }
        else
        {
            return 'table-danger';
        }
    }
}
