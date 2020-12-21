<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\FileDetail;
use App\Http\Controllers\SppController as SPP;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FileDetailController as File;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        elseif ($request->btnSubmit == 'Hantar')
        {
            return view('print.carian');
        }

    }
    public function addFileToStorage(Request $request)
    {
        return view('staff.storan-detail',$request);
    }

}
