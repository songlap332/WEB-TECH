<?php
function createCon() 
{
    return mysqli_connect("localhost", "root", "", "web_tech");
}

function insertData($conn, $fname , $uname , $email , $phone  , $gender , $pass,$file) 
{
    $sql = "INSERT INTO users (fname, uname,email,phone, gender,pass, filename) 
            VALUES ('$fname', '$uname','$email','$phone', '$gender','$pass', '$file')";
    return mysqli_query($conn, $sql);
}
function checkLogin($conn,$uname,$pass)
{
    $sql="SELECT * FROM users WHERE uname='$uname' AND pass='$pass'";
    return mysqli_query($conn,$sql);
}
 
function fetchUser($conn,$uname)
{
    $sql="SELECT * FROM users WHERE uname='$uname'";
    return mysqli_query($conn,$sql);
}

 
function deleteUser($conn, $uname)
{
    $sql = "DELETE FROM users WHERE uname = '$uname'";
    return mysqli_query($conn, $sql);
}

function updateUser($conn, $currentUname, $newUname, $newPassword) {
    $newUname = mysqli_real_escape_string($conn, $newUname);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    $sql = "UPDATE users SET uname = '$newUname', password = '$newPassword' WHERE uname = '$currentUname'";
    return mysqli_query($conn, $sql);
}

function closeCon($conn) 
{
    return mysqli_close($conn);
}
?>
