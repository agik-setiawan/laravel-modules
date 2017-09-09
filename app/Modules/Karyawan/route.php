<?php
Route::group(['middleware' => 'web', 'prefix' => 'test', 'namespace' => 'Modules'], function()
{
Route::get('/', function () {
    return 'KARYAWAN TEST';
});
});
Route::get('/', function () {
    return 'KARYAWAN';
});