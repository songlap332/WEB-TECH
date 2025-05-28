<?php
include "../model/db.php";
?>

<?php
session_start();
if(isset($_REQUEST["Submit"]))
{
 $conobj=createCon();

 $result=checkLogin($conobj,$_REQUEST["uname"],$_REQUEST["password"]);
 if(mysqli_num_rows($result) > 0)
 {
  $_SESSION["uname"]=$_REQUEST["uname"];
  header("Location: ../View/profile.php");
 }
 else
 {
  echo "No User Found";
 }
}

?>