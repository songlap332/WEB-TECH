<?php
session_start();
include "../Model/db.php";
 
$conn = createCon();
 
if (isset($_SESSION['uname'])) 
{
    $uname = $_SESSION['uname'];
 
    if (deleteUser($conn, $uname)) 
    {
        session_destroy();
        closeCon($conn);
        header("Location: ../View/login.php");
        exit;
    } 
    else 
    {
        echo "Error deleting account: " . mysqli_error($conn);
    }
} 
else 
{
    echo "Unauthorized access.";
}
?>