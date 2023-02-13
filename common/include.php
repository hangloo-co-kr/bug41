<?php
    //1.데이터베이스 연결
    $dbservername = '222.239.14.105';
    $dbusername = 'rookie_user_gabin';
    $dbuserpassword = 'fnzlWkd!!!';
    $dbname = 'rookie_gabin';

	$conn = mysqli_connect($dbservername,$dbusername,$dbuserpassword) or die( "SQL server에 연결할 수 없습니다~~~");	
	mysqli_select_db($conn,$dbname);
    //mysqli_query($connect,"SET NAMES 'utf8'");
    mysqli_set_charset($conn, 'utf8mb4');
    
    if (mysqli_connect_errno()) {
	    throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
	}
?>