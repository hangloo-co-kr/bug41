<?PHP

//1.데이터베이스 연결
$dbservername = '222.239.14.105';
$dbusername = 'rookie_user_gabin';
$dbuserpassword = 'fnzlWkd!!!';
$dbname = 'rookie_gabin';

$conn = mysqli_connect($dbservername,$dbusername,$dbuserpassword,$dbname);
mysqli_set_charset($conn, 'utf8mb4');


//1-2.데이터베이스 연결 확인
if(!$conn){
    die('데이터베이스 접속 실패');
}
?>