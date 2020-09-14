<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

/*
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
*/

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Research extends Controller
{
    
	public function satisfication_excel_writer() {

		require_once __DIR__ . '/../Bootstrap.php';

		$helper = new Sample();
		if ($helper->isCli()) {
			$helper->log('This example should only be run from a Web Browser' . PHP_EOL);

			return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
			->setLastModifiedBy('Maarten Balliauw')
			->setTitle('Office 2007 XLSX Test Document')
			->setSubject('Office 2007 XLSX Test Document')
			->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
			->setKeywords('office 2007 openxml php')
			->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Hello')
			->setCellValue('B2', 'world!')
			->setCellValue('C1', 'Hello')
			->setCellValue('D2', 'world!');

		// Miscellaneous glyphs, UTF-8
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A4', 'Miscellaneous glyphs')
			->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;


	}

	public function research_action(Request $request) {
		
		if($request->ResearchType == "index") {
			$page_name = "메인화면";
		} else if($request->ResearchType == "tech01") {
			$page_name = "국가핵심기술(제도 소개)";
		} else if($request->ResearchType == "tech02") {
			$page_name = "국가핵심기술(보호조치 실태조사)";
		} else if($request->ResearchType == "tech03") {
			$page_name = "국가핵심기술(지정 변경 해제)";
		} else if($request->ResearchType == "tech04") {
			$page_name = "국가핵심기술(수출승인 신고)";
		} else if($request->ResearchType == "tech05") {
			$page_name = "국가핵심기술(해외인수 합병)";
		} else if($request->ResearchType == "tech06") {
			$page_name = "국가핵심기술(사전판정 사전검토)";
		} else if($request->ResearchType == "institution01") {
			$page_name = "산업기술확인제도(제도 소개)";
		} else if($request->ResearchType == "institution02") {
			$page_name = "산업기술확인제도(확인 절차)";
		} else if($request->ResearchType == "institution03") {
			$page_name = "산업기술확인제도(확인 신청)";
		} else if($request->ResearchType == "dispute01") {
			$page_name = "산업기술분쟁조정(제도 소개)";
		} else if($request->ResearchType == "dispute02") {
			$page_name = "산업기술분쟁조정(위원회 소개)";
		} else if($request->ResearchType == "dispute03") {
			$page_name = "산업기술분쟁조정(조정 신청)";
		} else if($request->ResearchType == "index") {
			$page_name = "산업보안교육(교육 소개)";
		} else if($request->ResearchType == "request_education") {
			$page_name = "산업보안교육(교육 신청)";
		} else if($request->ResearchType == "education03") {
			$page_name = "산업보안교육(이러닝 교육)";
		} else if($request->ResearchType == "happycall01") {
			$page_name = "해피콜 상담서비스(상담서비스 소개)";
		} else if($request->ResearchType == "faq") {
			$page_name = "해피콜 상담서비스(FAQ)";
		} else if($request->ResearchType == "happy_call") {
			$page_name = "해피콜 상담서비스(상담 신청)";
		} else if($request->ResearchType == "notice") {
			$page_name = "정보마당(공지사항)";
		} else if($request->ResearchType == "ey_law_data_room") {
			$page_name = "정보마당(법령정보)";
		} else if($request->ResearchType == "ey_security_data_room") {
			$page_name = "정보마당(보안서식)";
		} else if($request->ResearchType == "ey_data_room") {
			$page_name = "정보마당(자료실)";
		} else if($request->ResearchType == "ey_newsletter") {
			$page_name = "정보마당(뉴스레터)";
		}

		DB::table('research')->insert(
			[
				'select_type' => $request->ResearchSelect,
				'ip_address' => request()->ip(),
				'reg_date' => \Carbon\Carbon::now(),
				'page_type' => $request->ResearchType,
				'page_name' => $page_name,
			]
		);
		
		if($request->ResearchType == "index") {
			$location = "location.href = '/';";
		} else {
			if($request->ResearchType == "notice" || $request->ResearchType == "ey_newsletter") {
				$location = "location.href = '/".$request->ResearchType."/notice_list';";
			} else if($request->ResearchType == "ey_law_data_room" || $request->ResearchType == "ey_security_data_room" || $request->ResearchType == "ey_data_room") {
				$location = "location.href = '/".$request->ResearchType."/data_room_list';";
			}else {
				$location = "location.href = '/".$request->ResearchType."';";
			}
		}

		echo "<script>alert('설문조사가 완료되었습니다.');".$location."</script>";
		exit;

	}

	public function search_excel_down(Request $request) {

		$satisfication_data_count = DB::table('research') 
				->select(DB::raw('*'))
				->where('reg_date', '>=', $request->reg_date1)
				->where('reg_date', '<=', $request->reg_date2)
				->get()->count();
		
		if($satisfication_data_count <= 0) {
			echo "<script>alert('엑셀출력 데이터가 없습니다.');history.go(-1);</script>";
			exit;
		}

		$satisfication_data = DB::table('research') 
				->select(DB::raw('*'))
				->where('reg_date', '>=', $request->reg_date1)
				->where('reg_date', '<=', $request->reg_date2)
				->get();

		require_once '/var/www/html/blog/vendor/autoload.php';
		/*
		$datas = array(
			array('name' => '김정호', 'tel' => '010-1234-1234', 'bank' => '국민은행'),
			array('name' => '홍길동', 'tel' => '010-5678-5678', 'bank' => '한국은행')
		);
		*/

		foreach($satisfication_data as $key => $value) {

			if($value->select_type == "1") {
				$select_type = "매우미흡";
			} else if($value->select_type == "2") {
				$select_type = "미흡";
			} else if($value->select_type == "3") {
				$select_type = "보통";
			} else if($value->select_type == "4") {
				$select_type = "만족";
			} else if($value->select_type == "5") {
				$select_type = "매우만족";
			}

			$datas[$key]['satification_text'] = $select_type;
			$datas[$key]['ip_address'] = $value->ip_address;
			$datas[$key]['reg_date'] = $value->reg_date;
			$datas[$key]['page_name'] = $value->page_name;
		}

		$cells = array(
			'A' => array(15, 'satification_text', '만족도'),
			'B' => array(20, 'ip_address',  '아이피'),
			'C' => array(20, 'reg_date', '등록일'),
			'D' => array(20, 'page_name', '페이지명')
		);


		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		
		foreach ($cells as $key => $val) {
			$cellName = $key.'1';

			$sheet->getColumnDimension($key)->setWidth($val[0]);
			$sheet->getRowDimension('1')->setRowHeight(25);
			$sheet->setCellValue($cellName, $val[2]);
			$sheet->getStyle($cellName)->getFont()->setBold(true);
			$sheet->getStyle($cellName)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle($cellName)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		}
		

		for ($i = 2; $row = array_shift($datas); $i++) {
			foreach ($cells as $key => $val) {
				$sheet->setCellValue($key.$i, $row[$val[1]]);
			}
		}

		$filename = 'excel';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'.xlsx"');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');


	}

	public function research_statistics(Request $request) {
		
		if(empty($request->reg_date1)) { 
			$reg_date1 = date ("Y-m-d", strtotime("-6 day", strtotime(date("Y-m-d"))));
			$request->reg_date1 = $reg_date1;
		} else {
			$reg_date1 = $request->reg_date1;
		}
		if(empty($request->reg_date2)) {
			$reg_date2 = date ("Y-m-d");
			$request->reg_date2 = $reg_date2;
		} else {
			$reg_date2 = $request->reg_date2;
		}

		$research_list = DB::table('research')
				->select(DB::raw('page_name'))
				->groupBy('page_name')->get();

		$satisfication_array = array();
		$j = 0;
		foreach($research_list as $key => $value) {
			
			$score_1_count = DB::table('research') 
					->select(DB::raw('count(*) as cnt'))
					->where('page_name', $value->page_name)
					->where('reg_date', '>=', $reg_date1)
					->where('reg_date', '<=', $reg_date2)
					->where('select_type', 1)
					->first();

			$satisfication_array['1'][$value->page_name] = $score_1_count->cnt;

			$score_2_count = DB::table('research') 
					->select(DB::raw('count(*) as cnt'))
					->where('page_name', $value->page_name)
					->where('reg_date', '>=', $reg_date1)
					->where('reg_date', '<=', $reg_date2)
					->where('select_type', 2)
					->first();

			$satisfication_array['2'][$value->page_name] = $score_2_count->cnt;

			$score_3_count = DB::table('research') 
					->select(DB::raw('count(*) as cnt'))
					->where('page_name', $value->page_name)
					->where('reg_date', '>=', $reg_date1)
					->where('reg_date', '<=', $reg_date2)
					->where('select_type', 3)
					->first();

			$satisfication_array['3'][$value->page_name] = $score_3_count->cnt;

			$score_4_count = DB::table('research') 
					->select(DB::raw('count(*) as cnt'))
					->where('page_name', $value->page_name)
					->where('reg_date', '>=', $reg_date1)
					->where('reg_date', '<=', $reg_date2)
					->where('select_type', 4)
					->first();

			$satisfication_array['4'][$value->page_name] = $score_4_count->cnt;

			$score_5_count = DB::table('research') 
					->select(DB::raw('count(*) as cnt'))
					->where('page_name', $value->page_name)
					->where('select_type', 5)
					->first();

			$satisfication_array['5'][$value->page_name] = $score_5_count->cnt;

			$satisfication_array['6']['avg'][$value->page_name] = ($score_1_count->cnt + $score_2_count->cnt + $score_3_count->cnt + $score_4_count->cnt +  $score_5_count->cnt) / 5;
			$satisfication_array2[$j]['page_name'] = $value->page_name;

			$j++;
		}

		//print_r($satisfication_array['page_name']);
		//print_r($satisfication_array['정보마당(뉴스레터)']['3']);
		//exit;
		
		//print_r($satisfication_array2);
		/*
		//exit;
		$j = 0;
		foreach($satisfication_array as $data3) {
			print_r($satisfication_array['page_name']);
			//echo $satisfication_array[$data3[$data3['page_name'][$j]]]['1'];
			$j++;
		}
		exit;
		*/

		$return_list['reg_date3'] = $request->reg_date1;
		$return_list['reg_date1'] = $request->reg_date1;
		$return_list['reg_date2'] = $request->reg_date2;

		$return_list['i'] = 5;
		$return_list['j'] = 0;
		$return_list['data_count'] = $satisfication_array;
		$return_list['data2'] = $satisfication_array2;
		$return_list['data3'] = $satisfication_array2;
		$return_list['data4'] = $satisfication_array2;
		$return_list['data5'] = $satisfication_array2;
		$return_list['data6'] = $satisfication_array2;
		
		return view("board/research_list", $return_list);
	}

	public function research_count(Request $request) {

		if(empty($request->reg_date1)) { 
			$reg_date1 = date ("Y-m-d", strtotime("-6 day", strtotime(date("Y-m-d"))));
			$request->reg_date1 = $reg_date1;
		} else {
			$reg_date1 = $request->reg_date1;
		}
		if(empty($request->reg_date2)) {
			$reg_date2 = date ("Y-m-d");
			$request->reg_date2 = $reg_date2;
		} else {
			$reg_date2 = $request->reg_date2;
		}
		

		$reg_date1 = date ("Y-m-d", strtotime("-1 day", strtotime($reg_date1)));

		$i = 0;
		while (strtotime($reg_date1) < strtotime($reg_date2)) {
		
			$reg_date1 = date ("Y-m-d", strtotime("+1 day", strtotime($reg_date1)));

			$statistics_pc_count = DB::table('statistics') 
					->select(DB::raw('count(*) as cnt'))
					->where('access_type', 'PC')
					->where('reg_date', $reg_date1)
					->get();

			$statistics_mobile_count = DB::table('statistics') 
					->select(DB::raw('count(*) as cnt'))
					->where('access_type', 'MOBILE')
					->where('reg_date', $reg_date2)
					->get();
		

			$return_list['pc_list'][$i] = $statistics_pc_count;
			$return_list['mobile_list'][$i] = $statistics_mobile_count;

			$i++;
		}

		//if(empty($request->reg_date1)) $reg_date1 = date ("Y-m-d", strtotime("-6 day", strtotime(date("Y-m-d"))));
		//else $reg_date1 = $request->reg_date1;
		//if(empty($request->reg_date2)) $reg_date2 = date ("Y-m-d");
		//else $reg_date2 = $request->reg_date2;
//echo $request->reg_date1;
//echo $request->reg_date2;
//exit;

		$return_list['reg_date3'] = $request->reg_date1;
		$return_list['reg_date1'] = $request->reg_date1;
		$return_list['reg_date2'] = $request->reg_date2;

		return view("/statistics_connect", $return_list);
	}

}
