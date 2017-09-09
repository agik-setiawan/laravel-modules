<?php
Route::get('/', function () {
    return 'KARYAWAN';
});
Route::get('view', 'Karyawan@index');