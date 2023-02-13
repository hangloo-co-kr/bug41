<?php
include_once('./header.php');
$number = $_GET['mynumber'];
$page = $_GET['page'];
$sql = "SELECT * FROM board_practice where idx='".$number."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정하기 페이지 연습</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../SynapEditorPackage/SynapEditor/synapeditor.min.css">
    <script src="../js/lib/jquery-1.12.3.js"></script>
    <script src="../SynapEditorPackage/SynapEditor/synapeditor.config.js"></script>
    <script src="../SynapEditorPackage/SynapEditor/synapeditor.min.js"></script>
    <script src="../SynapEditorPackage/SynapEditor/externals/SEDocModelParser/SEDocModelParser.min.js"></script>
    <script src="../SynapEditorPackage/SynapEditor/externals/SEShapeManager/SEShapeManager.min.js"></script>
    <script>
        function initEditor() {
            var se = new SynapEditor("synapEditor", synapEditorConfig);
        }
    </script>
</head>
<body onload="initEditor();">
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
    <div id="modify-wrap">
        <div class="title">
            <div class="title-gap">
                <div class="title-wrap">
                    <p>자유 게시판</p>
                    <span class="info">글을 수정해 주세요!</span>
                </div>
            </div>
        </div>
        <div id="modify">
            <div class="modify-gap">
                <div class="modify-wrap">
                    <form autocomplete="off" action="./update.php?mynumber=<?php echo $number; ?>&page=<?php echo $page?>" method="post" name="submitForm" id="submitForm">
                        <ul class="update">
                            <li>
                                <div class="irum">제목</div>
                                <div class="writing"><textarea required name="title" id="title" class="title" placeholder="제목을 입력하세요"><?php echo $row['title']; ?></textarea></div>
                            </li>
                            <li>
                                <div class="irum">이름</div>
                                <div class="writing"><textarea required name="nickname" id="nickname" class="nickname" placeholder="작성자 이름을 입력하세요"><?php echo $row['nickname']; ?></textarea></div>
                            </li>
                            <li>
                                <div class="irum">내용</div>
                                <div class="editor-writing">
                                    <textarea required name="contents" id="synapEditor" class="contents" placeholder="내용을 입력하세요"><?php echo $row['contents']; ?></textarea>
                                </div>
                            </li>
                            <li>
                                <button type="submit" class="submit-btn">작성 완료</button>
                            </li>
                        </ul>
                    </form>
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