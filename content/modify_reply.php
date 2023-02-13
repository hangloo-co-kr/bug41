<?php
include_once('./header.php');

$page = $_GET['page'];
$mynumber = $_GET['mynumber']; //댓글번호
$mynumber2 = $_GET['mynumber2'];
$replymodify=$_POST['replymodify'];

$sql = "UPDATE board_reply 
SET replyContents='".$replymodify."' where replyIdx='".$mynumber."'";

$result = mysqli_query($conn, $sql);


if(!$result){
    die('수정 실패');
}
else{
    echo ("<script>
    location.replace('/gab/content/read.php?mynumber=$mynumber2&page=$page');
    </script>");
}

include_once('./footer.php');
?>