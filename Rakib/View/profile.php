<?php
include "../Control/profile_control.php";

?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
</head> 

<body>

<h2>Profile</h2>
Hii <?php echo $_SESSION["uname"]; ?>

<?php 
echo "<br>";
 echo "Id: ".$data[0][0];
 echo "<br>";
 echo "Uname: ".$data[0][1];
 echo "<br>";
 echo "Gender: ".$data[0][2];
 echo "<br>";
 echo "File: ".$data[0][3];
 echo "<br>";
?>


<a href="../Control/logout.php">Logout</a>
<a href="../Control/delete.php">Delete</a>
<a href="../Control/update.php">Update</a>

</body>
</html>