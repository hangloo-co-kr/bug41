<?php
include_once('./header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>가입 페이지</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/lib/jquery-1.12.3.js"></script>
</head>
<body>
    <header id="header">
        <div class="personal">
            <div class="personal-gap">
                <ul class="personal-wrap">
                    <li class='gaib-page-btn'>
                        <a href="/gab/content/gaib.php">회원가입</a>
                    </li>
                    <li class='login-page-btn'>
                        <a href="/gab/content/login.php">로그인</a>
                    </li>
                    <li>
                        <a href="/gab">내 정보</a>
                    </li>                
                </ul>
            </div>
        </div>
    </header>
    <div id="gaib-wrap">
        <div class="title">
            <div class="title-gap">
                <div class="title-wrap">
                    <p>회원 가입</p>
                    <span class="info">정보를 입력해 주세요!</span>
                </div>
            </div>
        </div>
        <div id="gaib">
            <div class="gaib-gap"> 
                <div class="gaib-wrap">
                    <!-- <form id="member" autoComplete='off' name="member" method="post" action="gaib_form.php"> -->
                        <ul class="member-table">
                            <li>
                                <div class="labels">
                                    아이디
                                </div>
                                <div class="inputs">
                                    <input 
                                    type="text" 
                                    id="inputId" 
                                    name="inputId" 
                                    placeholder="6자 이상의 영문 혹은 영문과 숫자를 조합" 
                                    maxLength="20"
                                    autocomplete="off"
                                    required
                                    />
                                    <div class="guiding">
                                        <p>6자 이상의 영문 혹은 영문과 숫자를 조합</p>
                                        <p>중복 확인</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="labels">
                                    비밀번호
                                </div>
                                <div class="inputs">
                                    <input 
                                    required
                                    type="text" 
                                    id="inputPassword" 
                                    name="inputPassword" 
                                    placeholder="비밀번호를 입력해 주세요" 
                                    maxLength="20"
                                    autocomplete="off"
                                    />
                                </div>
                            </li>
                            <li>
                                <div class="labels">
                                    닉네임
                                </div>
                                <div class="inputs">
                                    <input 
                                    required
                                    type="text" 
                                    id="inputName" 
                                    name="inputName" 
                                    placeholder="닉네임을 입력해 주세요" 
                                    maxLength="20"
                                    autocomplete="off"
                                    />
                                </div>
                            </li>
                            <li>
                                <button type="submit" class="gaib-btn">가입하기</button>
                            </li>
                        </ul>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
<script src="../js/board.js"></script>
</body>
</html>


<?php
include_once('./footer.php');
?>