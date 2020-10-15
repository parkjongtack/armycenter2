<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>국군의 날 챌린지</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/index.js"></script>
</head>
<body>
    <div id="container">
        <div id="header">
            <div class="logo_outer">
                <img class="dpIB mo_block" src="/img/logo.png" alt="">
                <p class="dpIB mo_none">제72주년 국군의 날 챌린지</p>
            </div>
            <div class="people">
                <p class="mo_none"><span></span>누적 방문자 수는 <b class="c_blue"><span>{{ $people_cnt->cnt }}</span>명</b>이며, 누적 참여자 수는 <b class="c_blue">{{ number_format($board_count_set->cnt) }}명</b>입니다!</p>
                <p class="mo_block">제72주년 국군의 날 챌린지<br>누적 방문자 수는 <b class="c_blue"><span>{{ $people_cnt->cnt }}</span>명</b>이며,<br>누적 참여자 수는 <b class="c_blue">{{ number_format($board_count_set->cnt) }}명</b>입니다!</p>
                <p>대한민국 국방부와 <b class="c_blue"><span>{{ $main_set->people_cnt }}</span>명</b>이 함께하고 있어요!</p>
            </div>
        </div>
        <div id="section">
            <div class="sec sec1">
                <div class="sec_bg">
                    <img class="mo_none" src="/img/sec1_bg.png" alt="">
                    <img class="mo_block" src="/img/m_sec1_bg.png" alt="">
                </div>
                <div class="sec_title transXY">
                    <img class="mo_none" src="/img/sec1_title.png" alt="">
                </div>
            </div>
            <div class="sec sec2">
                <div class="sec_bg">
                    <img class="mo_none" src="/img/sec2_bg.png" alt="">
                    <img class="mo_block" src="/img/m_sec2_bg.png" alt="">
                </div>
                <div class="sec_title transXY">
                    <img class="mo_none" src="/img/sec2_title.png" alt="">
                </div>
            </div>
            <div class="sec sec3">
                <div class="sec_bg">
                    <img class="mo_none" src="/img/sec3_bg.png" alt="">
                    <img class="mo_block" src="/img/m_sec3_bg.png" alt="">
                </div>
                <div class="sec_sub transXY">
                    <div class="dDay">
                        <p class="how_many">D-<span>{{ $goal_day }}</span>day<span class="org" style="display: block">현재까지</span></p>
                        <p class="how_many">D-<span>35</span>day<br><span class="org">현재까지</span></p>
                        <div class="people2">
                            <span>{{ substr($main_set->people_cnt,0 ,1 ) }}</span>
                            <span>{{ substr($main_set->people_cnt,1 ,1 ) }}</span>
                            <span>{{ substr($main_set->people_cnt,2 ,1 ) }}</span>
                            <span>{{ substr($main_set->people_cnt,3 ,1 ) }}</span>
                            <p>명</p>
                        </div>
                    </div>
                    <div class="grid mo_none">
                        <img class="mo_none" src="/storage/app/images/{{ $main_set->learning1 }}" alt="">
                    </div>
                    <div class="grid mo_none grid_big">
                        <img class="mo_none" src="/storage/app/images/{{ $main_set->learning3 }}" alt="">
                    </div>
                    <div class="grid mo_none">
                        <img class="mo_none" src="/storage/app/images/{{ $main_set->learning2 }}" alt="">
                    </div>
                    <div class="grid mo_none">
                        <img class="mo_none" src="/storage/app/images/{{ $main_set->learning4 }}" alt="">
                    </div>
                    <div class="grid mo_none">
                        <img class="mo_none" src="/storage/app/images/{{ $main_set->learning5 }}" alt="">
                    </div>
                    <div class="mo_block grid_outer">
                        <div class="grid grid_big">
                            <img class="" src="/storage/app/images/{{ $main_set->learning3 }}" alt="">
                        </div>
                        <div class="grid mo_none">
                            <img class="" src="/storage/app/images/{{ $main_set->learning1 }}" alt="">
                        </div>
                        <div class="grid mo_none">
                            <img class="" src="/storage/app/images/{{ $main_set->learning2 }}" alt="">
                        </div>
                        <div class="grid mo_none">
                            <img class="" src="/storage/app/images/{{ $main_set->learning4 }}" alt="">
                        </div>
                        <div class="grid mo_none">
                            <img class="" src="/storage/app/images/{{ $main_set->learning5 }}" alt="">
                        </div>
                    </div>
                    <div class="grid">
                        <img src="/storage/app/images/{{ $main_set->learning1 }}" alt="">
                    </div>
                    <div class="grid grid_big">
                        <img src="/storage/app/images/{{ $main_set->learning3 }}" alt="">
                    </div>
                    <div class="grid">
                        <img src="/storage/app/images/{{ $main_set->learning2 }}" alt="">
                    </div>
                    <div class="grid">
                        <img src="/storage/app/images/{{ $main_set->learning4 }}" alt="">
                    </div>
                    <div class="grid">
                        <img src="/storage/app/images/{{ $main_set->learning5 }}" alt="">
                    </div>
                </div>
            </div>
            <div class="sec sec4">
                <div class="sec_bg">
                    <img class="mo_none" src="/img/sec4_bg.png" alt="">
                    <img class="mo_block" src="/img/m_sec4_bg.png" alt="">
                </div>
                <div class="sec_sub transXY">
                    <img class="mo_none" src="/img/sec4_sub1.png" alt="">
                </div>
            </div>
            <div class="sec sec5">
                <div class="sec_bg">
                    <img class="mo_none" src="/img/sec5_bg.png" alt="">
                    <img class="mo_block" src="/img/m_sec5_bg.png" alt="">
                </div>
                <div class="sec_title transX">
                    <img class="mo_none" src="/img/sec5_title.png" alt="">
                </div>
                <div class="sec_sub transX">
                    <img class="mo_none" src="/img/sec5_sub1.png" alt="">
                    <img class="mt20 mo_none" src="/img/sec5_sub2.png" alt="">
                </div>
                <div class="contact_outer transX">
                    <p class="all_cnt">총 <span class="org">{{ number_format($board_count_set->cnt) }}</span>개의 응원메시지가 있습니다.</p>
                    <div class="form_outer">
                        <form action="/comment_action" name="board_write_form" method="post" enctype="multipart/form-data" onsubmit="return form_check()">
                        {{ csrf_field() }}
                            <div class="line_outer">
                                <textarea name="contents" placeholder="마음까지 따뜻해지는 응원의 한마디를 남겨주세요!"></textarea>
                            </div>
                            <div class="line_outer">
                                <input type="text" name="writer" placeholder="이름(실명)을 입력해주세요">
                                <input type="text" name="tel" placeholder="연락처를 입력해주세요 (-제외)" class="wd700">
                            </div>
                            <div class="line_outer">
                                <input type="text" name="address1" placeholder="우편번호" id="sample4_postcode" onclick="sample4_execDaumPostcode();">
                                {{-- <span class="address_img"><img src="/img/form_address" alt=""></span> --}}
                                <input type="text" name="address2" placeholder="주소" id="sample4_roadAddress" class="wd340" readonly>
                                <input type="text" name="address3" placeholder="상세주소입력" class="wd340">
                            </div>
                            <div class="line_outer">
                                <div class="select_size_outer">
                                    <select name="etc">
                                        <option value="">스파오 웜테크 사이즈를 선택해주세요</option>
                                        <option value="남 L">남 L</option>
                                        <option value="남 XL">남 XL</option>
                                        <option value="여 M">여 M</option>
                                        <option value="여 L">여 L</option>
                                    </select>
                                    <div class="input_check">
                                        <p><label><input type="checkbox" name="agree1" required>개인정보 수집/이용에 동의합니다 </label><span id="see_tr01">[약관보기]</span></p>
                                        <p><label><input type="checkbox" name="agree2" required>개인정보 취급/위탁에 동의합니다 </label><span id="see_tr02">[약관보기]</span></p>
                                    </div>
                                </div>
                                <input type="submit" value="함께 응원하기">
                            </div>
                        </form>
                    </div>
                    <ul class="list_outer">
                        @foreach($board_set as $board_set)
                        <li>
                            <div class="top">
                            <span>{{ substr($board_set->writer, 0,3) }}*{{ substr($board_set->writer, 6,50) }}&nbsp;&nbsp;|</span>
                                <span>{{ str_replace("-", ".", $board_set->reg_date) }}</span>
                            </div>
                            <div class="bot">
                                <p>{{ $board_set->contents }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- <div class="paging">
                        {!! $paging_view !!}
                    </div> --}}
                    <form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();" style="display: none;">
                        <input type="hidden" name="page" />
                        {{-- <!-- <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required> --> --}}
                        <button></button>
                    </form>
                </div>
                <div class="careful_text mo_block">
                    <p>참여해주신 내용(응원메시지, 손글씨, 영상 등)은 향후<br/>국방부의 홍보 자료로 활용될 수 있습니다.</p>
                    <p>반팔 티셔츠는 남녀공용 FREE 사이즈이며,<br/>색상은 아이보리와 네이비 중 랜덤 발송됩니다.</p>
                    <p>웜테크는 의류 브랜드<img src="/img/sec5_spao.png" alt="" style="display: inline-block;"> 의 기능성 발열내의이며,<br/>사이즈를 확인 후 정확히 기입해주세요.<br/>추후에 사이즈 변경은 불가합니다.</p>
                    <p>당첨자 발표는 기입해주신 연락처 또는 SNS를 통해<br/>개별 안내합니다.</p>
                    <p>기념품 배송을 위해 개인정보를 정확히 기입해주세요.<br/>정보 입력 누락 / 오류 시 최종 당첨에서 제외됩니다.</p>
                </div>
                <div class="sec_sub transX">
                    <img class="mo_none" src="/img/sec5_sub1.png" alt="">
                    <img class="mt20 mo_none" src="/img/sec5_sub2.png" alt="">
                </div>
                <div class="contact_outer transX">
                    <p class="all_cnt">총 <span class="org">{{ number_format($board_count_set->cnt) }}</span>개의 응원메시지가 있습니다.</p>
                    <div class="form_outer">
                        <form action="">
                            <div class="line_outer">
                                <textarea name="" placeholder="마음까지 따뜻해지는 응원의 한마디를 남겨주세요!"></textarea>
                            </div>
                            <div class="line_outer">
                                <input type="text" name="" placeholder="이름을 입력해주세요">
                                <input type="text" name="" placeholder="연략처를 입력해주세요 (-제외)" class="wd700">
                            </div>
                            <div class="line_outer">
                                <input type="text" name="" placeholder="우편번호"  onclick="sample4_execDaumPostcode();">
                                <span class="address_img"><img src="/img/form_address" alt=""></span>
                                <input type="text" name="" placeholder="주소" class="wd340">
                                <input type="text" name="" placeholder="상세주소입력" class="wd340">
                            </div>
                            <div class="line_outer">
                                <div class="select_size_outer">
                                    <select name="">
                                        <option value="">스파오 웜테크 사이즈를 선택해주세요</option>
                                    </select>
                                    <div class="input_check">
                                        <p><label><input type="checkbox" required>개인정보 수집/이용에 동의합니다 </label><span id="see_tr01">[약관보기]</span></p>
                                        <p><label><input type="checkbox" required>개인정보 취급/위탁에 동의합니다 </label><span id="see_tr02">[약관보기]</span></p>
                                    </div>
                                </div>
                                <input type="submit" value="함께 응원하기">
                            </div>
                        </form>
                    </div>
                    <ul class="list_outer">
                        @foreach($board_set as $board_set)
                        <li>
                            <div class="top">
                                <span>따뜻한 응원러&nbsp;&nbsp;|</span>
                                <span>{{ str_replace("-", ".", substr($board_set->reg_date, 0, 10)) }}</span>
                            </div>
                            <div class="bot">
                                <p>{{ $board_set->contents }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div id="footer">
            <img class="mo_none" src="/img/footer_img01.png" alt="">
            <img class="mo_block" src="/img/m_footer_img01.png" alt="">
            <p class="mo_none">관련문의 TEL : 070-4808-3890&nbsp;&nbsp;|&nbsp;&nbsp;E-mail : runtogether1001@gmail.com</p>
            <p class="mo_block">관련문의 TEL : 070-4808-3890<br>E-mail : runtogether1001@gmail.com</p>
            <p>COPYRIGHT (C) 2020 RUNTOGETHER1001 ALL RIGHT RESERVED.</p>
        </div>
    </div>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        function form_check(){

            var today = new Date();
            var open_date = new Date('2020-09-14 00:00:00');
            var year = today.getFullYear(); // 년도
            var month = today.getMonth() + 1;  // 월
            var date = today.getDate();  // 날짜

            if(open_date - today >= 0){
                alert("*9.11~9.13은 시스템 점검을 위한 가오픈 기간입니다. 가오픈 기간 내 참여해 주신 분들도 추첨 대상에 포합됩니다.");
            }
            var form = document.board_write_form;

            if(form.contents.value == "") {
				alert('메시지를 입력해주세요.');
				form.contents.focus();
				return false;
			}

            if(form.writer.value == "") {
				alert('이름(실명)을 입력해주세요.');
				form.writer.focus();
				return false;
			}

            if(form.tel.value == "") {
				alert('연락처를 입력해주세요.');
				form.tel.focus();
				return false;
			}

            if(form.address2.value == "") {
				alert('주소를 입력해주세요.');
				form.subject.focus();
				return false;
			}

            if(form.address3.value == "") {
				alert('상세주소를 입력해주세요.');
				form.subject.focus();
				return false;
			}

            if(form.etc.value == "") {
				alert('사이즈를 입력해주세요.');
				form.etc.focus();
				return false;
			}

            if(form.agree1.value == "") {
				alert('개인정보 수집/이용 동의를 체크해주세요.');
				form.agree1.focus();
				return false;
			}

            if(form.agree2.value == "") {
				alert('개인정보 취급/위탁 동의를 체크해주세요.');
				form.agree2.focus();
				return false;
			}

        }

        AOS.init();
        window.addEventListener('load', AOS.refresh);

        function page(page){		
            var f = document.search_form;
            f.page.value = page;
            f.submit();
        }

        //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
        function sample4_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var roadAddr = data.roadAddress; // 도로명 주소 변수
                    var extraRoadAddr = ''; // 참고 항목 변수

                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraRoadAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraRoadAddr !== ''){
                        extraRoadAddr = ' (' + extraRoadAddr + ')';
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('sample4_postcode').value = data.zonecode;
                    document.getElementById("sample4_roadAddress").value = roadAddr;
                    document.getElementById("sample4_jibunAddress").value = data.jibunAddress;
                    
                    // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                    if(roadAddr !== ''){
                        document.getElementById("sample4_extraAddress").value = extraRoadAddr;
                    } else {
                        document.getElementById("sample4_extraAddress").value = '';
                    }

                    var guideTextBox = document.getElementById("guide");
                    // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                    if(data.autoRoadAddress) {
                        var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                        guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                        guideTextBox.style.display = 'block';

                    } else if(data.autoJibunAddress) {
                        var expJibunAddr = data.autoJibunAddress;
                        guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                        guideTextBox.style.display = 'block';
                    } else {
                        guideTextBox.innerHTML = '';
                        guideTextBox.style.display = 'none';
                    }
                }
            }).open();
        }
    </script>
</body>
</html>