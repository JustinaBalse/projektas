<!DOCTYPE html>

<!-- Verification -->
<?php

session_start();

$errors = [];

if (isset($_SESSION['login'])){

    header ('Location: index.php');

} elseif ((isset($_POST['login'])) && (isset($_POST['password'])) && (isset($_POST['submit']))) {

    $pass = $_POST['password'];

//    if (strlen($pass) < 8 || strlen($pass) > 16) {
//        $errors[] = "Password should be min 8 characters and max 16 characters";
//    }
//    if (!preg_match("/\d/", $pass)) {
//        $errors[] = "Password should contain at least one digit";
//    }
//    if (!preg_match("/[A-Z]/", $pass)) {
//        $errors[] = "Password should contain at least one Capital Letter";
//    }
//    if (!preg_match("/[a-z]/", $pass)) {
//        $errors[] = "Password should contain at least one small Letter";
//    }
//    if (preg_match("/\s/", $pass)) {
//        $errors[] = "Password should not contain any white space";
//    }


    // taip sukuriamas hashintas passwordas, kuri reikia nukopijuoti ir insertint i DB

//    echo password_hash('Password129', PASSWORD_DEFAULT);
//    echo "\nAAAA";
//    echo password_hash('Password439', PASSWORD_DEFAULT);
//    echo "\nAAAA";
//    echo password_hash('Testuoju112', PASSWORD_DEFAULT);
////
//    die;


//       Jei slaptazodis geras suveikia si saka.
    if (empty($errors)) {
//        echo "asdad";
//        die;

        // TODO Prisijungimas prie ne lokalios DB
        $host = "localhost";

        $user = "root";

        $userPassword = "";

        $dbName = "proact";

        $mysqli = mysqli_connect($host, $user, $userPassword, $dbName);

        if (mysqli_connect_errno()) {

          printf("Failed to connect to database: ", mysqli_connect_error());
          exit();

        } else {

            $sql= "SELECT password FROM users WHERE user_name= '" . $_POST['login'] . "'";
            $res = mysqli_query($mysqli, $sql);

//            $databaseArrays = array();

            if((mysqli_num_rows($res)) == 1) {
              $databaseArrays = mysqli_fetch_array($res, MYSQLI_ASSOC);
			  $username = $_POST['login'];
            }else {

              $sql2= "SELECT password FROM users WHERE email= '" . $_POST['login'] . "'";
              $res2 = mysqli_query($mysqli, $sql2);
              $databaseArrays = mysqli_fetch_array($res2, MYSQLI_ASSOC);
			  
			  
				$sql3= "SELECT user_name FROM users WHERE email= '" . $_POST['login'] . "'";
				$res3 = mysqli_query($mysqli, $sql3);
				$username = mysqli_fetch_array($res3, MYSQLI_ASSOC)['user_name'];
			  
            }

            $databasePassword = "denied";

            if (!empty($databaseArrays)) {

                $databasePassword = $databaseArrays['password'];
            }

            if (password_verify($pass, $databasePassword)) { //TODO Šifruoto slaptažodžio verifikacija.

//                if ($pass == $databasePassword) {

                $_SESSION['login'] = $username;
                header('Location: index.php');
            }else {
                $errors[] =  "<br>Wrong login or password inserted.";
                $aaa = "SvarbuNeTusciasKitaipNemesErroro";
            }
        }

        mysqli_close($mysqli);
    }
}
?>


<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Project Management</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/utilities.css">
    <script src="js/scripts.js"></script>

</head>
<body>



<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
<!--    <div class="fadeIn first">-->
<!--      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />-->
<!--    </div>-->

    <!-- Login Form -->
    <form action="" method="POST">

      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login" minlength="6" maxlength="30" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
        <?php
        if(!empty($aaa)) {
            ?>
                <div id="formFooter">
            <a class="underlineHover">You have entered wrong username/ email or password.
            </a>
                </div>
            <?php
        }
        ?>
    </form>

<!--     Remind Password-->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->



  </div>
</div>


    <?php

    if (count($errors) > 0) {
        foreach ($errors as $error) {
             echo "<p>" . $error . "</p> \n";
        }
        die();
    }
    ?>







  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
