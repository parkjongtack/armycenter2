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

		$commons = new CommonFunction();

		$agent = $commons->getBrowser();
		$device = "";
		$walletSize = 0;
		$curreny_id = !$request->cu ? '' : $request->cu;
		
		if(stripos($agent['userAgent'], 'android-web-app') !== false) {
			$device = 'webapp';
		} else if(stripos($agent['userAgent'], 'Android') !== false) {
			$device = 'Android';
		} else if(stripos($agent['userAgent'], 'iPhone') !== false) {
			$device = 'iPhone';
		} else {
			$device = 'browser';
		}

		if($device == 'iPhone' || $device == 'Android' || $device == 'webapp') {

			$statistics_1_count = DB::table('statistics') 
					->select(DB::raw('count(*) as cnt'))
					->where('ip', $_SERVER['REMOTE_ADDR'])
					->where('access_type', 'MOBILE')
					->where('reg_date', date("Y-m-d"))
					->first();

			if($statistics_1_count->cnt <= 0) {

				DB::table('statistics')->insert(
					[
						'access_type' => 'MOBILE',
						'ip' => $_SERVER['REMOTE_ADDR'],
						'reg_date' => date("Y-m-d"),
						'reg_time' => date("H:i:s"),
						'out_url'  => request()->headers->get('referer'),
					]
				);

			}

		} else {

			$statistics_1_count = DB::table('statistics') 
					->select(DB::raw('count(*) as cnt'))
					->where('ip', $_SERVER['REMOTE_ADDR'])
					->where('access_type', 'PC')
					->where('reg_date', date("Y-m-d"))
					->first();

			if($statistics_1_count->cnt <= 0) {

				DB::table('statistics')->insert(
					[
						'access_type' => 'PC',
						'ip' => $_SERVER['REMOTE_ADDR'],
						'reg_date' => date("Y-m-d"),
						'reg_time' => date("H:i:s"),
						'out_url'  => request()->headers->get('referer'),
					]
				);

			}

		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		// $totalQuery->where('board_type', $boardType);
        // $totalQuery->where(function($query_set) {
        //         $query_set->where('top_type', 'Y')
        //         ->orWhere('top_type', null);
        // });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		$totalCount = $totalQuery->get()->count();

		$paging_view = $paging->paging($totalCount, $thisPage, "page");

		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$people_cnt = DB::table('statistics') 
                    ->select(DB::raw('count(*) as cnt'))
					->first();

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
		$return_list['people_cnt'] = $people_cnt;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		// print_r($main_set);
		
		return view('/index', $return_list); 
		// return view('/index'); 
	}

	public function comment_action(Request $request) {

        $board_set = DB::table('board') 
            ->select(DB::raw('*'))
            ->get();

		DB::table('board')->insert(
			[
				'tel' => $request->tel,
				'address' => '('.$request->address1.')'.$request->address2." ".$request->address3,
				'etc' => $request->etc,
				'contents' => $request->contents,
				'tel' => $request->tel,
				'ip_addr' => request()->ip(),
				'board_type' => "armycenter",
				'use_status' => "Y",
				'writer' => $request->writer,
				'reg_date' => \Carbon\Carbon::now(),
			]
		);
		
		echo "<script>alert('응원메시지 작성이 완료됐습니다.');location.href='/';</script>";
	}


}