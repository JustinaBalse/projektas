<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Sign Up</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="js/scripts.js"></script>

</head>
<body>



<!--<div class='modal fade bd-add-project-lg' id='open-back-modal' tabindex='-1' role='dialog'-->
<!--aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>-->
<!--<div class='modal-dialog modal-md'>-->
<!--    <div class='modal-content p-5'>-->
<!--        <p class='d-flex justify-content-center mt-10'>Sign up successful!</p>-->
<!--        <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>-->
<!---->
<!--        <form id='open-back-form' method='post' action='index.php'>-->
<!---->
<!--            <div class='d-flex justify-content-center mt-4'>-->
<!--                <button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'>Back to login-->
<!--                </button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!---->
<!---->
<!-- Script from preventing resubmitting edit form, prevents pop up after page refresh.-->
<!--<script>-->
<!--    $('#back-btn').click(function() {-->
<!--        window.location.href = 'index.php';-->
<!--        return false;-->
<!--    });-->
<!--</script>-->
<!---->
<?php
//if ($_SESSION['signedup'] == "yes") {
//?>
<!---->
<!--<script>-->
<!--    $(function (e) {-->
<!--        $('#open-back-modal').modal('show');-->
<!--    });-->
<!--</script>-->
<!---->
<!--    --><?php
//
//    $_SESSION['signedup'] = "no";
//}
//?>
    

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first img-div">
        <a href="index.php"><img src="images/proact-logo.png" id="icon" alt="ProAct"></a>
    </div>



    <!-- Login Form -->
    <form action="register.inc.php" method="post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <div style="width: 100%; margin: auto; padding-left:30px ">
        <input type="text" id="name" class="fadeIn second" name="name" placeholder="First name" style="width: 44%;float: left;">
        <input type="text" id="surname" class="fadeIn second" name="surname" placeholder="Last name" style="width: 44%;float: left; ">
        </div>
      <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="password" id="pwd" class="fadeIn third" name="password" placeholder="Password">
      <input type="password" id="pwd-repeat" class="fadeIn third" name="repeatPassword" placeholder="Repeat password">
      <input type="submit" class="fadeIn fourth" value="Sign up" name="register">
    </form>
  </div>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields" ) {
            echo "<div id='formFooter'><a class='underlineHover'><p>Fill in all fields!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invaliduidmail") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Invalid username and e-mail!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invaliduid") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Invalid username!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invalidname") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Invalid first name!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invalidsurname") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Invalid last name!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invalidmail") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Invalid e-mail!</p></a></div> \n";
        }
        else if ($_GET['error'] == "invalidpassword") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Password must contain at least one uppercase and one lowercase letter, at least one number and one symbol. Password length 8-30 characters.</p></a></div> \n";
        }
        else if ($_GET['error'] == "passwordcheck") {
            echo "<div id='formFooter'><a class='underlineHover'><p>Your passwords do not match!</p></a></div> \n";
        }
        else if ($_GET['error'] == "usertaken") {
            echo "<div id='formFooter'><a class='underlineHover'><p>This username is already taken!</p></a></div> \n";
        }
        else if ($_GET['error'] == "mailtaken") {
            echo "<div id='formFooter'><a class='underlineHover'><p>This email is already taken!</p></a></div> \n";
        }
    }


    ?>

</div>



  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>