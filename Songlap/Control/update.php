<?php
session_start();
include "../Model/db.php";

$conn = createCon();

if (isset($_SESSION['uname'])) {
    $currentUname = $_SESSION['uname'];

    $newUname = $_POST['newUname'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';

    if (empty($currentUnameme)) {
        echo "Username or password cannot be empty.";
    } else {
        if (updateUser($conn, $currentUname, $newUname, $newPassword)) {
            $_SESSION['uname'] = $newUname;

            echo "User information updated successfully.";
        } else {
            echo "Error updating account: " . mysqli_error($conn);
        }
    }

    closeCon($conn);
} else {
    echo "Unauthorized access.";
}
?>
