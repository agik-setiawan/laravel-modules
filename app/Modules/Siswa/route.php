<?php
Route::group(['middleware' => 'web', 'prefix' => 'test', 'namespace' => 'Modules'], function()
{
Route::get('/', function () {
    return 'SISWA Test';
});
});

Route::get('/', function () {
    return 'SISWA';
});