<!DOCTYPE html>

<!-- Verification -->
<?php

session_start();
$_SESSION['signUp']='no';

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
//    $host = "localhost";
//    $user = "root";
//    $userPassword = "";
//    $dbName = "proact";
//
//    $mysqli = mysqli_connect($host, $user, $userPassword, $dbName);

    include  'dbh.php';

    if (mysqli_connect_errno()) {

        printf("Failed to connect to database: ", mysqli_connect_error());
        exit();


    } else {

        $sql = "SELECT password, first_name FROM users WHERE user_name= '" . $_POST['login'] . "'";
        $res = mysqli_query($mysqli, $sql);

        if ((mysqli_num_rows($res)) == 1) {

            $databaseArrays = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $username = $_POST['login'];

            $row=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT email FROM users WHERE user_name='".$_POST['login']."'"));
            $_SESSION['email'] =$row['email'] ;
        } else {

            $sql2 = "SELECT password, user_name, first_name FROM users WHERE email= '" . $_POST['login'] . "'";
            $res2 = mysqli_query($mysqli, $sql2);
            $databaseArrays = mysqli_fetch_array($res2, MYSQLI_ASSOC);

            $_SESSION['email']=$_POST['login'];
        }

        $databasePassword = "denied";

        if (!empty($databaseArrays)) {
            $databasePassword = $databaseArrays['password'];
        }

        if (password_verify($pass, $databasePassword)) {

            $_SESSION['login'] = $_SESSION['email'];
            $_SESSION['name'] = $databaseArrays['first_name'];

            header('Location: index.php');
        } else {
            $error = "<br>You have entered wrong email or password.";
        }
    }

    mysqli_close($mysqli);
}
?>


<html lang="en">
<head>
  <meta charset="utf-8">

  <title>ProAct</title>
  <meta name="description" content="Proact">
  <meta name="author" content="SitePoint">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="js/scripts.js"></script>

</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

<!--     Icon -->
    <div class="fadeIn first img-div">
      <img src="images/proact-logo.png" id="icon" alt="ProAct">
    </div>

    <!-- Login Form -->
    <form action="" method="POST">

      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In" style="margin-bottom: 20px"><br>
        <a class="underlineHover fadeIn fourth" href="register.php">Sign up!</a><br>
        <a class="underlineHover fadeIn fourth" href="#" style="margin-bottom: 20px">Forgot Password?</a>


<?php

    if ($error != "") {
        echo "<div id='formFooter'><a class='underlineHover'>" . $error . "</a></div> \n";
    }

?>
    </form>



  </div>
</div>
  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
