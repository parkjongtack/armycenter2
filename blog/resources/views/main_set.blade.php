@include('ey_header')
{{-- PC슬라이더 --}}
<div class="con_main">
    <form name="main_text_form" method="post" action="/ey_admin/change_main_set" enctype="multipart/form-data">
		{{ csrf_field() }}
        <table>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					인원수 설정 : <input type="text" id="people_cnt" name="people_cnt" value="{{ $data->people_cnt }}" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					D-day 설정 : <input type="text" id="d_day" name="d_day" value="{{ $data->d_day }}" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					KM 설정 : <input type="text" id="km_set" name="km_set" value="{{ $data->km_set }}" style="width:300px;" />
				</td>
            </tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					러닝 이미지1 : <input type="file" id="learning1" name="learning1" style="width:300px;" />
					@if($data->learning1) <a href="/storage/app/images/{{ $data->learning1 }}">[이미지보기]</a> @endif
				</td>
            </tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					러닝 이미지2 : <input type="file" id="learning2" name="learning2" style="width:300px;" />
					@if($data->learning2) <a href="/storage/app/images/{{ $data->learning2 }}">[이미지보기]</a> @endif
				</td>
            </tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					러닝 이미지3 : <input type="file" id="learning3" name="learning3" style="width:300px;" />
					@if($data->learning3) <a href="/storage/app/images/{{ $data->learning3 }}">[이미지보기]</a> @endif

				</td>
            </tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					러닝 이미지4 : <input type="file" id="learning4" name="learning4" style="width:300px;" />
					@if($data->learning4) <a href="/storage/app/images/{{ $data->learning4 }}">[이미지보기]</a> @endif
				</td>
            </tr>
			<tr>
				<td style="padding-left:20px; width:1200px;" align="left">
					러닝 이미지5 : <input type="file" id="learning5" name="learning5" style="width:300px;" />
					@if($data->learning5) <a href="/storage/app/images/{{ $data->learning5 }}">[이미지보기]</a> @endif
				</td>
            </tr>
        </table>
        <div class="create" style="padding-bottom:10px;">
			<a href="javascript:text_change_func();">등록</a>
            <!-- <a href="/ey_write_gallery">등록</a> -->
        </div>
    </form>
	<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();" style="display: none;">
		<input type="hidden" name="page" />
		<button></button>
	</form>
</div>
<script type="text/javascript">

	function text_change_func() {
		var form = document.main_text_form;
		// if(form.main_text_pc.value == "") {
		// 	alert("변경할 텍스트가 없습니다.");
		// 	return;
		// }

		// if(form.main_text_mobile.value == "") {
		// 	alert("변경할 텍스트가 없습니다.");
		// 	return;
		// }

		form.submit();
	}

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_admin/{{ request()->segment(2) }}/control',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("삭제되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					return false;
				}
			});
		}
	}

$("#d_day").datepicker({

  showOn: "both", // 버튼과 텍스트 필드 모두 캘린더를 보여준다.
  changeMonth: true, // 월을 바꿀수 있는 셀렉트 박스를 표시한다.
  changeYear: true, // 년을 바꿀 수 있는 셀렉트 박스를 표시한다.
  minDate: '-100y', // 현재날짜로부터 100년이전까지 년을 표시한다.
  nextText: '다음 달', // next 아이콘의 툴팁.
  prevText: '이전 달', // prev 아이콘의 툴팁.
  numberOfMonths: [1,1], // 한번에 얼마나 많은 월을 표시할것인가. [2,3] 일 경우, 2(행) x 3(열) = 6개의 월을 표시한다.
  stepMonths: 3, // next, prev 버튼을 클릭했을때 얼마나 많은 월을 이동하여 표시하는가. 
  yearRange: 'c-100:c+10', // 년도 선택 셀렉트박스를 현재 년도에서 이전, 이후로 얼마의 범위를 표시할것인가.
  showButtonPanel: true, // 캘린더 하단에 버튼 패널을 표시한다. 
  currentText: '오늘 날짜' , // 오늘 날짜로 이동하는 버튼 패널
  closeText: '닫기',  // 닫기 버튼 패널
  dateFormat: "yy-mm-dd", // 텍스트 필드에 입력되는 날짜 형식.
  showAnim: "slide", //애니메이션을 적용한다.
  showMonthAfterYear: true , // 월, 년순의 셀렉트 박스를 년,월 순으로 바꿔준다. 
  dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'], // 요일의 한글 형식.
  monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] // 월의 한글 형식.

});

</script>
@include('ey_footer')