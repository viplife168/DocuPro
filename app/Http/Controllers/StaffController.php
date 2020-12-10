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
            // $reservation = Reservation::create([
            //     'user_id' => auth()->user()->id,
            //     'department' => $request->department,
            //     'apply_date' => now(),
            //     'collection_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->collection_date))),
            //     'return_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->return_date))),
            //     'res_status' => 'New',
            //     'res_notes' => $request->notes,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            // $reservation->save();

            // foreach ($request->addedFiles as $file) {

            //     $reservation->file_details()->create([
            //         'file_user_id' => auth()->user()->id,
            //         'file_number' => $file,
            //         'res_collect_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->collection_date))),
            //         'res_return_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->return_date))),
            //         'res_renew_count' => 0,
            //         'file_status' => 'Booked',
            //         'file_notes' => $request->notes,
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
            //     $reservation->save();
            // }


            // $status = [
            //     'type' =>'primary',
            //     'message' => 'Permohonan anda telah berjaya dihantar',
            // ];
            // return back()->withStatus($status);
        }

    }
    public function addFileToStorage(Request $request)
    {
        return view('staff.storan-detail',$request);
    }

}
