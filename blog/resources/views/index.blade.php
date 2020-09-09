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
                <img class="dpIB" src="/img/logo.png" alt="">
                <p class="dpIB">제72주년 국군의 날 캠페인</p>
            </div>
            <div class="people">
                <p>대한민국 국방부와 <b class="c_blue"><span>1,234</span>명</b>이 함께하고 있어요!</p>
            </div>
        </div>
        <div id="section">
            <div class="sec sec1">
                <div class="sec_bg">
                    <img src="/img/sec1_bg.png" alt="">
                </div>
                <div class="sec_title transXY">
                    <img src="/img/sec1_title.png" alt="">
                </div>
            </div>
            <div class="sec sec2">
                <div class="sec_bg">
                    <img src="/img/sec2_bg.png" alt="">
                </div>
                <div class="sec_title transXY">
                    <img src="/img/sec2_title.png" alt="">
                </div>
            </div>
            <div class="sec sec3">
                <div class="sec_bg">
                    <img src="/img/sec3_bg.png" alt="">
                </div>
                <div class="sec_title">
                    <img src="/img/sec3_title.png" alt="">
                </div>
                <div class="sec_sub transXY">
                    <div class="dDay">
                        <p class="how_many">D-<span>35</span>day<br><span class="org">현재까지</span></p>
                        <div class="people2">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>8</span>
                            <p>명</p>
                        </div>
                    </div>
                    <div class="grid">
                        <img src="/img/sec3_sub1.png" alt="">
                    </div>
                    <div class="grid grid_big">
                        <img src="/img/sec3_sub3.png" alt="">
                    </div>
                    <div class="grid">
                        <img src="/img/sec3_sub2.png" alt="">
                    </div>
                    <div class="grid">
                        <img src="/img/sec3_sub4.png" alt="">
                    </div>
                    <div class="grid">
                        <img src="/img/sec3_sub5.png" alt="">
                    </div>
                </div>
            </div>
            <div class="sec sec4">
                <div class="sec_bg">
                    <img src="/img/sec4_bg.png" alt="">
                </div>
                <div class="sec_sub transXY">
                    <img src="/img/sec4_sub1.png" alt="">
                </div>
            </div>
            <div class="sec sec5">
                <div class="sec_bg">
                    <img src="/img/sec5_bg.png" alt="">
                </div>
                <div class="sec_title transX">
                    <img src="/img/sec5_title.png" alt="">
                </div>
                <div class="sec_sub transX">
                    <img src="/img/sec5_sub1.png" alt="">
                    <img class="mt20" src="/img/sec5_sub2.png" alt="">
                </div>
                <div class="contact_outer transX">
                    <p class="all_cnt">총 <span class="org">12345</span>개의 응원메시지가 있습니다.</p>
                    <div class="form_outer">
                        <form action="">
                            <div class="line_outer">
                                <textarea name="" placeholder="마음까지 따뜻해지는 응원의 한마디를 남겨주세요!"></textarea>
                            </div>
                            <div class="line_outer">
                                <input type="text" name="" placeholder="이름을 입력해주세요">
                                <input type="text" name="" placeholder="연략처를 입력해주세요 (-제외)">
                            </div>
                            <div class="line_outer">
                                <input type="text" name="" placeholder="우편번호"  onclick="sample4_execDaumPostcode();">
                                <input type="text" name="" placeholder="주소">
                                <input type="text" name="" placeholder="상세주소입력">
                            </div>
                            <div class="line_outer">
                                <div class="">
                                    <select name="" id=""></select>
                                    <div class="input_check">
                                        <p><label><input type="checkbox" required>개인정보 수집/이용에 동의합니다 </label><span id="see_tr01">[약관보기]</span></p>
                                        <p><label><input type="checkbox" required>개인정보 취급/위탁에 동의합니다 </label><span id="see_tr02">[약관보기]</span></p>
                                    </div>
                                </div>
                                <input type="submit">
                            </div>
                        </form>
                    </div>
                    <ul class="list_outer">
                        <li>
                            <div class="top">
                                <span>따뜻한 응원러&nbsp;&nbsp;|</span>
                                <span>2020.01.01</span>
                            </div>
                            <div class="bot">
                                <p>asdfasdfasdf</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="footer">
            <img class="mo_none" src="/img/footer_img01.png" alt="">
            <img class="mo_block" src="/img/m_footer_img01.png" alt="">
            <p class="mo_none">함께 달려요 1001 운영본부 TEL : 070-4808-3890&nbsp;&nbsp;|&nbsp;&nbsp;E-mail : runtogether1001@gmail.com</p>
            <p class="mo_block">함께 달려요 1001 운영본부 TEL : 070-4808-3890<br>E-mail : runtogether1001@gmail.com</p>
            <p>COPYRIGHT (C) 2020 RUNTOGETHER1001 ALL RIGHT RESERVED.</p>
        </div>
    </div>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        AOS.init();
        window.addEventListener('load', AOS.refresh);


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