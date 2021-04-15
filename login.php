<!DOCTYPE html>

<!-- Verification -->
<?php

session_start();

$errors = 0;

if (isset($_SESSION['login'])){

    header ('Location: index.php');

} elseif ((isset($_POST['login'])) && (isset($_POST['password'])) && (isset($_POST['submit']))) {

    $pass = $_POST['password'];

    if (strlen($pass) < 8 || strlen($pass) > 16) {
        $errors = $errors++;
    }
    if (!preg_match("/\d/", $pass)) {
        $errors = $errors++;
    }
    if (!preg_match("/[A-Z]/", $pass)) {
        $errors = $errors++;
    }
    if (!preg_match("/[a-z]/", $pass)) {
        $errors = $errors++;
    }
    if (preg_match("/\s/", $pass)) {
        $errors = $errors++;
    }


//       Jei slaptazodis geras suveikia si saka.
    if ($errors == 0) {

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

            $rows = 0;

            if((mysqli_num_rows($res)) == 1) {
              $databaseArrays = mysqli_fetch_array($res, MYSQLI_ASSOC);
              $rows = $rows++;
            }else {

              $sql2= "SELECT password FROM users WHERE email= '" . $_POST['login'] . "'";
              $res2 = mysqli_query($mysqli, $sql2);
              $databaseArrays = mysqli_fetch_array($res2, MYSQLI_ASSOC);
              $rows = $rows++;
            }

            $databasePassword = "denied";

            if ($rows == 1) {

                $databasePassword = $databaseArrays['password'];
            }


//            if (password_verify($pass, $databasePassword)) { TODO Šifruoto slaptažodžio verifikacija.

            if ($pass == $databasePassword) {

                $_SESSION['login'] = $_POST['login'];
                header('Location: index.php');
            }else {
                $errors = $errors++;
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

</head>
<body>



<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login" minlength="6" maxlength="30" required oninvalid="this.setCustomValidity(`Insert username.`)">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required oninvalid="this.setCustomValidity(`Insert password.`)">
      <input type="submit" id="submit" class="fadeIn fourth" name="submit" value="Log In">
    </form>

     <!-- Remind Password -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

    <?php

     if ($errors > 0) {
              echo "<p>Login or password is incorrect.</p> \n";
     }
    ?>

  </div>
</div>




  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
