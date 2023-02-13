<?PHP
	include_once('./header.php');
	
	$mynumber = $_GET['mynumber'];
    $sql = "DELETE FROM board_practice
    WHERE idx='".$mynumber."'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die('삭제 실패');
    }
    else{
        echo "<script>
        location.href='/gab/index.php';
        </script>";
    }

    include_once('./footer.php');
?>