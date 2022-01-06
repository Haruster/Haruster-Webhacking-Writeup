<?php
highlight_FILE(__FILE__);
require_once("dbcon.php");

$id = $_GET['id'];
$pw = $_GET['pw'];
$pw = hash('sha256',$pw);

$sql = "select * from jhyeonuser where binary id='$id' and pw='$pw'";
$result = mysqli_fetch_array(mysqli_query($db,$sql));

if($result['id']){
        $_SESSION['id'] = $result['id'];
        mysqli_close($db);
        header("Location:welcome.php");
}
?>
