<?php
    //1.데이터베이스 연결
    $dbservername = '';
    $dbusername = '';
    $dbuserpassword = '';
    $dbname = '';

    $conn = mysqli_connect($dbservername,$dbusername,$dbuserpassword) or die( "SQL server에 연결할 수 없습니다~~~");	
    mysqli_select_db($conn,$dbname);    
    mysqli_set_charset($conn, 'utf8mb4');

    if (mysqli_connect_errno()) {
        throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
    }
?>