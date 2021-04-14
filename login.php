<!DOCTYPE html>

<!--Verification-->
<?php

session_start();

$errors = [];

if (isset($_SESSION['login'])){

    header ('Location: index.php');

} elseif ((isset($_POST['login'])) && (isset($_POST['password'])) && (isset($_POST['submit']))) {

  // TODO Password encrypting

    $pass = $_POST['password'];

    if (strlen($pass) < 8 || strlen($pass) > 16) {
        $errors[] = "Password should be min 8 characters and max 16 characters";
    }
    if (!preg_match("/\d/", $pass)) {
        $errors[] = "Password should contain at least one digit";
    }
    if (!preg_match("/[A-Z]/", $pass)) {
        $errors[] = "Password should contain at least one Capital Letter";
    }
    if (!preg_match("/[a-z]/", $pass)) {
        $errors[] = "Password should contain at least one small Letter";
    }
    if (preg_match("/\s/", $pass)) {
        $errors[] = "Password should not contain any white space";
    }


//       Jei slaptazodis geras suveikia si Else saka.
    if (empty($errors)) {

        $mysqli = mysqli_connect("localhost", "root", "", "parduotuve"); //TODO: Duombaze dar nesukurta reikes pakeisti prisijungima.

        if (mysqli_connect_errno()) {

          printf("Failed to connect to database: ", mysqli_connect_error());
          exit();

        } else {

            $sql= "SELECT vartotojo_id FROM vartotojai WHERE vartotojo_id= '" . $_POST['login'] . "' AND slaptazodis= '" . $pass . "'"; // TODO: Duombaze dar nesukurta reikes pakeisti uzklausa.
            $res = mysqli_query($mysqli, $sql);

            $sql2= "SELECT email FROM vartotojai WHERE email= '" . $_POST['login'] . "' AND slaptazodis= '" . $pass . "'"; // TODO: Duombaze dar nesukurta reikes pakeisti uzklausa.
            $res2 = mysqli_query($mysqli, $sql);

            $count = mysqli_num_rows($res) + mysqli_num_rows($res2);


            if ($count == 1) {

                $_SESSION['login'] = $_POST['login'];
                header('Location: index.php');
            }else {
                $errors[] =  "<br>Inserted wrong login or password.";
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
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login" required>
      <input type="text" id="password" class="fadeIn third" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
    </form>

     Remind Password
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

    <?php

  // TODO: DO padaryti kad klaidu pranesimai butu isspausdinti nepaisant Required atributu formoje.

    if ($errors) {
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p> \n";
        }
        die();
    }
    ?>

  </div>
</div>


  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
