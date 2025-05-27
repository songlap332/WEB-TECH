
document.addEventListener('DOMContentLoaded', function () 
{
    const registrationForm = document.getElementById('registrationForm');
    const loginForm = document.getElementById('loginForm');

    registrationForm.addEventListener('submit', function (e) 
    {
        if (!validateRegistrationForm()) 
        {
            e.preventDefault(); 
        }
    });

    loginForm.addEventListener('submit', function (e) {
        if (!validateLoginForm()) 
        {
            e.preventDefault(); 
        }
    });
});

function validateRegistrationForm() 
{
    let valid = true;

    document.getElementById('fnameError').innerHTML = "";
    document.getElementById('lnameError').innerHTML = "";
    document.getElementById('emailError').innerHTML = "";
    document.getElementById('countryError').innerHTML = "";
    document.getElementById('phoneError').innerHTML = "";

    const namePattern = /^[A-Za-z]{2,30}$/; 


const fname = document.getElementById('fname').value.trim();
if (fname === "") 
{
    document.getElementById('fnameError').innerHTML = "First name is required.";
    valid = false;
} 
else if (!namePattern.test(fname)) 
{
    document.getElementById('fnameError').innerHTML = "First name must be letters only.";
    valid = false;
}

const lname = document.getElementById('lname').value.trim();
if (lname === "") 
{
    document.getElementById('lnameError').innerHTML = "Last name is required.";
    valid = false;
} else if (!namePattern.test(lname)) 
{
    document.getElementById('lnameError').innerHTML = "Last name must be letters only.";
    valid = false;
}

    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email)) 
    {
        document.getElementById('emailError').innerHTML = "Enter a valid email.";
        valid = false;
    }

    const country = document.getElementById('Country').value;
    if (country === "")
    {
        document.getElementById('countryError').innerHTML = "Please select your country.";
        valid = false;
    }

    const phone = document.getElementById('phone').value.trim();
    const phoneRegex = /^[0-9]{10}$/;
    
    if (phone === "") 
    {
        document.getElementById('phoneError').innerHTML = "Phone number is required.";
        valid = false;
    } 
    else if (!phoneRegex.test(phone)) 
    {
        document.getElementById('phoneError').innerHTML = "Phone number must be 10 digits and contain only numbers.";
        valid = false;
    } else 
    {
        document.getElementById('phoneError').innerHTML = ""; 
    }

    return valid;
}

function validateLoginForm() 
{
    let valid = true;

    document.getElementById('loginEmailError').innerHTML = "";
    document.getElementById('passError').innerHTML = "";
    document.getElementById('cpassError').innerHTML = "";

    const loginEmail = document.getElementById('login-email').value.trim();
    if (loginEmail === "") 
    {
        document.getElementById('loginEmailError').innerHTML = "E-mail or phone is required.";
        valid = false;
    }

    const pass = document.getElementById('pass').value;
    const cpass = document.getElementById('cpass').value;
    
    
    document.getElementById('passError').innerHTML = "";
    document.getElementById('cpassError').innerHTML = "";
    
    if (pass === "") 
    {
        document.getElementById('passError').innerHTML = "Password is required.";
        valid = false;
    } 
    else if (pass.length < 8) 
    {
        document.getElementById('passError').innerHTML = "Password must be at least 8 characters long.";
        valid = false;
    } 
    else if (pass !== cpass) 
    {
        document.getElementById('cpassError').innerHTML = "Passwords do not match.";
        valid = false;
    }
    

    return valid;
}

