@include('ey_header')
{{-- PC슬라이더 --}}
<div class="con_main">
    <form action="">
        <table>
            <colgroup>
                <col width="100">
                <col width="700">
                <col width="200">
                <col width="100">
                <col width="100">
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>내용</th>
                    <th>등록일</th>
					<th>노출여부</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
				@if($totalCount == '0')
					<tr>
						<td colspan="5">게시글이 없습니다.</td>
					</tr>
				@else
					@foreach($data as $data)
						<tr>
							<td>{{ $number-- }}</td>
							<td>{{ $data->contents }}</td>
							<td>{{ $data->reg_date }}</td>
							<td>
								<select name="use_status_{{ $data->idx }}">
									<option value="Y" @if($data->use_status == 'Y') selected @endif >사용</option>
									<option value="N" @if($data->use_status == 'N') selected @endif >중지</option>
								</select>
							</td>
							<td class="delete_box"><a href="javascript:control('{{ $data->idx }}');">삭제</a><a href="javascript:modify('{{ $data->idx }}');" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
						</tr>
					@endforeach
				@endif
            </tbody>
        </table>
        <div class="paging">
			{!! $paging_view !!}
		</div>
        {{-- <div class="create" style="padding-bottom:10px;">
			<a href="/ey_admin/{{ request()->segment(2) }}/write_board_form">등록</a>
            <!-- <a href="/ey_write_gallery">등록</a> -->
        </div> --}}
    </form>
	<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();" style="display: none;">
		<input type="hidden" name="page" />
		<!-- <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required> -->
		<button></button>
	</form>
</div>
<script type="text/javascript">

	function modify(idx) {

		if(confirm("노출여부를 수정하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append("use_status", $("select[name=use_status_"+idx+"]").val());
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_admin/data_modify',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("수정되었습니다.");
					//location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					console.log(xhr.responseText)
					return false;
				}
			});
		}
	}

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_admin/control',
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

</script>
@include('ey_footer')