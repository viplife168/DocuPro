<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileDetail;
use App\Spp;
use Illuminate\Support\Facades\DB;

class FileDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function changeFileStatus($file_id, $status, $officer = NULL)
    {
        $file = FileDetail::find($file_id);
        $file->file_status = $status;
        $file->incharge_officer = $officer;
        $file->updated_at = now();
        $file->save();
    }
    public static function getFileLocation($file_number)
    {
        $file = Spp::where('file_number', $file_number)->first();
        $location = $file->location;
        return $location;
    }
    public static function updateSppFile($file_id, $location = 'CRD', $storage = 'borrowed', $last_person_borrow = '', $last_person_in_charge = '', $last_deparment_borrow = '')
    {
        $file = Spp::where('file_number', $file_id)->get();
        $file->location = $location;
        $file->last_person_borrow = $last_person_borrow;
        $file->storage = $storage;
        $file->last_person_in_charge = $last_person_in_charge;
        $file->last_deparment_borrow = $last_deparment_borrow;
        $file->save();
    }
    public static function getFileStorage($file_number)
    {
        $file = Spp::where('file_number', $file_number)->first();
        $storage = $file->storage;
        return $storage;
    }
    public function fileStorageList($storage)
    {
    }
    public function updateLastPersonIncharge($name)
    {
    }
    public function updateLastPersonBorrow($name)
    {
    }
    public function updateLastDepartmentBorrow($department)
    {
    }
    public static function getMyFiles()
    {
        $files = DB::table('file_details')
            ->where('file_user_id', auth()->user()->id)
            ->where('file_status', 'Borrowed')
            ->get();
        return $files;
    }
    public static function getFileByDepartment($department)
    {
        $files = Spp::where('location', $department)->get();
        return $files;
    }
    public static function getFilesByUser($id)
    {
        $files = DB::table('file_details')
            ->where('file_user_id', $id)
            ->where('file_status', 'Borrowed')
            ->get();
        return $files;
    }
}
