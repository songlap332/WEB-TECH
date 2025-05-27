<?php
session_start();
include "../model/db.php";
 
$conn = createCon();
 
if (!isset($_SESSION['uname']))
{
    echo "Unauthorized access.";
}
elseif (isset($_REQUEST['submit']))
{
    $old_uname = $_SESSION['uname'];
    $new_uname = $_REQUEST['uname'];
    $new_pass = $_REQUEST['pass'];
 
    if (updateData($conn, $old_uname, $new_uname, $new_pass))
    {
        $_SESSION['uname'] = $new_uname;
        echo "Profile updated successfully.";
    } else
    {
        echo "Failed to update profile.";
    }
}
else
{
    echo "No data submitted.";
}
?>
 
 
<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
</head>
<body>
 
<h2>Update Username and Password</h2>
 
<form action="" method="POST">
    New Username: <input type="text" name="uname" required><br><br>
    New Password: <input type="password" name="pass" required><br><br>
    <input type="submit" name="submit" value="Update">
</form>
 
<a href="../View/profile.php">Back to Profile</a>
 
</body>
</html>