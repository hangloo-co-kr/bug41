<?php
include_once('./header.php');


$mynumber = $_GET['mynumber']; //댓글번호
$mynumber2 = $_GET['mynumber2'];
$sql = "DELETE FROM board_reply
WHERE replyIdx='".$mynumber."'";
$result = mysqli_query($conn, $sql);


if(!$result){
    die('삭제 실패');
}
else{
    echo ("<script>
    location.replace('/gab/content/read.php?mynumber=$mynumber2');
    </script>");
}




include_once('./footer.php');
?>