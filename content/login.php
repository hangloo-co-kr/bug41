<?php
include_once('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
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
    <div id="login">
        <div class="login-gap">
            <div class="login-wrap">
                <!-- <form name='login_form' id='loginForm' method='post' autoComplete='off'> -->
                    <ul>
                        <li>
                            <input 
                            type="text" 
                            name='id'
                            id='id'
                            placeholder='아이디를 입력해 주세요' 
                            />
                        </li>
                        <li>
                            <input 
                            type="password" 
                            name='pw' 
                            id='pw'
                            placeholder='비밀번호를 입력해 주세요' 
                            />
                        </li>
                        <li>
                            <button class='login-btn' type='button'>로그인</button>
                        </li>
                        <li>
                            <button class='gaib-btn' type='button'>회원가입</button>
                        </li>
                    </ul>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <script src="../js/board.js"></script>
</body>
</html>

<?php
include_once('./footer.php');
?>