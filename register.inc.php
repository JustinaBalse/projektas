<?php

if (isset($_POST['register'])) {

    require 'dbh.php';

    $_SESSION['signUp']='no';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['repeatPassword'];
    $firstname = $_POST['name'];
    $lastname = $_POST['surname'];

    $_SESSION['email']=$email;
    
   $usernameCheck=mysqli_query($mysqli,"SELECT user_name FROM users WHERE user_name='$username'");
   $countUsernameCheck=mysqli_num_rows($usernameCheck);

    if($email){
        require_once("EmailVerify.class.php");
        $verify = new EmailVerify();

        if($verify->verify_domain($email)){
            $emailVerified=true;
        }else{
            $emailVerified=false;
        }

        echo "<BR>\r\n<BR>\r\n";
    }

   if ($firstname !== "") {
      if (!preg_match('/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u', $firstname)) {
           header("Location: register.php?error=invalidname&username=".$username."&email=".$email);
           exit();
       }

   }

   if ($lastname !== "") {
       if (!preg_match('/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u', $lastname)) {
           header("Location: register.php?error=invalidsurname&username=".$username."&email=".$email);
           exit();
       }
   }

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: register.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]{3,30}$/", $username)) {
        header("Location: register.php?error=invalidmailuid");
        exit();
    }

    else if (!preg_match('/^[^-][_a-z0-9-]+(\.[_a-z0-9-]+)*@[^-][a-z0-9-]+(\.[^-][a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        header("Location: register.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if ($emailVerified==false) {
        header("Location: register.php?error=invalidmail&uid=".$username);
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]{3,30}$/", $username)) {
        header("Location: register.php?error=invaliduid&mail=".$email);
        exit();
    }

    else if ($countUsernameCheck !== 0) {
        header("Location: register.php?error=usertaken&uid=".$email);
        exit();
    }

    else if (!preg_match('/^[^<](?=.*\d)(?=.*[A-Za-z])(?=\S*[\W])[0-9A-Za-z\W]{8,30}$/', $password)) {
        header("Location: register.php?error=invalidpassword&username=".$username."&email=".$email);
        exit();
    }



    else if($password !== $passwordRepeat) {
        header("Location: register.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }


    else {

        $sql = "SELECT user_name FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: register.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck =mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: register.php?error=mailtaken&uid=".$username);
                exit();
            }
            else {
                $sql ="INSERT INTO users (user_name, email, password, first_name, last_name) VALUES (?, ?, ? ,? ,?)";
                $stmt = mysqli_stmt_init($mysqli);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: register.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $_SESSION['signUp']='yes';
                    include 'log-journal.php';
                    mysqli_stmt_bind_param($stmt, "sssss", $username,$email,$hashedPwd, $firstname, $lastname);
                    mysqli_stmt_execute($stmt);

                    header("Location: register.php?success=signupsuccess");
                    exit();

                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
}
else {

    header("Location: register.php");
    exit();
}
