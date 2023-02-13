<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/meta.php'; ?>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/header.php'; ?>
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
        <?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/footer.php'; ?>        
    </div>
    <script src="<?=MYDIR?>/assets/js/board.js"></script>
</body>
</html>