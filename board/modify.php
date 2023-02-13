<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/meta.php'; ?>
<?php

$number = (isset($_GET['mynumber'])) ? $_GET['mynumber'] : "";
$page   = (isset($_GET['page'])) ? $_GET['page'] : "";

if(!$number){
    die('정상적인 접근이 아닙니다.'); // or history.go(-1); 등등
}

$sql = "SELECT * FROM board_practice where idx='".$number."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<link rel="stylesheet" href="../SynapEditorPackage/SynapEditor/synapeditor.min.css">
<script src="../SynapEditorPackage/SynapEditor/synapeditor.config.js"></script>
<script src="../SynapEditorPackage/SynapEditor/synapeditor.min.js"></script>
<script src="../SynapEditorPackage/SynapEditor/externals/SEDocModelParser/SEDocModelParser.min.js"></script>
<script src="../SynapEditorPackage/SynapEditor/externals/SEShapeManager/SEShapeManager.min.js"></script>
<script>
    function initEditor() {
        var se = new SynapEditor("synapEditor", synapEditorConfig);
    }
</script>
<body onload="initEditor();">
    <?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/header.php'; ?>
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
    <script src="<?=MYDIR?>/assets/js/board.js"></script>
</body>
</html>

<?php
    #include_once('./footer.php');
?>