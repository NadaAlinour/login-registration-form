<?php
session_start();
?>


<html>

<head>

    <title>
        Login and Registration
    </title>

    <link rel="stylesheet" href="stylesheet1.css">

    <script src="validator.js"></script>

</head>


<body>

    <h1>Login</h1>


    <div class="form">
        <form name="loginForm" action="login.php" onsubmit="return validateFormLogin()" method="post">


            <label class="label1">Email:</label> <input id="email" class="inputBox" name="email">
            <div class="error" id="loginEmailErr"></div>

            <br>

            <label class="label1">Password:</label> <input type="password" class="inputBox" id="password" name="password">
            <div class="error" id="loginPassErr"></div>

            <br>

            <input id="button" class="button" type="submit" value="Submit">

            <?php
            $Error = "";
            if (isset($_SESSION["loginFailerror"])) {
                $Error = $_SESSION["loginFailerror"];
            }
            echo "<span id='loginFailerror' style= 'color: #e34c19;'>$Error</span>";
            ?>

        </form>

    </div>


    <br>


    <h1>Register</h1>
    <div class= "form">

    <form name="regForm" action="registration.php" onsubmit="return validateRegForm()" method="post">


    <label class="label1">Name:</label> <input type="name" class="inputBox" id="name" name="name">
        <div class="error" id="nameErr"></div>

        <br>

        <label class="label1">Email:</label> <input id="email" class="inputBox" name="email">
        <div class="error" id="emailErr"></div>

        <br>

        <label class="label1">Password:</label> <input type="password" id="password" class="inputBox" name="password">
        <div class="error" id="passwordErr"></div>

        <br>

        <label class="label1">Confirm Password:</label> <input type="password" class="inputBox" id="cpassword" name="cpassword">
        <div class="error" id="cpasswordErr"></div>

        <br>

        <div class="error" id="passwordMatchErr"></div>

        <input id="button1" class="button" type="submit" value="Submit">
         
          <!-- Email already exists in database -->
          <?php
        $RegError = "";
        if (isset($_SESSION["duplicateRegErr"])) {
            $RegError = $_SESSION["duplicateRegErr"];
        }
        echo "<span id='duplicateRegErr' style= 'color: #e34c19;'>$RegError</span>";
        ?> 

        <!--Welcome " . $_SESSION["username"] . " -->

        <!-- successful registration message -->
        <?php
        $RegSuccess = "";
        if (isset($_SESSION["regSuccessful"])) {
            $RegSuccess = $_SESSION["regSuccessful"];
        }
        echo "<span id='regSuccessful' style= 'color: #e34c19;'>$RegSuccess</span>";
        ?>


    </form>
    </div>

</body>




</html>

<?php
unset($_SESSION["loginFailerror"]);
unset($_SESSION["duplicateRegErr"]);
unset($_SESSION["regSuccessful"]);
?>