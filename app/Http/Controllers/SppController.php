<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    protected $oraSppi = '
    SELECT
        COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO,
        COLLEGE_STUDENT_FUNDS.CSF_STATUS,
        PTPK_MASTER.PTPKM_FULL_NAME,
        PTPK_MASTER.PTPKM_ICNO
    FROM
        COLLEGE_STUDENT_FUNDS
    INNER JOIN
        PTPK_MASTER
    ON
        COLLEGE_STUDENT_FUNDS.CSF_ICNO=PTPK_MASTER.PTPKM_ICNO
    AND
        COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO IS NOT NULL';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function getOraTable()
    {
        $ora = DB::connection('oracle')
            ->select( DB::raw('
                SELECT
                    COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO,
                    COLLEGE_STUDENT_FUNDS.CSF_STATUS,
                    PTPK_MASTER.PTPKM_FULL_NAME,
                    PTPK_MASTER.PTPKM_ICNO
                FROM
                    COLLEGE_STUDENT_FUNDS
                INNER JOIN
                    PTPK_MASTER
                ON
                    COLLEGE_STUDENT_FUNDS.CSF_ICNO=PTPK_MASTER.PTPKM_ICNO
                AND
                    COLLEGE_STUDENT_FUNDS.CSF_FILE_REF_NO IS NOT NULL
                WHERE ROWNUM <=10'
    ));

        // $ora = DB::connection('oracle')->table('COLLEGE_STUDENT_FUNDS AS a')
        //     ->select('a.CSF_FILE_REF_NO, a.CSF_STATUS, b.PTPKM_FULL_NAME, b.PTPKM_ICNO')
        //     ->join('PTPK_MASTER AS b','a.CSF_ICNO','=','b.PTPKM_ICNO')
        //     ->first(array('CSF_FILE_REF_NO','CSF_STATUS','PTPKM_FULL_NAME','PTPKM_ICNO'));
            return $ora;

    }
    public static function getSppTable()
    {
        $spp = DB::connection('spp_srv')->table('export_tpk_maklumat_permohonan')
            ->select('export_tpk_maklumat_permohonan.no_fail', 'export_tpk_maklumat_permohonan.nama', 'export_tpk_maklumat_permohonan.no_kp')
            ->join('export_tpk_tapisan_dtl', 'export_tpk_tapisan_dtl.id_pemohon', '=', 'export_tpk_maklumat_permohonan.id_pemohon')
            ->where([
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'BP'],
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'G'],
                ['export_tpk_maklumat_permohonan.STATUS_FAIL', '=', 'B'],
                ['export_tpk_tapisan_dtl.STATUS', '=', 'A']
            ])
            ->get();
        return count($spp);
    }
    public static function findSppByICorFileNumber($input)
    {
        $borrowers = DB::connection('spp_srv')->table('export_tpk_maklumat_permohonan')
            ->select('export_tpk_maklumat_permohonan.no_fail', 'export_tpk_maklumat_permohonan.nama', 'export_tpk_maklumat_permohonan.no_kp')
            ->join('export_tpk_tapisan_dtl', 'export_tpk_tapisan_dtl.id_pemohon', '=', 'export_tpk_maklumat_permohonan.id_pemohon')
            ->where([
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'BP'],
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'G'],
                ['export_tpk_maklumat_permohonan.STATUS_FAIL', '=', 'B'],
                ['export_tpk_tapisan_dtl.STATUS', '=', 'A']
            ])
            ->where('export_tpk_maklumat_permohonan.no_kp', '=', $input)->orWhere('export_tpk_maklumat_permohonan.no_fail', '=', $input)
            ->get();
        return $borrowers;
    }
    public static function findFileSppByIC($ic_number)
    {
        $files_in_spp = DB::connection('spp_srv')->table('export_tpk_maklumat_permohonan')
            ->select('export_tpk_maklumat_permohonan.no_fail', 'export_tpk_maklumat_permohonan.nama', 'export_tpk_maklumat_permohonan.no_kp')
            ->join('export_tpk_tapisan_dtl', 'export_tpk_tapisan_dtl.id_pemohon', '=', 'export_tpk_maklumat_permohonan.id_pemohon')
            ->where([
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'BP'],
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'G'],
                ['export_tpk_maklumat_permohonan.STATUS_FAIL', '=', 'B'],
                ['export_tpk_tapisan_dtl.STATUS', '=', 'A']
            ])
            ->where('export_tpk_maklumat_permohonan.no_kp', '=', $ic_number)
            ->get();
        return $files_in_spp;
    }

    public static function findFileSppByNoFail($file_number)
    {
        $files_in_spp = DB::connection('spp_srv')->table('export_tpk_maklumat_permohonan')
            ->select('export_tpk_maklumat_permohonan.no_fail', 'export_tpk_maklumat_permohonan.nama', 'export_tpk_maklumat_permohonan.no_kp')
            ->join('export_tpk_tapisan_dtl', 'export_tpk_tapisan_dtl.id_pemohon', '=', 'export_tpk_maklumat_permohonan.id_pemohon')
            ->where([
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'BP'],
                ['export_tpk_maklumat_permohonan.KOD_STATUS_MOHON', '<>', 'G'],
                ['export_tpk_maklumat_permohonan.STATUS_FAIL', '=', 'B'],
                ['export_tpk_tapisan_dtl.STATUS', '=', 'A']
            ])
            ->where('export_tpk_maklumat_permohonan.no_fail', '=', $file_number)
            ->get();
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
                    'file_number' => $input->no_fail,
                ],
                [
                    'ic_number' => $input->no_kp,
                    'name' => $input->nama,
                    'location' => $input->location ?? 'Unlocated',
                    'status' => $input->status ?? 'unlocated',
                    'notes' => $input->notes ?? 'New Add From SPP',
                    'storage' => $input->storage ?? 'Unlocated',
                    'last_person_in_charge' => $input->last_person_in_charge ?? 'System',
                    "created_at" =>  now(), # new \Datetime()
                    "updated_at" => now(),  # new \Datetime()
                ]
            );
    }

    public static function findDocuProByICorFileNumber($input)
    {
        $borrowers = DB::table('spps')
            ->where('file_number', '=', $input)
            ->orWhere('ic_number', '=', $input)
            ->get();
            // dd($borrowers);
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
