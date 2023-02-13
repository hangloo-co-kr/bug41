<?php
include_once('./header.php');

$user_id=$_POST['inputId'];
$user_password=$_POST['inputPassword'];
$user_nickname=$_POST['inputName'];

$sql = "INSERT INTO board_member(user_id, user_password, user_nickname)
VALUE('$user_id', '$user_password', '$user_nickname')";

$result = mysqli_query($conn, $sql);


//2-2.테이블에 저장데이터 확인하기
if(!$result){
    die('테이블에 데이터 입력 실패');
} else {
    echo ('성공');
}

include_once('./footer.php');
?>