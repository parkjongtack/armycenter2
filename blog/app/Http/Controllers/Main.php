<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Classes\PagingFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class Main extends Controller
{

	public function main(Request $request) {

		$main_set = DB::table('main_data_control') 
                    ->select(DB::raw('*'))
					->first();		
		$datetime1 = date_create(date("Y-m-d"));
		$datetime2 = date_create($main_set->d_day);
	   
		$interval = date_diff($datetime1, $datetime2);

		$board_set = DB::table('board') 
                    ->select(DB::raw('*'))
					->where('use_status', 'Y')
					->limit(5)
					->orderby('idx','desc')
					->get();
		
		$board_count_set = DB::table('board') 
                    ->select(DB::raw('count(*) as cnt'))
					->where('use_status', 'Y')
					->first();

		$return_list['board_count_set'] = $board_count_set;
		$return_list['board_set'] = $board_set;
		$return_list['goal_day'] = $interval->format("%a");
		$return_list['main_set'] = $main_set;
		// print_r($main_set);
		return view('/index', $return_list); 

	}

	public function comment_action(Request $request) {
	
		DB::table('board')->insert(
			[
				'contents' => $request->contents,
				'tel' => $request->tel,
				'ip_addr' => request()->ip(),
				'board_type' => "armycenter",
				'use_status' => "Y",
				'writer' => "따뜻한 응원러",
				'reg_date' => \Carbon\Carbon::now(),
			]
		);
		
		echo "<script>alert('댓글이 작성되었습니다.');location.href='/';</script>";
	}


}