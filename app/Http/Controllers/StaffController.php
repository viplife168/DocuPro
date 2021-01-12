<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\FileDetail;
use App\Http\Controllers\SppController as SPP;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FileDetailController as File;
use App\Profile;
use App\Spp as AppSpp;
use Illuminate\Support\Facades\Gate;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SysSettingController as Sys;
use App\Http\Controllers\StorageController as Store;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->stafflist = Profile::where('department','=','Cawangan Dokumentasi Dan Rekod');
    }
    public function viewCarianStaff()
    {
        $data = ['peminjam' => ''];
        return view('staff.carian',$data);
    }
    public function submitCarianStaff(Request $request)
    {
        $data = $request->all();
        $data['user'] = auth()->user();
        if (empty($data['addedFiles'])) $data['addedFiles'] = array();

        if ($request->btnSubmit == 'Cari')
        {
            $peminjam = SPP::findBorrower($request->txtCari)->toArray();

            if (!$peminjam)
            {
                $status = [
                    'type' => 'danger',
                    'message' => 'Tiada Fail Peminjam Dijumpai'
                ];
                $request->session()->flash('status',$status);
                return view('staff.carian',$data);
            }
            else $data['peminjam'] = $peminjam;

            return view('staff.carian',$data);
            die;
        }
        elseif (stristr($request->btnSubmit, '-', true) == 'Tambah')
        {
            $nofail = trim(stristr($request->btnSubmit, '-'), '-');
            if ($data['addedFiles'] == '') $data['addedFiles'] = array();
            array_push($data['addedFiles'], $nofail);
            return view('staff.carian',$data);
        }
        elseif (stristr($request->btnSubmit, '-', true) == 'Buang')
        {
            $nofail =trim(stristr($request->btnSubmit, '-'), '-');
            if (($key = array_search($nofail, $data['addedFiles'])) !== false) {
                unset($data['addedFiles'][$key]);
                $data['addedFiles'] = array_values($data['addedFiles']);
            }
            return view('staff.carian',$data);
        }
        elseif ($request->btnSubmit == 'Cetak')
        {

            $data['file_details'] = array();
            foreach($data['addedFiles'] as $file)
            {
                $details = AppSpp::where('file_number',$file)->limit(1)->get();
                array_push($data['file_details'],$details[0]);
            }
            // dd($data);
            return view('print.carian',$data);
        }
    }
    public function addFileToStorage(Request $request)
    {
        $data = $request->all();
        return view('staff.storan-detail',$data);
    }
    public function addStorageItem(Request $request)
    {
        $data=$request->all();
        if ($request->btn_tambah == "")
        {
            // $data['filecount']=0;
            $data['fails'] =  Store::getBilanganFail($request->bilik_fail,$request->rak,$request->tingkat,$request->seksyen);
            // $data['filecount'] = $data['files']['count'];
            // dd($data);
            return view('staff.storan-detail',$data);
        }
        else{
            $tambah = $request->btn_tambah;
            switch($tambah){
                case 'bilik-fail':
                    Sys::addSetting('bilik_fail',$request->bilik_fail_baru);
                    $data['bilik_fail'] = $request->bilik_fail_baru;
                    break;
                case 'rak':
                    Sys::addSetting('rak',$request->rak_baru);
                    $data['rak'] = $request->rak_baru;
                    break;
                case 'tingkat':
                    Sys::addSetting('tingkat',$request->tingkat_baru);
                    $data['tingkat'] = $request->tingkat_baru;
                    break;
                case 'seksyen':
                    Sys::addSetting('seksyen',$request->seksyen_baru);
                    $data['seksyen'] = $request->seksyen_baru;
                    break;
                default:
            }
            return view('staff.storan',$data);
        }
    }
    public function viewPermohonanBaru()
    {
        $user = auth()->user();
        if ((Gate::allows('isAdmin'))|| ((Gate::allows('isSupervisor'))))
        {
            $data['new_reservation'] =  Reservation::where('res_status', '=', 'New')->get();
        }
        else
        {
            $data['new_reservation'] =  Reservation::where('res_status', '=', 'Assigned')
                ->where('incharge_person','=',$user->name);

        }
        return view('staff.permohonan',$data);
    }
    public function getPermohonanBaru($id)
    {
        $data['myStaff'] = $this->getMyStaff();
        $data['file_details'] = array();
        $data['reservation'] = Reservation::find($id);
        $files = FileDetail::where('reservation_id', '=', $id)->get();
        foreach ($files as $file)
        {
            $details = AppSpp::where('file_number',$file->file_number)->limit(1)->get();
            array_push($data['file_details'],$details[0]);
        }

        $data['usr'] = User::select('name')->where('id',$data['reservation']['user_id'])->get();
        $data['user_name'] = $data['usr'][0]->name;
        // dd($data);
        return view('staff.permohonan-detail', $data);
    }
    public function postPermohonanBaru(Request $request)
    {
        // dd($request);
        $all_incharge = [];
        foreach($request->select as $key=>$incharge)
        {

            $file = AppSpp::where('file_number',$key)->first();
            if ($incharge == null){
                $file->last_person_in_charge = $request->allToStaff;
            }
            else {
                $file->last_person_in_charge = $incharge;
            }
            if (array_search($file->last_person_in_charge,$all_incharge) == null)
            {
                array_push($all_incharge,$file->last_person_in_charge);
            }
            $file->status = 'Processing';
            $file->save();

        }
        $res = (object)$request->reservation;

        $reservation = Reservation::find($res->id);
                // dd($reservation);
        $reservation->incharge_person = $all_incharge;
        $reservation->res_status = "Waiting To Complete";
        $reservation->save();
        return redirect()->route('staff-permohonan');

    }
    public static function getMyStaff()
    {
        $user = User::find(auth()->user()->id);
        $department =  $user->profile->department;
        $users = ProfileController::getUserFromDepartment($department);
        return $users;
    }
    public static function viewAddStaff()
    {
        $user = auth()->user();
        if ($user->role == 'admin')
        {
            $data['sysusers'] = User::all();

        }
        else {
            $data['sysusers'] = self::getMyStaff();
        }
        // dd($data['sysusers']);
        return view('administrative.add-staff',$data);
    }
    public function submitAddStaff(Request $request)
    {
        foreach ($request->btn_role as $key=>$val)
        {
            $updateProfile = ProfileController::setRole($key,$request->user_role[$key]);
        }
        // dd($request);
        $user = auth()->user();
        if ($user->role == 'admin')
        {
            $data['sysusers'] = User::all();

        }
        else {
            $data['sysusers'] = self::getMyStaff();
        }
        // dd($data['sysusers']);
        return view('administrative.add-staff',$data);
    }
}
