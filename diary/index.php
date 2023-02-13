<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>일기장</title>
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
    <div id="index-wrap">
        <main id="main">
            <div class="board">
                <div class="title">
                    <div class="title-gap">
                        <div class="title-wrap">
                            <p>일기장</p>
                            <span class="info">임시 일기장 페이지</span>
                        </div>
                    </div>
                    <div id="select">
                        <div class="select-gap">
                            <ul class="select-wrap">
                                <li class="board taptap">
                                    게시판
                                </li>
                                <li class="diary taptap on">
                                    일기장
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer">
        </footer>
    </div>
    <script src="../js/board.js"></script>
</body>
</html>