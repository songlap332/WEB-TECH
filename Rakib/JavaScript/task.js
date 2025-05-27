function validateForm(){
    let x = document.getElementById("fullname").value;
    let y = document.getElementById("tele").value;
    let b = document.getElementById("password").value;
    let isValid = true;
    if(x == ""){
        document.getElementById("nameError").innerHTML="Please insert Name";
        isValid = false;
    }else if(!isNaN(x)){
        document.getElementById("nameError").innerHTML="Not use Number";
        isValid = false;
    }else{
        document.getElementById("nameError").innerHTML = "";
    }
    if (y == "") {
        document.getElementById("phnError").innerHTML = "Please insert Number";
        isValid = false;
    } else {
        document.getElementById("phnError").innerHTML = "";
    }
    if (b == "") {
        document.getElementById("passError").innerHTML = "Please insert password";
        isValid = false;
    } else if(b.length!=8){
        document.getElementById("passError").innerHTML="Use at least 8 numbers";
        isValid = false;
    }else {
        document.getElementById("passError").innerHTML = "";
    }
    return isValid;
}

document.getElementById("myForm").addEventListener("keyup", myFunction);
function myFunction(e) {
    let z = document.getElementById("email").value;
    let a = document.getElementById("national id").value;
    let isValid = true;
    if(z == ""){
        document.getElementById("emailError").innerHTML="Please insert E-mail";
        isValid = false;
    }else if (!/^\S+@\S+\.\S+$/.test(z)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        isValid = false;
    }else {
        document.getElementById("emailError").innerHTML = "";
    }
    if(a == ""){
        document.getElementById("idError").innerHTML="Please insert National-ID";
        isValid = false;
    }else {
        document.getElementById("idError").innerHTML = "";
    }
    if (!isValid) {
        e.preventDefault();
    }
}

