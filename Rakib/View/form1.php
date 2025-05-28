<?php
session_start();

setcookie("user","1",time()+86400);
if(!isset($_COOKIE["user"]))
{
  echo "Welcome to my site";
}else{
  echo "You have visited me before";
}
echo "<br>";

echo $_SESSION["user"]="session";
?>

<?php
include "../Control/action_page1.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head> 

<body>
<form id="myForm" action="" autocomplete="on" method="post" enctype="multipart/form-data">

<label for="fname">First name:</label>
<input type="text" id="fname" name="fname">
<br><br>
<label for="uname">User name:</label>
<input type="text" id="uname" name="uname"><span><?php echo $unameErr;?></span>
<br><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password"><span><?php echo $passwordErr;?></span>
<br><br>
<label for="gender">Gender:</label>
<input type="radio" id="gender" name="gender" value="male">Male
<input type="radio" id="gender" name="gender" value="female">Female <span><?php echo $genderErr;?></span>
<br><br>
<label for="myfile">Choose file:</label>
<input type="file" name="myfile" id="myfile"><span><?php echo $fileErr;?></span>
<br><br>
<input type="submit" name="Submit" value="Submit">

</body>
</html>