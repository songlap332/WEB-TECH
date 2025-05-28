<?php
session_start();
include "../model/db.php";

$conn = createCon();

if (isset($_SESSION['uname'])) 
{
    $uname = $_SESSION['uname'];

    if (deleteUser($conn, $uname)) 
    {
        session_destroy();
        closeCon($conn);
        header("Location: ../View/login.php");
    } else 
    {
        echo "Error deleting account: ";
    }
} else 
{
    echo "Unauthorized access.";
}
?>
