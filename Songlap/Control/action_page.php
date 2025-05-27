
<?php
include "../Model/db.php";
$fname = $uname = $email = $phone  = $gender = $pass="";
$loginEmail = $loginPass = "";
$regErrors = [];
//$loginErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fname'])) 
{
    if (empty(trim($_POST["fname"]))) 
    {
        $regErrors['fname'] = "First name is required.";
    } 
    else 
    {
        $fname = htmlspecialchars(trim($_POST["fname"]));
    }

    if (empty(trim($_POST["uname"]))) 
    {
        $regErrors['uname'] = "Last name is required.";
    } 
    else 
    {
        $lname = htmlspecialchars(trim($_POST["uname"]));
    }

    if (empty(trim($_POST["email"]))) 
    {
        $regErrors['email'] = "Email is required.";
    } 
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
    {
        $regErrors['email'] = "Valid email is required.";
    } 
    else 
    {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

   

    if (empty(trim($_POST["phone"]))) 
    {
        $regErrors['phone'] = "Phone number is required.";
    } 
    else 
    {
        $phone = htmlspecialchars(trim($_POST["phone"]));
    }

    if (empty($_POST["gender"]))
    {
        $regErrors['gender'] = "Choose your gender.";
    } 
    else 
    {
        $phone = ($_POST["gender"]);
    }



    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";

    if (empty($regErrors)) 
    {
        
        echo "<div class='success'><h3>Registration Successful!</h3>";
        echo "<p>First Name: $fname</p>";
        echo "<p>Last Name: $uname</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Gender: $gender</p>";
    }

     if (empty(trim($_POST["pass"]))) 
    {
        $regErrors['pass'] = "Password is required.";
    } 
    elseif (strlen($_POST["pass"]) < 8) 
    {
        $regErrors['pass'] = "Password must be at least 8 characters long.";
    } 
    else 
    {
        $loginPass = $_POST["pass"];
    }

    if ($_FILES["myfile"]["name"] == "")
    {
        $fileErr = "No file Upload";
    } else
    {
        if ($_FILES["myfile"]["size"] > 2097152)
        {
            $fileErr = "File size is too large";
        } else
        {
            if ($_FILES["myfile"]["type"] != "image/jpeg" && $_FILES["myfile"]["type"] != "image/png" && $_FILES["myfile"]["type"] != "application/pdf")
            {
                $fileErr = "Invalid file type";
            } else
            {
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"], "../Uploads/" . $_REQUEST["uname"] . "-" . $_FILES["myfile"]["name"]))
                {
                    $fileErr = "File Uploaded";
                } else
                {
                    $fileErr = "File Upload Failed";
                }
            }
        }
    } 
    
$conobj=createCon();

if(insertData($conobj,$_REQUEST["fname"],$_REQUEST["uname"],$_REQUEST["email"],$_REQUEST["phone"],$_REQUEST["gender"],$_REQUEST["pass"],"../uploads/" . $_REQUEST["uname"] . "-" . $_FILES["myfile"]["name"] ))
    {
        header("Location: ../View/login.php");
    }
    else
    {
        echo "Failed";
    }
    
    
}

/*if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pass'])) 
{
    if (empty(trim($_POST["uname"]))) 
    {
        $loginErrors['uname'] = "E-mail or phone is required.";
    } 
    else 
    {
        $loginEmail = htmlspecialchars(trim($_POST["uname"]));
    }

    if (empty(trim($_POST["pass"]))) 
    {
        $loginErrors['pass'] = "Password is required.";
    } 
    elseif (strlen($_POST["pass"]) < 8) 
    {
        $loginErrors['pass'] = "Password must be at least 8 characters long.";
    } 
    else 
    {
        $loginPass = $_POST["pass"];
    }

    

    if (empty($loginErrors)) 
    {
        echo "<div class='success'><h3>Login Successful!</h3></div>";
        
    }
}*/
?>