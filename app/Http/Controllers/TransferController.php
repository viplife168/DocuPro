<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileDetailController as File;
use App\Transfer;
use App\TransferFile;
use App\User;
use App\Http\Controllers\ProfileController as Profile;

class TransferController extends Controller
{
    public function viewToDepartment()
    {
        $data['files'] = File::getMyFiles();
        // dd($data);
        return view('reservation.transfer-to-department', $data);
    }

    public function submitToDepartment(Request $request)
    {
        $data = $request->all();
        $data['files'] = explode(",", $data['files']);
        $user = User::find(auth()->user()->id);

        $data['user'] = $user;
        $data['department'] = $user->profile->department;
        dd($data);
        $transfer = new Transfer;
        $transfer->date_apply = now();
        $transfer->user_id = auth()->user()->id;
        $transfer->department = $data['department'];
        $transfer->to_department = $data['to_department'];
        $transfer->receipient = $data['penerima'];
        $transfer->notes  = $data['catatan'];
        $transfer->created_at = now();
        $transfer->updated_at = now();
        $transfer->save();

        foreach ($data['files'] as $file) {
            $fileInfo = new TransferFile(
                [
                    'file_number' => $file,
                    'user_id' => auth()->user()->id,
                    'receipient' => $data['penerima'],
                    'date_apply' => now(),
                    'status' => 'Transfer',
                    'notes' => $data['catatan'],
                    'created_at' => now(),
                    'updated_at ' => now(),
                ]
            );
            $transfer->files()->save($fileInfo);
            //update spp file status
        }
    }
    public function viewFromDepartment($data =NULL)
    {
        if (!isset($data['files']))$data['files'] = [];
        return view('reservation.transfer-from-department',$data);
    }

    public function submitFromDepartment(Request $request)

    {

        $data = $request->all();
        $data['btnPilih'] = $data['btnPilih'] ?? '';

        if ($data['btnPilih'] == 'Pilih') {
            $data['files'] = File::getFileByDepartment($data['department']);
            // dd($data);
            return $this->viewFromDepartment($data);
        } else {
            dd($data);
        }
        $data['files'] = explode(",", $data['files']);
        $user = User::find(auth()->user()->id);

        $data['user'] = $user;
        $data['department'] = $user->profile->department;
        dd($data);
        $transfer = new Transfer;
        $transfer->date_apply = now();
        $transfer->user_id = auth()->user()->id;
        $transfer->department = $data['department'];
        $transfer->to_department = $data['to_department'];
        $transfer->receipient = $data['receipient'];
        $transfer->notes  = $data['notes'];
        $transfer->created_at = now();
        $transfer->updated_at = now();
        $transfer->save();

        foreach ($data['files'] as $file) {
            $fileInfo = new TransferFile(
                [
                    'file_number' => $file,
                    'user_id' => auth()->user()->id,
                    'receipient' => $data['receipient'],
                    'date_apply' => now(),
                    'status' => 'Transfer',
                    'notes' => $data['notes'],
                    'created_at' => now(),
                    'updated_at ' => now(),
                ]
            );
            $transfer->files()->save($fileInfo);
            //update spp file status
        }
    }
    public function viewInternalFrom($data =NULL)
    {
        if (!isset($data['files']))$data['files'] = [];
        if (!isset($data['staff']))$data['staff'] = [];

        $user = User::find(auth()->user()->id);
        $department = $user->profile->department;
        $users = Profile::getUserFromDepartment($department);
        foreach ($users as $user)
        {
            $staff = User::find($user->profile_id);
            $data['staff'][$user->profile_id] = $staff->name;
        }
        // dd($data);
        return view('reservation.transfer-internal-from',$data);
    }
    public function submitInternalFrom(Request $request)
    {

        $data = $request->all();

        $data['files'] = explode(",", $data['files']);
        $user = User::find(auth()->user()->id);

        $data['user'] = $user;
        $data['department'] = $user->profile->department;
        dd($data);
        $transfer = new Transfer;
        $transfer->date_apply = now();
        $transfer->user_id = auth()->user()->id;
        $transfer->department = $data['department'];
        $transfer->to_department = $data['to_department'];
        $transfer->receipient = $data['receipient'];
        $transfer->notes  = $data['notes'];
        $transfer->created_at = now();
        $transfer->updated_at = now();
        $transfer->save();

        foreach ($data['files'] as $file) {
            $fileInfo = new TransferFile(
                [
                    'file_number' => $file,
                    'user_id' => auth()->user()->id,
                    'receipient' => $data['receipient'],
                    'date_apply' => now(),
                    'status' => 'Transfer',
                    'notes' => $data['notes'],
                    'created_at' => now(),
                    'updated_at ' => now(),
                ]
            );
            $transfer->files()->save($fileInfo);
            //update spp file status
        }
    }

