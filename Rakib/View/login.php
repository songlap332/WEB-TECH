

<?php
include "../Control/login_control.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head> 

<body>
<form id="myForm" action="" autocomplete="on" method="post">


<label for="uname">User name:</label>
<input type="text" id="uname" name="uname"><span>
<br><br>
<label for="password">Password:</label>
<input type="password" id="password" name="password"><span>
<br><br>
<input type="submit" name="Submit" value="Submit">

</body>
</html>