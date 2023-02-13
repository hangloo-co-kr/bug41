<?PHP

include_once('./header.php');

// 저장데이터 변수 이용하기
date_default_timezone_set('Asia/Seoul');
$date = new DateTime();
$date_result = $date->format('Y-m-d');
$date_result2 = $date->format('H:i:s');

$pageNum=$_GET['mynumber'];
$page=$_GET['page'];
$replyName=$_POST['replyName'];
$replyContents=$_POST['replyContents'];
$replyTime=$date_result;
$replyHour=$date_result2;

//2.테이블에 저장하기
$sql = "INSERT INTO board_reply(pageNum, replyName, replyContents, replyTime, replyTime2)
VALUE('$pageNum', '$replyName', '$replyContents', '$replyTime', '$replyHour')";

$result = mysqli_query($conn, $sql);


//2-2.테이블에 저장데이터 확인하기
if(!$result){
    die('입력 실패');
} else {
    echo "<script>
    location.replace('./read.php?mynumber=$pageNum&page=$page');
    </script>";
}


include_once('./footer.php');
?>