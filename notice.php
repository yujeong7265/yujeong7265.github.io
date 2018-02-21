<?php
	require_once("../dbconfig.php");
	$bNo = $_GET['bno'];

	session_start();
	$fuserid = $_SESSION['ses_userid'];
	$fpasswd = $_SESSION['ses_pass'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php 
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}
	
	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>한국 장학 재단</title>
    <link href='https://cdn.rawgit.com/openhiun/hangul/master/nanumbarungothic.css' rel='stylesheet' type='text/css'>
    <link href="./icon/favicon128.png" rel="icon" />
    <link rel="apple-touch-icon-precomposed" href="./icon/favicon114.png">
    <link rel="apple-touch-icon" href="./icon/favicon114.png" sizes="114x114">

    <meta name="keyword" content="국장, 국가장학금, 장학금, 학자금, 학자금대출, 한국장학재단" />
    <meta http-equiv="subject" content="한국 장학재단" />
    <meta http-equiv="title" content="한국장학재단" />
    <meta http-equiv="author" content="SEO YU JEONG" />
    <meta http-equiv="Descript-xion" content="희망을 나누는 한국 장학재단" />
    <script type="text/javascript">
        <!-- window.addEventListener("load", function() {
        setTimeout(loaded, 100);
        }, false);

        function loaded() {
            window.scrollTo(0, 1);
        }
        
        

    </script>

    <style>
        @import url(https://cdn.rawgit.com/openhiun/hangul/master/nanumbarungothic.css);
        * {
            margin: 0;
            padding: 0;
        }

        body,
        html {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        img {
            border: 0;
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            font-family: 'Nanum Barun Gothic', sans-serif;
        }

        #hd {
            background-color: #1a61af;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 150px;
            height: 46px;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: #fff;
        }

        #menu {
            background-color: #1a61af;
            width: 100%;
            height: 35px;
        }

        #menu ul {
            display: block;
            margin: 0 auto;
            width: 100%;
        }

        #menu ul li {
            margin-right: 5px;
            margin-left: 5px;
            padding-top: 6px;
        }

        #menu ul li,
        #sub_menu ul li {
            display: block;
            float: left;
        }

        #menu .this {
            color: #fff;
            font-weight: bold;
            font-size: 14px;
        }

        #menu a {
            font-size: 12px;
            color: #a7a7a7;
            text-align: center;
        }



        #sub_menu {
            height: 35px;
            display: block;
            background-color: #2179da;
        }

        #sub_menu ul {
            height: 40px;
        }

        #sub_menu li {
            display: block;
            width: 25%;
            padding-top: 10px;
        }

        #sub_menu li a {
            display: block;
            font-size: 15px;
            text-align: center;
            color: #fff;

        }

        #banner {
            clear: both;
            width: 100%;
            height: 100%;
        }

        #banner img {
            width: 100%;
        }

        #page_wrap {
            height: 100%;
        }

        .arr {
            display: block;
            margin-left: 10px;
            margin-bottom: 5px;
            color: #ce0000
        }

        .page {
            display:block;
            margin:0 auto;
            background-color:#fff;
            width:94%;
            height:auto;
            border:2px solid #b4b4b4;
            padding:3px;
            margin-bottom:10px;
        }

        .sub_title {
            margin-bottom:10px;
        }

        .txt_title {
            font-size:15px;
            color:#0e7bc0;
            font-weight:bold;
            margin-bottom:10px;
        }

        .txt {
            font-size:12px;
        }

        .txt2 {
            margin-top:10px;
        }

        .txt2:first-letter {
            font-size:20px;
        }

    </style>
    <link rel="stylesheet" href="ft.css">
    <link rel="stylesheet" href="aside.css">
</head>

