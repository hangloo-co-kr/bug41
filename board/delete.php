<?php include '../common/config.php'; ?>
<?php include $_SERVER["DOCUMENT_ROOT"].MYDIR.'/common/include.php'; ?>
<?php
	
    $mynumber = (isset($_GET['mynumber'])) ? $_GET['mynumber'] : "";
    if(!$mynumber){
        die('삭제 실패');
    }
	
    $sql = "DELETE FROM board_practice WHERE idx='".$mynumber."'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if(!$result){
        die('삭제 실패');
    }
    else{
        echo "<script>
                location.href='/bug41/index.php';
              </script>
              ";
    }

    #include_once('./footer.php');
?>