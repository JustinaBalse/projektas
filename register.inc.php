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
    }



    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: register.php?error=emptyfields&uid=".$username."&mail=".$email."&name=".$firstname."&surname=".$lastname);
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]{3,30}$/", $username)) {
        header("Location: register.php?error=invaliduid&mail=".$email."&name=".$firstname."&surname=".$lastname);
        exit();
    }

    else if (!preg_match('/^[A-Za-z\x{00C0}-\x{017E}][A-Za-z\x{00C0}-\x{017E}\'\-]+([\ A-Za-z\x{00C0}-\x{017E}][A-Za-z\x{00C0}-\x{017E}\'\-]+)*/u', $firstname)) {
            header("Location: register.php?error=invalidname&uid=".$username."&mail=".$email."&surname=".$lastname);
            exit();
        }

    else if (!preg_match('/^[A-Za-z\x{00C0}-\x{017E}][A-Za-z\x{00C0}-\x{017E}\'\-]+([\ A-Za-z\x{00C0}-\x{017E}][A-Za-z\x{00C0}-\x{017E}\'\-]+)*/u', $lastname)) {
            header("Location: register.php?error=invalidsurname&uid=".$username."&mail=".$email."&name=".$firstname);
            exit();
        }

//    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]{3,30}$/", $username)) {
//        header("Location: register.php?error=invalidmailuid");
//        exit();
//    }

    else if (!$emailVerified)  {
        header("Location: register.php?error=invalidmail&uid=".$username."&name=".$firstname."&surname=".$lastname);
        exit();
    }

    else if ($email!=(filter_var($email, FILTER_SANITIZE_EMAIL))){
        header("Location: register.php?error=invalidmail&uid=".$username."&name=".$firstname."&surname=".$lastname);
        exit();
    }

//    else if (!preg_match('/^[^-][_a-z0-9-]+(\.[_a-z0-9-]+)*@[^-][a-z0-9-]+(\.[^-][a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
//        header("Location: register.php?error=invalidmail&uid=".$username);
//        exit();
//    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=invalidmail&uid=".$username."&name=".$firstname."&surname=".$lastname);
        exit();
    }

//    else if ($emailVerified==false) {
//        header("Location: register.php?error=invalidmail&uid=".$username);
//        exit();
//    }



    else if ($countUsernameCheck !== 0) {
        header("Location: register.php?error=usertaken&uid=".$email."&name=".$firstname."&surname=".$lastname);
        exit();
    }

    else if (!preg_match('/^[^<](?=.*\d)(?=.*[A-Za-z])(?=\S*[\W])[0-9A-Za-z\W]{8,30}$/', $password)) {
        header("Location: register.php?error=invalidpassword&uid=".$username."&mail=".$email."&name=".$firstname."&surname=".$lastname);
        exit();
    }

    else if($password !== $passwordRepeat) {
        header("Location: register.php?error=passwordcheck&uid=".$username."&mail=".$email."&name=".$firstname."&surname=".$lastname);
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
                header("Location: register.php?error=mailtaken&uid=".$username."&name=".$firstname."&surname=".$lastname);
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



                    mysqli_stmt_bind_param($stmt, "sssss", $username,$email,$hashedPwd, $firstname, $lastname);
                    mysqli_stmt_execute($stmt);

                    $_SESSION['signUp']='yes';
                    include 'log-journal.php';
                    session_unset();
                    session_destroy();

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
