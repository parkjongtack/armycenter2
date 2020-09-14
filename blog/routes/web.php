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

Route::get('/ey_admin/priority_change', 'ey_admin@priority_change');
Route::post('/ey_admin/research_action', 'Research@research_action');
Route::get('/ey_admin/research_statistics', 'Research@research_statistics');
Route::get('/ey_admin/statistics_connect', 'Research@research_count');

Route::get('/ey_admin/acc/write_board_form', 'ey_admin@write_board_form');

Route::get('/ey_admin/login', 'ey_admin@ey_login');
Route::post('/ey_admin/login_action', 'ey_admin@ey_login_action');

Route::post('/ey_admin/use_status', 'ey_admin@use_status');

Route::post('/ey_admin/section/write_board_action', 'ey_admin@write_board_action');

Route::get('/ey_admin/message', 'ey_admin@ey_board_list');
Route::post('/ey_admin/control', 'ey_admin@ey_control');
Route::post('/ey_admin/data_modify', 'ey_admin@data_modify');
Route::get('/ey_admin/message/write_board_form', 'ey_admin@write_board_form');
Route::post('/ey_admin/message/write_board_action', 'ey_admin@write_board_action');
Route::get('/ey_admin/message/write_board_form/modify', 'ey_admin@write_board_form');

Route::get('/ey_admin/main_set', 'ey_admin@main_set');
Route::post('/ey_admin/change_main_set', 'ey_admin@change_main_set');
Route::post('/comment_action', 'Main@comment_action');

Route::post('/file_upload', 'ey_admin@file_upload');
//Route::get('/ey_admin/beds', 'ey_admin@ey_press');
//Route::get('/ey_admin/media', 'ey_admin@ey_media');

Route::get('/ey_admin/moslider', 'ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'ey_admin@ey_mopopup');
//Route::get('/ey_admin/acc', 'ey_admin@ey_acc');
Route::get('/ey_admin/logout', 'ey_admin@ey_logout');