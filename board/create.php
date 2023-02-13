<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>
<?php

// 저장데이터 변수 이용하기
//date_default_timezone_set('Asia/Seoul');
//$date = new DateTime();
//$date_result = $date->format('Y-m-d');

$today = date('Y-m-d');

$nickname = (isset($_POST['nickname'])) ? $_POST['nickname'] : "";
$title    = (isset($_POST['title']))    ? $_POST['title'] : "";
$contents = (isset($_POST['contents'])) ? $_POST['contents'] : "";

//2.테이블에 저장하기
$sql = "INSERT INTO board_practice(nickname, title, contents, today)
VALUE('$nickname', '$title', '$contents', '$today')";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);

//2-2.테이블에 저장데이터 확인하기
if(!$result){
    die('테이블에 데이터 입력 실패');
}
else{
    echo "
          <script>
            location.href='/bug41/index.php';
          </script>
          ";
}

#include_once('./footer.php');

?>