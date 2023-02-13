<?PHP
include_once('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시 글 확인 화면</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/lib/jquery-1.12.3.js"></script>
</head>
<body>
<?php
	$number = $_GET['mynumber'];
	$page = $_GET['page'];
	$sql = "SELECT * FROM board_practice where idx='".$number."'";
    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	//$board = $sql->fetch_array();
?>
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
<div id="board-contents">
    <div class="alltitle">
        <div class="alltitle-gap">
            <div class="alltitle-wrap">
                <p>자유 게시판</p>
                <span class="info">내용을 확인할 수 있습니다!</span>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="title">
            <div class="title-gap">
            <div class="title-wrap">
                <div class="right"><?php echo $row['title']; ?></div>
            </div>
            </div>
        </div>
        <div class="nickname">
            <div class="nickname-gap">
            <div class="nickname-wrap">
                <div class="left">작성자</div>
                <div class="right"><?php echo $row['nickname']; ?></div>
            </div>
            </div>
        </div>
        <div class="today">
            <div class="today-gap">
                <div class="today-wrap">
                    <div class="left">작성일자</div>
                    <div class="right"><?php echo $row['today']; ?></div>
                </div>
            </div>
        </div>
        <div class="contents">
            <div class="contents-gap">
            <div class="contents-wrap">
                <p><?php echo $row['contents']; ?></p>
            </div>
            </div>
        </div>
        <div id="comment">
            <div class="comment-gap">
                <div class="comment-wrap">
                    <div class="comment-read">
                        <div class="read-gap">
                                <?php
                                	$sql2 = "SELECT * FROM board_reply where pageNum='".$number."'";
                                    $result2 = mysqli_query($conn, $sql2);
                                    
                                    

                                    if( mysqli_num_rows($result2) > 0 ){
                                        while( $row2 = mysqli_fetch_array($result2) ){
                                ?>
                                    <form autocomplete="off" action="./modify_reply.php?mynumber=<?php echo $row2['replyIdx'];?>&mynumber2=<?php echo $row2['pageNum'];?>&page=<?php echo $page?>" method="post" name="submitForm" id="submitForm">
                                    <ul class="read-wrap">
                                        <li>
                                            <div class="comment-name">
                                                <?php echo $row2['replyName']; ?>
                                            </div>
                                            <div class="comment-time">
                                                <?php echo $row2['replyTime']; ?>&nbsp;&nbsp;
                                                <?php echo $row2['replyTime2']; ?>
                                            </div>
                                            <div class="comment-modify">
                                                <a href="./modify_reply.php?mynumber=<?php echo $row2['replyIdx'];?>&mynumber2=<?php echo $row2['pageNum'];?>" class="comment-modify-btn">수정</a>
                                                <a href="./delete_reply.php?mynumber=<?php echo $row2['replyIdx'];?>&mynumber2=<?php echo $row2['pageNum'];?>">삭제</a>
                                            </div>
                                        </li>
                                        <li class="comment-real-contents"><?php echo $row2['replyContents']; ?></li>
                                        <li class="reply-modify-wrap">
                                            <textarea required name="replymodify" id="replymodify" class="replymodify" placeholder="댓글을 작성해 주세요"><?php echo $row2['replyContents']; ?></textarea>
                                            <button type="submit" class="submit-btn">수정 완료</button>
                                        </li>
                                    </ul>
                                        </form>
                                <?php
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="comment-write">
                        <form autocomplete="off" action="./reply.php?mynumber=<?php echo $number; ?>&page=<?php echo $page?>" method="post" name="submitForm" id="submitForm">
                            <ul class="write-gap">
                                <li>
                                    <div class="left">
                                        닉네임
                                    </div>
                                    <div class="right">
                                    <textarea required name="replyName" id="replyName" class="replyName" placeholder="닉네임 입력"></textarea>
                                    </div>
                                </li>
                                <li>
                                    <textarea required name="replyContents" id="replyContents" class="replyContents" placeholder="댓글을 작성해 주세요"></textarea>
                                </li>
                                <li>
                                    <button type="submit" class="submit-btn">등록</button>
                                </li>

                            </ul>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="control">
        <div class="control-gap">
            <div class="control-wrap">
                <a href="../index.php?page=<?php echo $page;?>" class="list-btn">목록</a>
                <div class="control-wrap-right">
                    <a href="./modify.php?mynumber=<?php echo $number;?>&page=<?php echo $page?>" class="update-btn">수정</a>
                    <a href="./delete.php?mynumber=<?php echo $number;?>&page=<?php echo $page?>" class="delete-btn">삭제</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
<script src="../js/board.js"></script>
</html>
<?PHP
include_once('./footer.php');
?>