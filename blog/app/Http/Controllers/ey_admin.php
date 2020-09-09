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

class Ey_admin extends Controller
{
	public function file_upload(Request $request) {

		if($request->upfiles) {
			$file = $request->upfiles->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./sample/editor/html/popular/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		$response = new \StdClass;
		//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
		$response->link = "/sample/editor/html/popular/" . $file_array[1];
		echo stripslashes(json_encode($response));
	}
	
	public function ey_login(Request $request) {

		return view('ey_login'); 

	}

	public function change_main_set(Request $request) {

			if($request->learning1) {
				$file = $request->learning1->store('images');
				$file_array = explode("/", $file);
				copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
			} else {
				$file_array[1] = null;
			}

			if($request->learning2) {
				$file = $request->learning2->store('images');
				$file_array2 = explode("/", $file);
				copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
			} else {
				$file_array2[1] = null;
			}

			if($request->learning3) {
				$file = $request->learning3->store('images');
				$file_array3 = explode("/", $file);
				copy("../storage/app/images/".$file_array3[1], "./storage/app/images/".$file_array3[1]);
			} else {
				$file_array3[1] = null;
			}

			if($request->learning4) {
				$file = $request->learning4->store('images');
				$file_array4 = explode("/", $file);
				copy("../storage/app/images/".$file_array4[1], "./storage/app/images/".$file_array4[1]);
			} else {
				$file_array4[1] = null;
			}

			if($request->learning5) {
				$file = $request->learning5->store('images');
				$file_array5 = explode("/", $file);
				copy("../storage/app/images/".$file_array5[1], "./storage/app/images/".$file_array5[1]);
			} else {
				$file_array5[1] = null;
			}

			DB::table('main_data_control')->update(
				[
					'people_cnt' => $request->people_cnt,
					'd_day' => $request->d_day,
					'km_set' => $request->km_set,
					'learning1' => $file_array[1],
					'learning2' => $file_array2[1],
					'learning3' => $file_array3[1],
					'learning4' => $file_array4[1],
					'learning5' => $file_array5[1],
				]
			);

		echo "<script>alert('수정됐습니다.');location.href='/ey_admin/main_set';</script>";
		exit;
    }

	public function ey_login_action(Request $request) {
		
		$member_infom_count = DB::table('admin_member') 
				->select(DB::raw('*'))
				->where('user_id', $request->id)
				->get()->count();		
		
		if($member_infom_count > 0) {
			
			$member_infom = DB::table('admin_member') 
					->select(DB::raw('*'))
					->where('user_id', $request->id)
					->first();

			if (Hash::check($request->pw, $member_infom->passwd)) {

				session(['user_id' => $request->id]);

				echo "<script>alert('로그인되었습니다.');location.href='/ey_admin/main_set';</script>";
			} else {
				echo "<script>alert('비밀번호가 잘못되었습니다.');location.href='/ey_admin/login';</script>";
			}
			
		} else {
			echo "<script>alert('등록되어 있지 않은 아이디입니다.');location.href='/ey_admin/login';</script>";
		}
		
	}

	public function ey_control(Request $request) {
		DB::table('board')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_control2(Request $request) {
		DB::table('poplayer')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_control_file(Request $request) {
		DB::table('file_list')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_logout(Request $request) {
		$request->session()->flush();
		echo "<script>alert('로그아웃 되었습니다.');location.href='/ey_admin/login';</script>";
	}

	public function data_modify(Request $request) {

		DB::table('board')->where('idx', $request->idx)->update(
			[
				'use_status' => $request->use_status
			]
		);
		
		echo $request->use_status;
	}

	public function write_board_form(Request $request) {

		if(request()->segment(4) == "modify") {

			$board_inform = DB::table('board') 
						->select(DB::raw('*'))
						//->where('board_type', $request->board_type)
						->where('idx', $request->board_idx)
						->first();			

			$return_list['data'] = $board_inform;

			if(request()->segment(2) == 'beds') {

				$board_inform2 = DB::table('file_list') 
							->select(DB::raw('*'))
							//->where('board_type', $request->board_type)
							->where('board_idx', $request->board_idx)
							->where('sub_main_status', 'N')
							->get();

				$return_list['data2'] = $board_inform2;

				$board_inform2 = DB::table('file_list') 
							->select(DB::raw('*'))
							//->where('board_type', $request->board_type)
							->where('board_idx', $request->board_idx)
							->where('sub_main_status', 'Y')
							->get();

				$return_list['data3'] = $board_inform2;

			}

			return view('ey_modify_board', $return_list);

		} else {

			return view('ey_write_board');

		}

	}

	public function image_upload_action(Request $request) {

		if($request->upload) {
			$file = $request->upload->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}
		
		/*
		{"uploaded" : 1, "fileName" : "test.jpg", "url" : "/img/test.jpg"}
		JsonObject json = new JsonObject();
		json.addProperty("uploaded", 1);
		json.addProperty("fileName", fileName);
		json.addProperty("url", fileUrl);[출처] CKEditor를 이용해서 이미지 업로드하기|작성자 Junesker
		*/


		$array['uploaded'] = 1;
		$array['fileName'] = $file_array[1];
		$array['url'] = "/storage/app/images/".$file_array[1];

		echo json_encode($array);

		//echo "/storage/app/images/".$file_array[1];
		//echo "<script> window.parent.CKEDITOR.tools.callFunction(".$_GET['CKEditorFuncNum'].", '/storage/app/images/".$file_array[1]."', '');</script>;";

		/*
		if ($_FILES["upload"]["size"] > 0 ){

			// 현재시간 추출
			$date_filedir = date("YmdHis");

			//오리지널 파일 이름.확장자
			$ext = substr(strrchr($_FILES["upload"]["name"],"."),1);
			//$ext : 확장자를 저장하는 변수
			// strrchr(): . 이후의 문자열을 return, substr(): 두 번째 문자에서 끝까지 return
			//즉 확장자만 return시킨다.
			$ext = strtolower($ext); //소문자로 바꾼다.
			$savefilename = $date_filedir."_".str_replace(" ", "_", $_FILES["upload"]["name"]);

			//$savefilename : 날짜를 덧붙여서 파일 이름을 만든다.
			//str_replace(): 파일명에 " "공백이 있으면 "_"로 대치한다.

			$uploadpath = $_SERVER['DOCUMENT_ROOT']."/upload/images";//이거 안 됨.
			$uploadpath = "./images/";
			//$uploadpath :  upload.php가 있는 폴더를 기준으로 이미지가 저장 될 폴더를 지정한다.
			//즉 upload.php가 upload 폴더 안에 있다면 upload/안에 images폴더를 만들면 된다.

			$uploadsrc = $_SERVER['HTTP_HOST']."/upload/images/";
			//내 호스트(즉 root 디렉토리)아래에 이미지가 저장될 "/upload/images/"가 있어야 한다.

			$http='http'.((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?'s':'').'://';
			//$_SERVER['HTTPS']의 값이 on인지 아닌지에 따라 https:// 또는 http://가 된다.
			//CKEditor에서는 이미지를 호출할 때 url을 http(또는 https)부분부터 표기해야 한다.

			//php 파일 업로드 하는 부분
			if($ext=="jpg" or $ext=="gif" or $ext =="png"){

				if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath.iconv("UTF-8","EUC-KR",$savefilename))){
				//move_uploaded_file( $_FILES['upload']['tmp_name'], 저장 경로+파일명) : 업로드 파일을 저장 경로로 옮긴다.
				//iconv(기존셋, 바꿀셋, 바꿀 문자열) : 문자셋을 바꾸어준다.(호스트에 따라 한글이 안 될 수도 있다.)
					$uploadfile = $savefilename;
					echo "<script>alert('업로드성공: ".$savefilename."');</script>;";//성공 메세지 출력.
				}//move_upload_file() if문 닫기

			}else{
				echo "<script>alert('jpg, gif, png파일만 업로드 가능함.');</script>;";
			} //확장자확인 if문 닫기

		}else{

			exit;

		}
		*/

		//echo "<script> window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '".$http.$uploadsrc."$uploadfile');</script>;";
		
	}

	public function write_board_action(Request $request) {

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)
					//->where('idx', $request->board_idx)
					->get()
					->count();

		$answer_infom = DB::table('board')
					->select(DB::raw('*, board.grp as grp_now, board.prino as prino_now, board.parno as parno_now'))
					//->where('board_type', $request->board_type)
					->orderBy('priority', 'asc')
					->first();

		$reply_answer_infom = DB::table('board') 
					->select(DB::raw('depth, grp, prino, parno'))
					//->where('board_type', $request->board_type)
					->where('idx', $request->board_idx)
					->first();

		if($board_cnt <= 0) {
			$parno_now = 0;
			$prino_now = 0;
			$depth_now = 1;
			$grp_now = 1;
		} else {
			$parno_now = $request->board_idx;
			$prino_now = $answer_infom->prino_now + 1;
			$depth_now = $answer_infom->depth;
			$grp_now = $answer_infom->grp_now + 1;
		}
		
		if($request->write_type == "reply") {
			$parno_now = $request->board_idx;
			$prino_now = $reply_answer_infom->prino + 1;
			$depth_now = $reply_answer_infom->depth + 1;
			$grp_now = $reply_answer_infom->grp;			
		}


		if(request()->segment(2) == "label" || request()->segment(2) == "section" || request()->segment(2) == "pouch" || request()->segment(2) == "inquiry" || request()->segment(2) == "notice" || request()->segment(2) == "equipment" || request()->segment(2) == "sale_label" || request()->segment(2) == "sale_pouch") {

			if($request->write_type == "modify") {
				
				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($request->writer_file_mobile) {
					$file = $request->writer_file_mobile->store('images');
					$file_array2 = explode("/", $file);
					copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
				} else {
					$file_array2[1] = null;
				}

				if($file_array[1] != null) {
					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'category2' => $request->category2,
							'corp_name' => $request->corp_name,
							'manager_name' => $request->manager_name,
							'passwd' => $request->passwd,
							'tel' => $request->tel,
							'email' => $request->email,
							'product_name' => $request->product_name,
							'material_name' => $request->material_name,
							'size' => $request->size,
							'type_set' => $request->type_set,
							'etc' => $request->etc,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'attach_file' => $file_array[1],
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				} else {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'category2' => $request->category2,
							'corp_name' => $request->corp_name,
							'manager_name' => $request->manager_name,
							'passwd' => $request->passwd,
							'tel' => $request->tel,
							'email' => $request->email,
							'product_name' => $request->product_name,
							'material_name' => $request->material_name,
							'size' => $request->size,
							'type_set' => $request->type_set,
							'etc' => $request->etc,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				}
				
				if($file_array2[1] != null) {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'attach_file2' => $file_array2[1],
						]
					);

				}

				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			} else {

				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($request->writer_file_mobile) {
					$file = $request->writer_file_mobile->store('images');
					$file_array2 = explode("/", $file);
					copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
				} else {
					$file_array2[1] = null;
				}

				DB::table('board')->insert(
					[
						'subject' => $request->subject,
						'contents' => $request->contents,
						'category' => $request->category,
						'category2' => $request->category2,
						'corp_name' => $request->corp_name,
						'manager_name' => $request->manager_name,
						'passwd' => $request->passwd,
						'tel' => $request->tel,
						'email' => $request->email,
						'product_name' => $request->product_name,
						'material_name' => $request->material_name,
						'size' => $request->size,
						'type_set' => $request->type_set,
						'etc' => $request->etc,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'attach_file' => $file_array[1],
						'attach_file2' => $file_array2[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'start_period' => $request->start_period,
						'end_period' => $request->end_period,
						'use_status' => $request->use_status,
						'priority' => $request->priority,
						'link_value' => $request->link_value,
						'reg_date' => \Carbon\Carbon::now(),
						'top_type'  => $request->top_type,
					]
				);
			
				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			}

		}
	}

	public function main_set(Request $request) {

		$main_data_inform = DB::table('main_data_control') 
					->select(DB::raw('*'))
					->first();		

		$return_list['data'] = $main_data_inform;
		return view("main_set", $return_list);
    }
    
    public function ey_board_list(Request $request) {

		if(request()->segment(2) != "main_set") {
			$boardType = "armycenter";
		} else {
			$boardType = "armycenter";
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

		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view("ey_board_list", $return_list);

    }
    
}