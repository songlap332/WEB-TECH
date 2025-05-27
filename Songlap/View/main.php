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

<?php include "../Control/action_page.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration></title>
    <link rel="stylesheet" type="text/css" href="../Control/MyCss.css">    
</head>
<body>



<form id="registrationForm" method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset align="center">
        <legend id="legend1"><h3>Personal Information:</h3></legend><br>

    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
    <span class="error"><?php echo $regErrors['fname'] ?? ''; ?></span><br><br>

    <label for="uname">Last name:</label>
    <input type="text" id="uname" name="uname" placeholder="Last Name" value="<?php echo $uname; ?>">
    <span class="error"><?php echo $regErrors['uname'] ?? ''; ?></span><br><br>

    <label for="email">E-mail Id:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $regErrors['email'] ?? ''; ?></span><br><br>

    

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">
    <span class="error"><?php echo $regErrors['phone'] ?? ''; ?></span><br><br>

    

   

    <label>Gender:</label>
        <input type="radio" name="gender" id="gender" value="male" > Male
        <input type="radio" name="gender" id="gender" value="female"> Female
        <input type="radio" name="gender" id="gender" value="others"> Others
            <span class="error"><?php echo $regErrors['gender'] ?? ''; ?></span><br><br>


    
    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass">
    <span class="error"><?php echo $regErrors['pass'] ?? ''; ?></span><br><br>
    
    <input type="file" name="myfile"><br><br>
    <input type="submit" class="button" value="Register">
</fieldset>
</form>


</body>
</html>