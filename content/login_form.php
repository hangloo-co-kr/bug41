<?php
include_once('./header.php');

$userId = $_POST['userId'];
$userPw = $_POST['userPw'];

$sql = "SELECT * FROM board_member";
$result = mysqli_query($conn, $sql);

if( mysqli_num_rows($result) > 0 ){
    $json_data = '';
    while($row = mysqli_fetch_array($result)){
        if( $row['user_id']==$userId && $row['user_password']==$userPw ){
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_nickname'];
            $session_id = session_id();

            $json_data = '{"ses":"'.$session_id.'", "ids":"'.$row['user_id'].'", "nam":"'.$row['user_nickname'].'"}';
        }
    }
}

echo $json_data;

include_once('./footer.php');
?>