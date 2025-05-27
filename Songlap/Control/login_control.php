<?php
include "../Model/db.php";
session_start();

if (isset($_POST["Submit"])) 
{
    $uname = trim($_POST["uname"]);
    $password = trim($_POST["password"]);

    if (empty($uname) || empty($password)) 
    {
        echo "Username or Password cannot be empty.";
    } else 
    {
        $conobj = createCon();
        $result = checkLogin($conobj, $uname, $password);

        if (mysqli_num_rows($result) > 0) 
        {
            $_SESSION["uname"] = $uname;
            header("Location: ../View/profile.php");
            exit();
        } 
        else 
        {
            echo "No User Found";
        }
    }
}
?>
