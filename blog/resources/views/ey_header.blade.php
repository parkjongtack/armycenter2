@if(!session('user_id'))
	<script type="text/javascript">
		alert('로그인 해주세요.');
		location.href = '/ey_admin/login';
	</script>
@endif
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/css/ey_index.css">
        <script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/js/ey_index.js"></script>
    </head>
    <body>
        <div id="container">
            <div class="nav_space"></div>
            <div id="nav">
                <div class="logo">
                    <a href="/ey_admin/pcslider">
                        <img src="/img/logo.png" alt="로고" width="100%">
                    </a>
                </div>
                <div class="nav_title">
                    <span>ADMIN</span><a href="/ey_admin/pcslider"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="nav_con">
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>메인페이지 설정</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/ey_admin/main_set">메인 페이지</a></div>
                        <div class="nav_sub"><a href="/ey_admin/message">응원 메시지</a></div>
                    </div>
                    <!-- <div class="na_title nav_img"><i class="far fa-chart-bar"></i>통계 현황</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="#">접속 통계</a></div>
                        <div class="nav_sub"><a href="#">유입 경로</a></div>
                    </div> -->
                </div>
            </div>
            <div id="con">
                <div class="header">
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="top_nav">
                        <ul>
                            <a href="/">
                                <li>
                                    <i class="fas fa-desktop"></i>홈페이지
                                </li>
                            </a>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-sign-out-alt"></i><a href="/ey_admin/logout">로그아웃</a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="con_title">
                    <h2>
					페이지 설정
					</h2>
                    <div class="title_nav">
					@if(request()->segment(2) == 'main_set')
					메인 페이지
					@elseif(request()->segment(2) == 'message')
					응원 메시지
					@endif</div>
                </div>