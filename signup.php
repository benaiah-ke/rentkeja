<!DOCTYPE html>
<html lang="en" id="signup">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Material Symbols and icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols" rel="stylesheet">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="login-assets/style.css">

    <title>RentKeja - Login/Sign-Up</title>
</head>
<body>
    <?php
        require('login-assets/php/db.php');
        // When form submitted, insert values into the database.
        if (isset($_REQUEST['login-email'])) {
            // removes backslashes
            $email = stripslashes($_REQUEST['login-email']);
            $email = mysqli_real_escape_string($con, $email);
            $firstname = stripslashes($_REQUEST['login-first-name']);
            $firstname = mysqli_real_escape_string($con, $firstname);
            $surname = stripslashes($_REQUEST['login-surname']);
            $surname = mysqli_real_escape_string($con, $surname);
            $phone = stripslashes($_REQUEST['login-phone']);
            $phone = mysqli_real_escape_string($con, $phone);
            $gender = stripslashes($_REQUEST['login-gender']);
            $gender = mysqli_real_escape_string($con, $gender);
            $pwd = stripslashes($_REQUEST['login-pwd']);
            $pwd = mysqli_real_escape_string($con, $pwd);
            $cdatetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `users` (email, firstname, surname, phone, gender, pwd, cdatetime)
                        VALUES ('$email', '$firstname', '$surname', '$phone', '$gender', '$pwd', '$cdatetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div id='sign-form'>
                    <h3>Your account has been created successfully</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
            } else {
                echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='signup.php'>create an account</a> again.</p>
                    </div>";
            }
        } else {
    ?>
    <div id="main">
        <div class="top-area">
            <div class="logo">
               <h1>RentKeja</h1>
            </div>
            <div class="welcome">
               <h2>Create an Account</h2>
               <p>Fill in the details below to create your RentKeja account</p>
            </div>
        </div>

        <!-- Reused styling for login page, ignore the class names -->
        <form class="login-form" id="signup-form">
            <div class="login-item">
                <label for="login-email">Email Address</label>
                <input type="email" placeholder="enter email address" id="login-email" name="login-email">
            </div>
            <div class="login-item">
                <label for="login-first-name">First Name</label>
                <input type="text" placeholder="enter your first name" id="login-first-name" name="login-first-name">
            </div>
            <div class="login-item">
                <label for="login-surname">Surname</label>
                <input type="text" placeholder="enter your surname" id="login-surname" name="login-surname">
            </div>
            <div class="login-item">
                <label for="login-phone">Phone Number</label>
                <input type="number" placeholder="start with code ie 254 721 xxxxxx" id="login-phone" name="login-phone">
            </div>
            <div class="login-item">
                <label for="login-gender">Select Gender</label>
                <select name="login-gender" id="login-gender">
                    <option value="" disabled selected hidden>select gender</option>
                    <option value="volvo">Male</option>
                    <option value="saab">Female</option>
                    <option value="saab">Other</option>
                </select>
            </div>
            <div class="login-item">
                <label>Password</label>
                <input type="password" placeholder="enter password" id="login-pwd" name="login-pwd">
            </div>
            <div class="login-item" id="signup-item-btn">
                <input type="submit" id="login-btn">
            </div>
        </form>
        <div class="bottom-area">
            <p>Already a RentKeja user? Log in <a href="login.html">HERE</a></p>
        </div>
    </div>
    <?php
        }
    ?>   
</body>
</html>