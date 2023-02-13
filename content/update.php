<?PHP

include_once('./header.php');

$page = $_GET['page'];
$mynumber = $_GET['mynumber'];
$nickname=$_POST['nickname'];
$title=$_POST['title'];
$contents=$_POST['contents'];

//테이블 저장
$sql = "UPDATE board_practice 
SET title='".$title."',contents='".$contents."',nickname='".$nickname."' where idx='".$mynumber."'";
$result = mysqli_query($conn, $sql);


//2-2.테이블에 저장데이터 확인하기
if(!$result){
    die('테이블에 데이터 입력 실패');
}
else{
    echo ("<script>
    location.replace('./read.php?mynumber=$mynumber&page=$page');
    </script>");
}


include_once('./footer.php');
?>