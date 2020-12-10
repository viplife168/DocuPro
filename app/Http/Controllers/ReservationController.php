<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\FileDetail;
use App\Http\Controllers\SppController as SPP;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FileDetailController as File;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function newReservation(Request $request)
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
                return view('reservation.new',$data);
            }
            else $data['peminjam'] = $peminjam;

            return view('reservation.new',$data);
            die;
        }
        elseif (stristr($request->btnSubmit, '-', true) == 'Tambah')
        {
            $nofail = trim(stristr($request->btnSubmit, '-'), '-');
            if ($data['addedFiles'] == '') $data['addedFiles'] = array();
            array_push($data['addedFiles'], $nofail);
            return view('reservation.new',$data);
        }
        elseif (stristr($request->btnSubmit, '-', true) == 'Buang')
        {
            $nofail =trim(stristr($request->btnSubmit, '-'), '-');
            if (($key = array_search($nofail, $data['addedFiles'])) !== false) {
                unset($data['addedFiles'][$key]);
                $data['addedFiles'] = array_values($data['addedFiles']);
            }
            return view('reservation.new',$data);
        }
        elseif ($request->btnSubmit == 'Hantar')
        {
            $reservation = Reservation::create([
                'user_id' => auth()->user()->id,
                'department' => $request->department,
                'apply_date' => now(),
                'collection_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->collection_date))),
                'return_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->return_date))),
                'res_status' => 'New',
                'res_notes' => $request->notes,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $reservation->save();

            foreach ($request->addedFiles as $file) {

                $reservation->file_details()->create([
                    'file_user_id' => auth()->user()->id,
                    'file_number' => $file,
                    'res_collect_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->collection_date))),
                    'res_return_date' => date('Y-m-d', strtotime(str_replace('/', '-', $request->return_date))),
                    'res_renew_count' => 0,
                    'file_status' => 'Booked',
                    'file_notes' => $request->notes,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $reservation->save();
            }


            $status = [
                'type' =>'primary',
                'message' => 'Permohonan anda telah berjaya dihantar',
            ];
            return back()->withStatus($status);
        }


    }
    public function changeResStatus($reservation_id, $status)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->res_status = $status;
        $reservation->updated_at = now();
        $reservation->save();
    }
    public function findFile(Request $request)
    {
        $peminjam = SPP::findBorrower($request->txtCari)->toArray();
        if (!$peminjam)
        {
            $status = [
                'type' => 'danger',
                'message' => 'Tiada Fail Peminjam Dijumpai'
            ];
            return back()->withStatus($status);
        }
        else $data = ['peminjam'=> $peminjam,];
        return view('reservation.find', $data);

    }
    public function getActiveReservation()
    {
        $permohonan = DB::table('reservations')
            ->where('user_id' , auth()->user()->id)
            ->where('res_status','New')
            ->orWhere('res_status','Processed')
            ->get();
            $data['permohonan'] = $permohonan->toArray();
        return view('reservation.active',$data);
    }
    public static function countFileDetails($reservation_id)
    {
        $res = Reservation::find($reservation_id);
        $files = count($res->file_details()->get());
        return $files;
    }
    public function getDetailActive($id)
    {
        $res = Reservation::find($id);
        $files = $res->file_details()->get();
        $data = [
            'res_id'=> $id,
            'res' => $res,
            'files' => $files,
        ];
        // dd($data);
        return view('reservation.detail',$data);
    }
    public function getReservationHistory()
    {
        $permohonan = DB::table('reservations')
            ->where('user_id' , auth()->user()->id)
            ->where('res_status','Closed')
            ->get();
        $data['permohonan'] = $permohonan->toArray();
        return view('reservation.history',$data);
    }
    public function viewExtend()
    {
        $files = DB::table('file_details')
            ->where('file_user_id',auth()->user()->id)
            ->where('file_status','Booked')
            ->orderBy('res_return_date')
            ->get();
        $data['files'] = $files->toArray();
        return view('reservation.extend',$data);
    }
    public function submitExtend(Request $request)
    {
        $file =  FileDetail::find($request->fileId);
        $file->res_return_date = Carbon::createFromFormat('d/m/yy', $request->nextReturn);
        $file->res_renew_count = $file->res_renew_count +1;
        $file->file_notes =$request->notes;
        $file->updated_at = now();
        $file->save();
        $status = [
            'type' => 'success',
            'message' => 'Lanjutan Pinjaman Berjaya'
        ];
        return back()->withStatus($status);
    }
}