<body>
    <input type="checkbox" id="ck1" class="ckbtn">
    <div id="container">
        <header id="hd">
            <label for="ck1" class="aside_open"></label>
            <a href="index.html" class="logo"><img src="./icon/logo3.png" alt=""></a>
            <div class="line"></div>
            <nav id="menu">
                <ul>
                    <li><a class="this" href="sub1.html">소득연계형</a></li>
                    <li><a href="sub2.html">학자금대출</a></li>
                    <li><a href="sub3.html">국가우수</a></li>
                    <li><a href="sub4.html">국가근로</a></li>
                    <li><a href="sub5.html">기부장학</a></li>
                    <li><a href="sub6.html">학자금뱅킹</a></li>
                </ul>
            </nav>
            <nav id="sub_menu">
                <ul>
                    <li><a href="#page1">장학금 1유형</a></li>
                    <li><a href="#page2">장학금 2유형</a></li>
                    <li><a href="#page3">다자녀 유형 </a></li>
                    <li><a href="#page4">지역인재 유형 </a></li>
                </ul>
            </nav>
        </header>
        <div id="banner">
            <img src="./icon/banner.png" alt="">
        </div>
        <section id="page">
            <h3>공지 사항</h3>
		<div id="boardView">
			<h3 id="boardTitle">
               <?php
                    echo $row['b_title']
                ?>
            </h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?php echo $row['b_id']?></span>
				<span id="boardDate">작성일: <?php echo $row['b_date']?></span>
				<span id="boardHit">조회: <?php echo $row['b_hit']?></span>
			</div>
			<div id="boardContent"><?php echo $row['b_content']?></div>
			<div class="btnSet">
				<? if($fuserid == 'admin') {	?>
					<a href="./write.php?bno=<?php echo $bNo?>">수정</a>
					<a href="./delete.php?bno=<?php echo $bNo?>">삭제</a>
				<? } ?>
				<a href="./list.php">목록</a>
			</div>
		</div>
            
        </section>
        <footer id="ft">
            <p class="copyright">COPYRIGHT ⓒ 2015 KOREA STUDENT AID FOUNDATION.<br>ALL RIGHT RESERVED.</p>
        </footer>
    </div>
    <div id="aside_wrap">
        <aside id="aside_box">
            <label for="ck1" class="aside_close"></label>
            <h2 class="aside">사이트 바로가기</h2>
            <nav id="aside_menu">
                <ul class="item1">
                    <li class="aside_title txt">공지사항</li>
                    <li><a href="notice.html">- 공지사항</a></li>
                </ul>
                <ul class="item1">
                    <li class="aside_title txt">소득연계형</li>
                    <li><a href="sub1.html">- 장학금 1유형</a></li>
                    <li><a href="sub1.html">- 장학금 2유형</a></li>
                    <li><a href="sub1.html">- 다자녀 유형</a></li>
                    <li><a href="sub1.html">- 지역인재 유형</a></li>
                </ul>
                <ul class="item">
                    <li class="aside_title txt">학자금대출</li>
                    <li><a href="sub2.html">- 취업후 상환</a></li>
                    <li><a href="sub2.html">- 일반상환</a></li>
                    <li><a href="sub2.html">- 전환대출</a></li>
                    <li><a href="sub2.html">- 농어촌 융자</a></li>
                    <li><a href="sub2.html">- WEST 프로그램</a></li>
                    <li><a href="sub2.html">- 학자금유예</a></li>
                </ul>
                <ul class="item">
                    <li class="aside_title txt">국가우수</li>
                    <li><a href="sub3.html">- 대통령과학</a></li>
                    <li><a href="sub3.html">- 대학원생지원</a></li>
                    <li><a href="sub3.html">- 인문100년</a></li>
                    <li><a href="sub3.htmlsub3.html">- 예술체육비전</a></li>
                    <li><a href="sub3.html">- 드림장학금</a></li>
                    <li><a href="sub3.html">- 국가우수(이공계)</a></li>
                    <li><a href="sub3.html">- 국가전문대 우수</a></li>
                </ul>
                <ul class="item1">
                    <li class="aside_title txt">국가근로</li>
                    <li><a href="sub4.html">- 국가교육근로</a></li>
                    <li><a href="sub4.html">- 희망사다리</a></li>
                </ul>
                <ul class="item1">
                    <li class="aside_title txt">기부장학금</li>
                    <li><a href="sub5.html">- 차세대리더육성 멘토링</a></li>
                    <li><a href="sub5.html">- 대학지식멘토링</a></li>
                    <li><a href="sub5.html">- 기부장학</a></li>
                    <li><a href="sub5.html">- 푸른등대 기부</a></li>
                </ul>
                <ul class="item1">
                    <li class="aside_title txt">학자금 뱅킹</li>
                    <li><a href="sub6.html">- 학자금대출 상환</a></li>
                    <li><a href="sub6.html">- 학자금대출 상환지원</a></li>
                    <li><a href="sub6.html">- 학자금대출 사후관리</a></li>
                </ul>
            </nav>
        </aside>
    </div>
</body>

</html>
