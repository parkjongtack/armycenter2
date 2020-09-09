<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Main@main');

Route::get('/ey_admin/priority_change', 'Ey_admin@priority_change');


Route::get('/ey_admin/acc/write_board_form', 'Ey_admin@write_board_form');

Route::get('/ey_admin/login', 'Ey_admin@ey_login');
Route::post('/ey_admin/login_action', 'Ey_admin@ey_login_action');

Route::post('/ey_admin/section/write_board_action', 'Ey_admin@write_board_action');

Route::get('/ey_admin/message', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/data_modify', 'Ey_admin@data_modify');
Route::get('/ey_admin/message/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/message/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/message/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/main_set', 'Ey_admin@main_set');
Route::post('/ey_admin/change_main_set', 'Ey_admin@change_main_set');
Route::post('/comment_action', 'Main@comment_action');

Route::post('/file_upload', 'Ey_admin@file_upload');
//Route::get('/ey_admin/beds', 'Ey_admin@ey_press');
//Route::get('/ey_admin/media', 'Ey_admin@ey_media');

Route::get('/ey_admin/moslider', 'Ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'Ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'Ey_admin@ey_mopopup');
//Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::get('/ey_admin/logout', 'Ey_admin@ey_logout');