    public function viewInternalTo($data =NULL)
    {
        $data['files'] = File::getMyFiles();
        if (!isset($data['staff']))$data['staff'] = [];

        $user = User::find(auth()->user()->id);
        $department = $user->profile->department;
        $users = Profile::getUserFromDepartment($department);
        foreach ($users as $user)
        {
            $staff = User::find($user->profile_id);
            $data['staff'][$user->profile_id] = $staff->name;
        }
        // dd($data);
        return view('reservation.transfer-internal-to',$data);
    }
    public function submitInternalTo(Request $request)
    {

        $data = $request->all();
        $data['btnPilih'] = $data['btnPilih'] ?? '';

        $data['files'] = explode(",", $data['files']);
        $user = User::find(auth()->user()->id);

        $data['user'] = $user;
        $data['department'] = $user->profile->department;
        dd($data);
        $transfer = new Transfer;
        $transfer->date_apply = now();
        $transfer->user_id = auth()->user()->id;
        $transfer->department = $data['department'];
        $transfer->to_department = $data['to_department'];
        $transfer->receipient = $data['receipient'];
        $transfer->notes  = $data['notes'];
        $transfer->created_at = now();
        $transfer->updated_at = now();
        $transfer->save();

        foreach ($data['files'] as $file) {
            $fileInfo = new TransferFile(
                [
                    'file_number' => $file,
                    'user_id' => auth()->user()->id,
                    'receipient' => $data['receipient'],
                    'date_apply' => now(),
                    'status' => 'Transfer',
                    'notes' => $data['notes'],
                    'created_at' => now(),
                    'updated_at ' => now(),
                ]
            );
            $transfer->files()->save($fileInfo);
            //update spp file status
        }
    }

    public function viewChangeInchargeOfficer($data =NULL)
    {
        $data['files'] = File::getMyFiles();
        if (!isset($data['staff']))$data['staff'] = [];

        $user = User::find(auth()->user()->id);
        $department = $user->profile->department;
        $users = Profile::getUserFromDepartment($department);
        $users = User::all();
        foreach ($users as $user)
        {
            $data['staff'][$user->id] = $user->name;
        }
        // dd($data);
        return view('reservation.change-incharge-officer',$data);
    }
    public function submitChangeInchargeOfficer(Request $request)
    {

        $data = $request->all();
        $data['btnPilih'] = $data['btnPilih'] ?? '';

        $data['files'] = explode(",", $data['files']);
        $user = User::find(auth()->user()->id);

        $data['user'] = $user;
        $data['department'] = $user->profile->department;
        dd($data);
        $transfer = new Transfer;
        $transfer->date_apply = now();
        $transfer->user_id = auth()->user()->id;
        $transfer->department = $data['department'];
        $transfer->to_department = $data['to_department'];
        $transfer->receipient = $data['receipient'];
        $transfer->notes  = $data['notes'];
        $transfer->created_at = now();
        $transfer->updated_at = now();
        $transfer->save();

        foreach ($data['files'] as $file) {
            $fileInfo = new TransferFile(
                [
                    'file_number' => $file,
                    'user_id' => auth()->user()->id,
                    'receipient' => $data['receipient'],
                    'date_apply' => now(),
                    'status' => 'Transfer',
                    'notes' => $data['notes'],
                    'created_at' => now(),
                    'updated_at ' => now(),
                ]
            );
            $transfer->files()->save($fileInfo);
            //update spp file status
        }
    }
    public function viewAcceptTransfer()
    {
        $data['transfers'] = Transfer::where('receipient',auth()->user()->id)->get();
        return view('reservation.accept-transfer',$data);
    }

    public function submitAcceptTransfer()
    {

    }
}
