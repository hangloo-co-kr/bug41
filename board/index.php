<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>

<?php
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/meta.php'; ?>
<body>
    <?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/template/header.php'; ?>
    <div id="index-wrap">
        <main id="main">
            <div class="board">
                <div class="title">
                    <div class="title-gap">
                        <div class="title-wrap">
                            <p>자유 게시판</p>
                            <span class="info">게시 글 목록을 확인할 수 있습니다!</span>
                        </div>
                    </div>
                    <div id="select">
                        <div class="select-gap">
                            <ul class="select-wrap">
                                <li class="board taptap on">
                                    게시판
                                </li>
                                <li class="diary taptap">
                                    일기장
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="content-gap">
                        <table class="content-wrap">
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>작성자</th>
                                    <th>작성일자</th>
                                </tr>
                            </thead>
                            
                            <?php
                            //페이징
                            $sql2 = "SELECT * FROM board_practice";
                            $result2 = mysqli_query($conn, $sql2);                            
                            $total_record = mysqli_num_rows($result2);                            
                              
                            $list = 10; 
                            $block_cnt = 5; 
                            $block_num = ceil($page / $block_cnt); 
                            $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
                            $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...
                            
                            
                            $total_page = ceil($total_record / $list);
                            if($block_end > $total_page){ 
                                $block_end = $total_page; 
                            }
                            $total_block = ceil($total_page / $block_cnt);
                            $page_start = ($page - 1) * $list;


                            //게시판 출력
                            $sql = "SELECT * FROM board_practice order by idx desc limit $page_start, $list";
                            $result = mysqli_query($conn, $sql);
                            
                            mysqli_close($conn);

                            if( mysqli_num_rows($result) > 0 ){
                                while( $row = mysqli_fetch_array($result) ){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['idx']; ?></td>
                                        <td><a href="./read.php?mynumber=<?php echo $row['idx'];?>&page=<?php echo $page;?>"><?php echo $row['title'];?></a></td>
                                        <td><?php echo $row['nickname']; ?></td>
                                        <td><?php echo $row['today']; ?></td>
                                    </tr>
                                </tbody>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div id="search">
                    <div class="search-gap">
                        <div class="search-wrap">
                            <form action="./search.php" method="get">
                                <select name="category">
                                    <option value="title">제목</option>
                                    <option value="nickname">작성자</option>
                                    <option value="contents">내용</option>
                                </select>
                                <input type="text" name="search" size="40" autocomplete="off">
                                <button class="search-btn">검색</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="control">
                    <div class="control-gap">
                        <div class="control-wrap">
                            <div id="page_num">
                                <div class="paging">
                                <?php
                                    if($page <= 1) {
                                        echo "<span><i class='fa fa-angle-double-left'></i></span>";
                                    } else {
                                        echo "<a href='./index.php?page=1'><i class='fa fa-angle-double-left'></i></a>";
                                    }

                                    if($page <=1){
                                        echo "<span><i class='fa fa-angle-left'></i></span>";
                                    } else {
                                        $pre = $page - 1;
                                        echo "<a href='./index.php?page=$pre'><i class='fa fa-angle-left'></i></a>";
                                    }

                                    for($i=$block_start; $i<=$block_end; $i++){
                                        if($page == $i){
                                            echo "<a href='./index.php?page=$i'><b>$i</b></a>";
                                        } else {
                                            echo "<a href='./index.php?page=$i'> $i </a>";
                                        }
                                    }
                                    if($page >= $total_page){
                                        echo "<span><i class='fa fa-angle-right'></i></span>";

                                    } else {
                                        $next = $page + 1;
                                        echo "<a href='./index.php?page=$next'><i class='fa fa-angle-right'></i></a>";
                                    }
                                    if($page>=$total_page){
                                        echo "<span><i class='fa fa-angle-double-right'></i></span>";
                                    } else {
                                        $next = $page + 1;
                                        echo "<a href='./index.php?page=$total_page'><i class='fa fa-angle-double-right'></i></a>";
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="create">
                                <a href="./write.php" class="create-btn">글쓰기</a>
                            </div>
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

<?php
    #include_once('./footer.php');
?>