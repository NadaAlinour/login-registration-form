function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


//Registration validation
function validateRegForm() {
    //hide all errors
    printError("duplicateRegErr", "");
    printError("regSuccessful", "");


    //validate
    var name = document.regForm.name.value;
    var email = document.regForm.email.value;
    var password = document.regForm.password.value;
    var cpassword = document.regForm.cpassword.value;

    var nameErr = emailErr = passwordErr = cpasswordErr = passwordMatchErr = true;


    if (name == "") {
        printError("nameErr", "Name field is required");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {
            printError("nameErr", "Enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }

    }


    //email format validation
    if (email == "") {
        printError("emailErr", "Email field is required");
        //the error flag should be set to false here as well as below (from future me uwu)
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }

    }


    if (password == "") {
        printError("passwordErr", "Password field is required");
    } else {
        printError("passwordErr", "");
        passwordErr = false;
    }


    if (cpassword == "") {
        printError("cpasswordErr", "Confirm Password field is required");
    } else {
        printError("cpasswordErr", "");
        cpasswordErr = false;
    }


    //passwords must match
    if (password != cpassword) {
        printError("passwordMatchErr", "Passwords must match");
    } else {
        printError("passwordMatchErr", "");
        passwordMatchErr = false;
    }

    if ((nameErr || emailErr || passwordErr || cpasswordErr || passwordMatchErr) == true) {
        return false;
    }

};


//Login validation
function validateFormLogin() {
    //hide all errors
    printError("loginFailerror", "");
    printError("loginEmailErr", "");
    printError("loginPassErr", "");

    //validate
    var email = document.loginForm.email.value;
    var password = document.loginForm.password.value;

    var loginEmailErr = loginPassErr = true;


    if (email == "") {
        printError("loginEmailErr", "Email field is required");
    } else {
        //email format validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("loginEmailErr", "Please enter a valid email address");
        } else {
            printError("loginEmailErr", "");
            loginEmailErr = false;
        }

    }


    if (password == "") {
        printError("loginPassErr", "Password field is required");
    } else {
        printError("loginPassErr", "");
        loginPassErr = false;
    }

    if ((loginEmailErr || loginPassErr) == true) {
        return false;
    }

}

