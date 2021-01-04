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
        return view('staff.storan-detail',$request);
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
    public static function getMyStaff()
    {
        $user = User::find(auth()->user()->id);
        $department =  $user->profile->department;
        $users = ProfileController::getUserFromDepartment($department);
        return $users;
    }
}
