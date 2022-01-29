<?php
  include "../../config.php";
  if($_GET['view_source']) view_source();
?><html>
<head>
<title>Chellenge 39</title>
</head>
<body>
<?php
  $db = dbconnect();
  if($_POST['id']){
    $_POST['id'] = str_replace("\\","",$_POST['id']);
    $_POST['id'] = str_replace("'","''",$_POST['id']);
    $_POST['id'] = substr($_POST['id'],0,15);
    $result = mysqli_fetch_array(mysqli_query($db,"select 1 from member where length(id)<14 and id='{$_POST['id']}"));
    if($result[0] == 1){
      solve(39);
    }
  }
?>
<form method=post action=index.php>
<input type=text name=id maxlength=15 size=30>
<input type=submit>
</form>
<a href=?view_source=1>view-source</a>
</body>
</html>
