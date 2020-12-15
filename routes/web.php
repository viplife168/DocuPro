<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController as Profile;
use App\Http\Controllers\SysSettingController as SysSettings;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');


    // Notification Routes

    Route::get('new-reservation-notification', 'NotificationController@newReservationNotification');

    //Profile Routes

    Route::get('profile', 'ProfileController@viewProfile')->name('profile');

    Route::post('add-profile', function (Request $request) {
        $user_id = auth()->user()->id;
        $addProfile = Profile::addProfile($user_id, $request,);
        return $addProfile;
    })->name('add-profile');

    Route::get('add-profile', 'ProfileController@viewAddProfile')->name('view-add-profile');

    Route::get('edit-profile', 'ProfileController@viewEditProfile')->name('view-edit-profile');
    Route::post('edit-profile', 'ProfileController@submitEditProfile')->name('submit-edit-profile');




    //Settings Routes

    Route::get('add-setting', function () {
        return view('setting.new');
    })->name('add-setting');
    Route::post('add-setting', function (Request $request) {
        $settings = $request->setting;
        foreach ($settings as $setting) {

            SysSettings::addSetting($setting['setting_key'], $setting['setting_value'],);
        }
        return back()->withStatus(['type' => 'success', 'message' => 'Settings Added!']);
    });

    //Reservation Routes

    Route::get('permohonan-baru', function () {
        $data = [
            'departments' => SysSettings::showSetting('departments'),
            'user' => auth()->user(),
        ];
        return view('reservation.new', $data);
    })->name('view-new-reservation');

    Route::post('permohonan-baru', 'ReservationController@newReservation')->name('submit-new-reservation');

    Route::get('senarai-permohonan', function () {
        return view('reservation.list');
    })->name('view-reservation-list');


    Route::get('permohonan-aktif', 'ReservationController@getActiveReservation')->name('view-active-reservation');
    Route::get('permohonan-aktif/{id}', 'ReservationController@getDetailActive')->name('view-detail-active');

    Route::post('/permohonan-aktif', 'ReservationController@getActiveReservation')->name('submit-active-reservation');

    Route::get('/sejarah-permohonan', function () {
        return view('reservation.history');
    })->name('view-reservation-history');

    Route::get('/lanjutan', 'ReservationController@viewExtend')->name('view-extend-reservation');
    Route::post('/lanjutan/hantar', 'ReservationController@submitExtend')->name('submit-extend-reservation');


    Route::get('/permohonan-pindahan', function () {
        return view('reservation.transfer');
    })->name('view-transfer');

    Route::get('/pindah-cawangan-keluar', 'TransferController@viewToDepartment')->name('view-transfer-to-department');

    Route::post('/pindah-cawangan-keluar/hantar', 'TransferController@submitToDepartment')->name('submit-transfer-to-department');

    Route::get('/pindah-cawangan-masuk', 'TransferController@viewFromDepartment')->name('view-transfer-from-department');

    Route::post('/pindah-cawangan-masuk', 'TransferController@submitFromDepartment')->name('submit-transfer-from-department');


    Route::get('/pindahan-dalaman-daripada', 'TransferController@viewInternalFrom')->name('view-transfer-internal-from');

    Route::post('/pindahan-dalaman-daripada', 'TransferController@submitInternalFrom')->name('submit-transfer-internal-from');

    Route::get('/pindahan-dalaman-kepada', 'TransferController@viewInternalTo')->name('view-transfer-internal-to');

    Route::post('/pindahan-dalaman-kepada', 'TransferController@submitInternalTo')->name('submit-transfer-internal-to');

    Route::get('/pertukaran-pegawai-bertanggungjawab', 'TransferController@viewChangeInchargeOfficer')->name('view-change-incharge-officer');

    Route::post('/pertukaran-pegawai-bertanggungjawab', 'TransferController@submitChangeInchargeOfficer')->name('submit-change-incharge-officer');

    Route::get('/penerimaan-pindahan', 'TransferController@viewAcceptTransfer')->name('view-accept-transfer');

    Route::post('/penerimaan-pindahan', 'TransferController@submitAcceptTransfer')->name('submit-accept-transfer');

    Route::get('/staff/carian', 'StaffController@viewCarianStaff')->name('view-staff-carian');

    Route::post('/staff/carian', 'StaffController@submitCarianStaff')->name('submit-staff-carian');


    Route::get('carian-fail', function () {
        $data = ['peminjam' => ''];
        return view('reservation.find', $data);
    })->name('view-find-file');


    Route::post('/carian-fail', 'ReservationController@findFile')->name('submit-find-file');




    //Menu Routes
    Route::get('/add-menu', function () {
        return view('menu.new');
    })->name('view-new-menu');

    Route::post('/add-menu', 'MenuController@addMenu')->name('submit-new-menu');


    //Print

    Route::get('/cetak-memo-pindahan', function () {
        return view('print.memo-pindahan');
    })->name('print-memo-pindahan');


    //Staff
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff-dashboard');

    Route::get('/staff/permohonan', function () {
        return view('staff.permohonan');
    })->name('staff-permohonan');


    Route::get('/staff/pemulangan', function () {
        return view('staff.pemulangan');
    })->name('staff-pemulangan');

    Route::get('/staff/lanjutan', function () {
        return view('staff.lanjutan');
    })->name('staff-lanjutan');

    Route::get('/staff/storan', function () {
        return view('staff.storan');
    })->name('staff-storan');

    Route::post('/staff/storan-detail', 'StaffController@addFileToStorage')->name('staff-storan-detail');

    Route::get('/staff/agihan-tugas', function () {
        return view('staff.agihan-tugas');
    })->name('staff-agihan-tugas');

    Route::get('/add-staff', function () {
        return view('administrative.add-staff');
    })->name('add-staff');

    Route::get('/user-management', function () {
        return view('administrative.user-management');
    })->name('user-management');

    Route::get('/staff/Detail-Agihan', function () {
        return view('staff.Detail-Agihan');
    })->name('Detail-Agihan');

});
