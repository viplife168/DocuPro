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

    public static function showDepartments()
    {
        $setting_key = 'departments';
        $dept = SysSetting::where('setting_key', $setting_key)->get();
        $data = $dept->pluck('setting_value')->toArray();
        $dep = unserialize($data[0]);
        return $dep;
    }
    public static function getAcro($department)
    {
        $deptlist = self::showDepartments();
        $acro = array_search($department,$deptlist);
        return $acro;
    }
    public static function showSetting($setting_key)
    {
        if ($setting_key == 'departments') {
            $data = self::showDepartments();
        } else {
            $settings = SysSetting::where('setting_key', $setting_key)->pluck('setting_value');
            $data = unserialize($settings[0]);
        }
        if (count($data) > 1) {
            return $data;
        } elseif (count($data) == 1)  return $data[0];
        else return 0;
    }
    public static function addSetting($setting_key, $setting_value)
    {
        $settings = SysSetting::where('setting_key', $setting_key)->pluck('setting_value');
        if (count($settings)) {
            $settings = unserialize($settings[0]);
            if (!in_array($setting_value, $settings))
                array_push($settings, $setting_value);
        } else {
            $settings = [$setting_value];
        }

        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert(
            [
                'setting_key' => $setting_key
            ],
            [
                'setting_value' => $serialize_settings,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return true;
    }


    public static function removeSetting($setting_key, $setting_value)
    {
        $settings = SysSetting::where('setting_key', $setting_key)->pluck('setting_value');
        $settings = unserialize($settings[0]);

        foreach ($settings as $key => $setting) {
            if ($setting == $setting_value) {

                unset($settings[$key]);
            }
        }
        $settings = array_values($settings);
        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert(
            [
                'setting_key' => $setting_key
            ],
            [
                'setting_value' => $serialize_settings,
                'updated_at' => now()
            ]
        );
        return true;
    }
    public static function updateSetting($setting_key, $setting_value, $setting_new_value)
    {
        $settings = SysSetting::where('setting_key', $setting_key)->pluck('setting_value');
        $settings = unserialize($settings[0]);

        foreach ($settings as $key => $setting) {
            if ($setting === $setting_value) {
                $position = $key;
            }
        }
        array_splice($settings, $position, 0, $setting_new_value);
        dd($settings);
        $serialize_settings = serialize($settings);
        SysSetting::updateOrInsert(
            [
                'setting_key' => $setting_key
            ],
            [
                'setting_value' => $serialize_settings,
                'updated_at' => now()
            ]
        );
        return true;
    }
    public static function viewableDate($date)
    {

        $date = date_create($date);
        return date_format($date, 'd/m/yy');
    }
    public static function classDateCompare($date)
    {
        $return_date = Carbon::parse($date);
        $now = Carbon::now();
        $length = $return_date->diffInDays($now);
        if ($return_date->gt($now)) {
            if ($length <= self::showSetting('file-expire-warning')) return 'table-warning';
            else return 'table-success';
        } else {
            return 'table-danger';
        }
    }
    public static function department()
    {
        $department = [
            "PM" => "PEJABAT MENTERI",
            "PKE" => "PEJABAT KETUA EKSEKUTIF",
            "DASAR" => "CAWANGAN DASAR DAN PENYELIDIKAN",
            "AUDIT" => "UNIT AUDIT DALAM",
            "PUU" => "UNIT UNDANG-UNDANG",
            "UKK" => "CAWANGAN KOMUNIKASI KORPORAT",
            "PENGUATKUASAAN" => "CAWANGAN PENGUATKUASAAN",
            "LOD" => "Seksyen LOD Dan Saman",
            "SIASATAN" => "Seksyen Siasatan",
            "CARIAN_KHAS" => "Seksyen Carian Khas",
            "PNP" => "CAWANGAN PENDAFTARAN DAN PENENTUSAHAN",
            "PBP" => "PEJABAT PENGURUS BESAR PENGURUSAN",
            "PENGURUSAN" => "BAHAGIAN KHIDMAT PENGURUSAN",
            "PSM" => "CAWANGAN PENGURUSAN SUMBER MANUSIA",
            "INTEGRITI" => "Unit Integriti",
            "ADMIN" => "CAWANGAN PENTADBIRAN",
            "BPM" => "BAHAGIAN PENGURUSAN MAKLUMAT",
            "INFRA" => "CAWANGAN INFRASTRUKTUR DAN OPERASI ICT",
            "MULTIMEDIA" => "CAWANGAN APLIKASI MULTIMEDIA",
            "APLIKASI" => "Seksyen Penyelenggaraan Aplikasi Sistem",
            "DEVELOPMENT" => "Seksyen Pembangunan Aplikasi dan Multimedia",
            "BW" => "BAHAGIAN KEWANGAN KORPORAT, PELABURAN DAN AKAUN",
            "PENGURUSAN_KEWANGAN" => "CAWANGAN  PENGURUSAN KEWANGAN",
            "KEW" => "Seksyen Kewangan",
            "PEROLEHAN" => "Seksyen Perolehan",
            "PELABURAN" => "CAWANGAN PELABURAN DAN AKAUN",
            "INSURANS" => "Seksyen Bayaran dan Insurans",
            "TERIMAAN" => "Seksyen Terimaan dan Pelaburan",
            "PBO" => "PEJABAT PENGURUS BESAR OPERASI",
            "BPPL" => "BAHAGIAN PENGURUSAN PINJAMAN LATIHAN",
            "ARAH_BAYAR" => "Unit Arah Bayar",
            "PERJANJIAN" => "Unit Perjanjian",
            "PEMBIAYAAN" => "BAHAGIAN PENGURUSAN PEMBIAYAAN LATIHAN",
            "PERMOHONAN" => "Unit Permohonan",
            "CRD" => "CAWANGAN REKOD DAN DOKUMENTASI",
            "FAIL" => "Seksyen Fail Penyelenggaraan Rekod",
            "BB" => "BAHAGIAN BAYARAN BALIK",
            "NOTIS" => "CAWANGAN PUNGUTAN DAN NOTIS",
            "KAWALAN_KREDIT" => "CAWANGAN KAWALAN KREDIT",
            "PENANGGUHAN" => "Seksyen Penangguhan",
            "CCRIS" => "Seksyen CCRIS Dan Insentif",
            "HAPUSKIRA" => "Seksyen Penstrukturan Dan Hapuskira",
            "KUTIPAN_CARIAN" => "CAWANGAN AGEN KUTIPAN DAN CARIAN",
            "KUTIPAN" => "Seksyen Agen Kutipan",
            "CARIAN" => "Seksyen Agen Carian",
            "UTCKL" => "UTC Kuala Lumpur",
            "UTCPERAK" => "UTC Perak",
            "UTCPAHANG" => "UTC Pahang",
            "UTCJOHOR" => "UTC Johor",
            "UTCMELAKA" => "UTC Melaka",
            "UTCKEDAH" => "UTC Kedah",
            "UTCSARAWAK" => "UTC Sarawak",
            "UTCSABAH" => "UTC Sabah",
        ];
        return $department;
    }
}
