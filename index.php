<!DOCTYPE html>

<?php

//Verification
session_start();

if (empty($_SESSION['login'])){
    header ('Location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header ('Location: login.php');
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Project Managment</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/utilities.css">

</head>
<body>
<?php

$greetingName = "";

if (empty($_SESSION['name'])) {
    $greetingName = $_SESSION['login'];
}else {
    $greetingName = $_SESSION['name'];
}

echo "<h3>Howdy, " . $greetingName . " . Let's manage some projects!</h3>"
?>
    <form action="" method="POST">
      <input type="submit" class="fadeIn fourth" name="logout" value="Log out">
    </form>



  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
