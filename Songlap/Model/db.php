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

function updateData($conn, $old_uname, $new_uname, $new_pass)
{
    $sql = "UPDATE users SET uname='$new_uname', pass='$new_pass' WHERE uname='$old_uname'";
    return mysqli_query($conn, $sql);
}

function closeCon($conn) 
{
    return mysqli_close($conn);
}
?>
