
<?php
include "../model/db.php";
$unameErr = $passwordErr = $genderErr = $emailErr = $fileErr = "";
$hasErr="";
if (isset($_REQUEST["Submit"])) {

    if (empty($_REQUEST["uname"])) 
    {
        $unameErr = "Name is required";
        $hasErr=1;
    } else {
        $uname = $_REQUEST["uname"];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $uname)) 
        {
            $unameErr = "Only letters and white space allowed";
            $hasErr=1;
        }else {
            $unameErr = $uname;
        }
    }

    if (empty($_REQUEST["password"]))
    {
        $passwordErr = "Password is required";
        $hasErr=1;
    } else {
        $password = $_REQUEST["password"];
        if (!preg_match("/^[0-9]{1,3}$/", $password)) 
        {
        $passwordErr = "Only numbers allowed (max 8 digits)";
        $hasErr=1;
        } else {
        $passwordErr = $password;
        }
    }

    if (empty($_REQUEST["gender"])) 
    {
        $genderErr = "Gender is required";
        $hasErr=1;
    } else {
        $genderErr = $_REQUEST["gender"];
    }

    /*if (empty($_REQUEST["email"])) 
    {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
        $emailErr = "Invalid email format";
        }else {
            $emailErr = $email;
        }
    }*/

    if ($_FILES["myfile"]["name"] == "") 
    {
    $fileErr = "No file Upload";
    $hasErr = 1;
    } 
    elseif ($_FILES["myfile"]["size"] > 2097152) 
    {
    $fileErr = "File too large";
    $hasErr = 1;
    } 
    elseif ($_FILES["myfile"]["type"] != "image/jpeg" && $_FILES["myfile"]["type"] != "image/png" && $_FILES["myfile"]["type"] != "application/pdf") 
    {
    $fileErr = "Invalid file type";
    $hasErr = 1;
    } 
    elseif (move_uploaded_file($_FILES["myfile"]["tmp_name"], "../uploads/" . $_REQUEST["uname"] . "-" . $_FILES["myfile"]["name"])) 
    {
    $fileErr = "File Uploaded";
    } 
    else 
    {
    $fileErr = "File Upload Failed";
    $hasErr = 1;
    }

    $conobj=createCon();
    if(insertData($conobj,$_REQUEST["fname"],$_REQUEST["uname"],$_REQUEST["password"],$_REQUEST["gender"],"../uploads/" . $_REQUEST["uname"] . "-" . $_FILES["myfile"]["name"] ))
    {
        header("Location: ../View/login.php");
    }
    else
    {
        echo "Failed"; 
    }

}

?>
