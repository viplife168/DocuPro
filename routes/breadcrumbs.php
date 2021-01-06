<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('home'));
});
Breadcrumbs::for('add-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tambah Setting', url('add-setting'));
});
Breadcrumbs::for('add-profile', function ($trail) {
    $trail->parent('profile');
    $trail->push('Tambah Profil', route('add-profile'));
});
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile'));
});
Breadcrumbs::for('edit-profile', function ($trail) {
    $trail->parent('profile');
    $trail->push('Pinda Profile', route('view-edit-profile'));
});
Breadcrumbs::for('new-reservation', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Permohonan Baru', url('permohonan-baru'));
});

Breadcrumbs::for('senarai-permohonan', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Senarai Permohonan', url('senarai-permohonan'));
});
Breadcrumbs::for('new-menu', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Menu Baru', route('view-new-menu'));
});
Breadcrumbs::for('active-reservation', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Permohonan Aktif', route('view-active-reservation'));
});

Breadcrumbs::for('detail-active', function ($trail, $res_id) {
    $trail->parent('active-reservation');
    $trail->push('Detail Permohonan Aktif', url('permohonan-aktif',$res_id));
});

Breadcrumbs::for('history', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Sejarah Permohonan', route('view-reservation-history'));
});

Breadcrumbs::for('extend', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Lanjutan Pinjaman', route('view-extend-reservation'));
});

Breadcrumbs::for('transfer', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Pindahan Fail');
});

Breadcrumbs::for('transfer-to-department', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Pindahan Fail Keluar Cawangan', route('view-transfer-to-department'));
});

Breadcrumbs::for('transfer-from-department', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Pindahan Fail Masuk Cawangan', route('view-transfer-from-department'));
});

Breadcrumbs::for('transfer-internal-from', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Pindahan Fail Dari Pemegang Fail', route('view-transfer-internal-from'));
});

Breadcrumbs::for('transfer-internal-to', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Pindahan Fail Kepada Pemegang Baru', route('view-transfer-internal-to'));
});

Breadcrumbs::for('change-incharge-officer', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Tukar Pegawai Bertanggungjawab', route('view-change-incharge-officer'));
});

Breadcrumbs::for('accept-transfer', function ($trail) {
    $trail->parent('transfer');
    $trail->push('Penerimaan Pindahan Fail', route('view-accept-transfer'));
});

Breadcrumbs::for('find-file', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Carian Fail', route('view-find-file'));
});


Breadcrumbs::for('staff-dashboard', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
});

Breadcrumbs::for('staff-permohonan', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Permohonan', route('staff-permohonan'));
});

Breadcrumbs::for('staff-permohonan-detail', function ($trail,string $id) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Permohonan', route('staff-permohonan'));
    $trail->push('Detail Permohonan', route('staff-permohonan-detail',$id));
});

Breadcrumbs::for('staff-carian', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Carian', route('view-staff-carian'));
});
Breadcrumbs::for('staff-pemulangan', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Pemulangan Fail', route('staff-pemulangan'));
});

Breadcrumbs::for('staff-lanjutan', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Senarai Lanjutan Fail', route('staff-lanjutan'));
});

Breadcrumbs::for('staff-storan', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Storan Fail', route('staff-storan'));
});

Breadcrumbs::for('staff-storan-detail', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Storan Fail', route('staff-storan'));
    $trail->push('Storan Fail - [Detail]', route('staff-storan-detail'));
});

Breadcrumbs::for('staff-agihan-tugas', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Agihan Tugas', route('staff-agihan-tugas'));
});

Breadcrumbs::for('add-staff', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Tambah Staff', route('add-staff'));
});

Breadcrumbs::for('user-management', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Pengguna Sistem', route('user-management'));
});

Breadcrumbs::for('Detail-Agihan', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Detail Agihan', route('Detail-Agihan'));
});

Breadcrumbs::for('Pengguna-Sistem-Detail', function ($trail) {
    $trail->push('Dashboard', route('staff-dashboard'));
    $trail->push('Pengguna Sistem Detail', route('Pengguna-Sistem-Detail'));
});
