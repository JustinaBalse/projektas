<!DOCTYPE html>

<!-- Verification -->
<?php

session_start();


$error = "";

if (isset($_SESSION['login'])){

    header ('Location: index.php');

} elseif ((isset($_POST['login'])) && (isset($_POST['password'])) && (isset($_POST['submit']))) {

    $pass = $_POST['password'];

    // taip sukuriamas hashintas passwordas, kuri reikia nukopijuoti ir insertint i DB

//    echo password_hash('Password129', PASSWORD_DEFAULT);
//    echo "\nAAAA";
//    echo password_hash('Password439', PASSWORD_DEFAULT);
//    echo "\nAAAA";
//    echo password_hash('Testuoju112', PASSWORD_DEFAULT);

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

        $sql= "SELECT password, first_name FROM users WHERE user_name= '" . $_POST['login'] . "'";
        $res = mysqli_query($mysqli, $sql);

        if((mysqli_num_rows($res)) == 1) {

            $databaseArrays = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $username = $_POST['login'];
        }else {

            $sql2= "SELECT password, user_name, first_name FROM users WHERE email= '" . $_POST['login'] . "'";
            $res2 = mysqli_query($mysqli, $sql2);
            $databaseArrays = mysqli_fetch_array($res2, MYSQLI_ASSOC);
        }

        $databasePassword = "denied";

        if (!empty($databaseArrays)) {
            $databasePassword = $databaseArrays['password'];
        }

        if (password_verify($pass, $databasePassword)) {

            $_SESSION['login'] = $_POST['login'];
            $_SESSION['name'] = $databaseArrays['first_name'];

            header('Location: index.php');
        }else {
            $error =  "<br>You have entered wrong username/ email or password.";
        }
    }

    mysqli_close($mysqli);
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
  <link rel="stylesheet" href="css/login.css">
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

      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Username or email" minlength="6" maxlength="30" required>
      <input type="password" id="password" class="fadeIn third" name="password" minlength="8" maxlength="16" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">

<?php

    if ($error != "") {
        echo "<div id='formFooter'><a class='underlineHover'>" . $error . "</a></div> \n";
    }
?>
    </form>

<!--     Remind Password-->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->



  </div>
</div>

  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
