<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>

<?php
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/meta.php'; ?>

<link rel="stylesheet" href="<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/synapeditor.min.css">
<link rel='stylesheet' href='<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/themes/dark-gray.css'>
<script src="<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/synapeditor.config.js"></script>
<script src="<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/synapeditor.min.js"></script>
<script src="<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/externals/SEDocModelParser/SEDocModelParser.min.js"></script>
<script src="<?=MYDIR?>/assets/SynapEditorPackage/SynapEditor/externals/SEShapeManager/SEShapeManager.min.js"></script>
<script>
    function initEditor() {
        var se = new SynapEditor("synapEditor", synapEditorConfig);
    }
</script>

<body onload="initEditor();">
    <?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/header.php'; ?>
    <div id="write-wrap">
        <div class="title">
            <div class="title-gap">
                <div class="title-wrap">
                    <p>자유 게시판</p>
                    <span class="info">글을 작성해 주세요!</span>
                </div>
            </div>
        </div>
        <div id="write">
            <div class="write-gap">
                <div class="write-wrap">
                    <form id="submitForm" name="submitForm" action="./create.php" method="post" autocomplete="off">
                        <ul class="insert">
                            <li>
                                <div class="irum">제목</div>
                                <div class="writing"><textarea required name="title" id="title" class="title" placeholder="제목을 입력하세요"></textarea></div>
                            </li>
                            <li>
                                <div class="irum">이름</div>
                                <div class="writing"><textarea required name="nickname" id="nickname" class="nickname" placeholder="작성자 이름을 입력하세요"></textarea></div>
                            </li>
                            <li>
                                <div class="irum">내용</div>
                                <div class="editor-writing">
                                    <textarea required name="contents" id="synapEditor" class="contents" placeholder="내용을 입력하세요"></textarea>
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

<?PHP
    #include_once('./footer.php');
?>