<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Spp;

class SppController extends Controller
{
    public function __construct(string $oraSppi)
    {
        $this->middleware('auth');
        $this->oraSppi = $oraSppi;
    }
    public static function oraSPPi()
    {
        return '
        SELECT *
        FROM(
        SELECT COLLEGE_STUDENT_FUNDS.CSF_ID,COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO, COLLEGE_STUDENT_FUNDS.CSF_STATUS, COLLEGE_STUDENT_FUNDS.CSF_DATE AS DATE_STATUS, PTPK_MASTER.PTPKM_FULL_NAME, PTPK_MASTER.PTPKM_ICNO,
        row_number() OVER (PARTITION BY COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO ORDER BY COLLEGE_STUDENT_FUNDS.CSF_DATE DESC) AS SECNUM
        FROM COLLEGE_STUDENT_FUNDS
        INNER JOIN PTPK_MASTER ON COLLEGE_STUDENT_FUNDS.CSF_ICNO=PTPK_MASTER.PTPKM_ICNO AND COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO IS NOT NULL
        ORDER BY COLLEGE_STUDENT_FUNDS.CSF_ID
        )
        WHERE SECNUM = 1';
    }
    public static function migrateSPPiTable()
    {
        $last_spps_id = DB::table('spps')->latest('id')->first()->id;
        $spps_id = $last_spps_id +1;
        $ora = DB::connection('oracle')
            ->select(DB::raw(self::oraSPPi() . " AND (CSF_ID >='$spps_id')"));
        foreach ($ora as $input)
        {
            self::updateOrInsertFile($input);
        }
    }
    public static function findSppByICorFileNumber($input)
    {
        $ora = DB::connection('oracle')
            ->select(DB::raw(self::oraSPPi() . " AND (CSF_FILE_REF_NO ='$input' OR PTPKM_ICNO = '$input')"));
        return $ora;
    }

    public static function getCountSppiFiles()
    {
        $ora = DB::connection('oracle')
            ->select(DB::raw(self::oraSPPi()));
        return count($ora);
    }
    public static function getCountDocuProFiles()
    {
        $docu = Spp::all();
        return count($docu);
    }
    public static function getCountBorrowedFiles()
    {
        $docu = Spp::where('status', 'Borrowed')->get();
        return count($docu);
    }
    public static function getCountStoredFiles()
    {
        $docu['bilik'] = SysSettingController::showsetting('bilik_fail');
        $docu['files']['count'] = count(Spp::where('status', 'Stored')->get());
        foreach ($docu['bilik'] as $bilik_fail) {
            $acro = SysSettingController::getAcro($bilik_fail);
            $docu['files'][$acro] = count(Spp::where('storage', 'LIKE', '%' . $acro . '%')->get());
        }
        return $docu;
    }
    public static function getCountUnlocatedFiles()
    {
        $docu = Spp::where('status', 'Unlocated')->get();
        return count($docu);
    }


    public static function findFileSppByIC($ic_number)
    {
        $files_in_spp = DB::connection('oracle')
            ->select(DB::raw(self::oraSPPi() . " AND (PTPKM_ICNO = '$ic_number')"));
        return $files_in_spp;
    }

    public static function findFileSppByNoFail($file_number)
    {
        $files_in_spp = DB::connection('oracle')
            ->select(DB::raw(self::oraSPPi() . " AND (CSF_FILE_REF_NO ='$file_number')"));
        return $files_in_spp;
    }
    public static function findBorrowerRequest(Request $request)
    {
        $borrowers = self::findBorrower($request->cari);
        return $borrowers;
    }

    public static function findBorrower($input)
    {
        $borrowers = self::findDocuProByICorFileNumber($input);


        if (count($borrowers) == 0) {
            $borrowersSpp = self::findSppByICorFileNumber($input);
            // dd($borrowers);
            self::compareAddSppFiles($borrowersSpp);
            $borrowers = self::findDocuProByICorFileNumber($input);
        }

        return $borrowers;
    }

    public static function updateOrInsertFile($input)
    {
        // dd($input);
        DB::table('spps')
            ->updateOrInsert(
                [
                    'file_number' => $input->csf_file_ref_no,
                ],
                [
                    'ic_number' => $input->ptpkm_icno,
                    'name' => $input->ptpkm_full_name,
                    'location' => $input->location ?? 'Unlocated',
                    'file_status' => $input->csf_status,
                    'status' => $input->status ?? 'unlocated',
                    'notes' => $input->notes ?? 'New Add From SPP',
                    'storage' => $input->storage ?? 'Unlocated',
                    'last_person_in_charge' => $input->last_person_in_charge ?? 'System',
                    "created_at" =>  now(), # new \Datetime()
                    "updated_at" => now(),  # new \Datetime()
                    "sppi_id" => $input->csf_id,
                ]
            );
    }

    public static function findDocuProByICorFileNumber($input)
    {
        $borrowers = DB::table('spps')
            ->where('file_number', '=', $input)
            ->orWhere('ic_number', '=', $input)
            ->get();
        return $borrowers;
    }

    public static function findFileInDocuPROByIC($ic_number)
    {
        $files_in_docupro = DB::table('spps')->where('ic_number', '=', $ic_number)->get();
        return $files_in_docupro;
    }

    public static function findFileInDocuPROByNoFail($file_number)
    {
        $files_in_docupro = DB::table('spps')->where('file_number', '=', $file_number)->get();
        return $files_in_docupro;
    }

    public static function compareAddSppFiles($borrowersSpp)
    {
        foreach ($borrowersSpp as $file_spp) {
            self::updateOrInsertFile($file_spp);
        }
    }
}
