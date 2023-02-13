<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>
<?php

    $page       = (isset($_GET['page'])) ? $_GET['page'] : "";
    $mynumber   = (isset($_GET['mynumber'])) ? $_GET['mynumber'] : "";
    $nickname   = (isset($_POST['nickname'])) ? $_POST['nickname'] : "";
    $title      = (isset($_POST['title']))    ? $_POST['title'] : "";
    $contents   = (isset($_POST['contents'])) ? $_POST['contents'] : "";

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

    #include_once('./footer.php');
?>