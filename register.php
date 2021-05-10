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
<!--Modal page: Successful signup-->
<div class='modal fadeInDown' id='signupsuccsess-modal' tabindex='1' role='dialog' >
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Sign up successful!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <form id='open-back-form' method='post' action='index.php'>

                <div class='d-flex justify-content-center mt-4'>
                    <a href="index.php" class='btn bg-primary text-white m-1' id='signupsuccsess-btn' data-dismiss='modal'>Back to login page
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="wrapper fadeInDown" id="signup-form">
  <div id="formContent">
    <div class="fadeIn first img-div">
        <a href="index.php"><img src="images/proact-logo.png" id="icon" alt="ProAct"></a>
    </div>
    <form action="register.inc.php" method="post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
        <div style="width: 100%; margin: auto; padding-left:30px ">
        <input type="text" id="name" class="fadeIn second" name="name" placeholder="First name" style="width: 44%;float: left;">
        <input type="text" id="surname" class="fadeIn second" name="surname" placeholder="Last name" style="width: 44%;float: left; ">
        </div>
      <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="password" id="pwd" class="fadeIn third" name="password" placeholder="Password">
      <input type="password" id="pwd-repeat" class="fadeIn third" name="repeatPassword" placeholder="Repeat password">
      <input type="submit" class="fadeIn fourth" value="Sign up" name="register" style="margin-bottom: 20px"><br>
        <a class="underlineHover fadeIn fourth" href="login.php">Back to login page</a>
    </form>
      <?php
      if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields" ) {
              echo "<div id='formFooter'><a class='underlineHover'>Fill in all fields!</a></div> \n";
          }
          else if ($_GET['error'] == "invaliduidmail") {
              echo "<div id='formFooter'><a class='underlineHover'>Invalid username and e-mail!</a></div> \n";
          }
          else if ($_GET['error'] == "invaliduid") {
              echo "<div id='formFooter'><a class='underlineHover'>Invalid username!</a></div> \n";
          }
          else if ($_GET['error'] == "invalidname") {
              echo "<div id='formFooter'><a class='underlineHover'>Invalid first name!</a></div> \n";
          }
          else if ($_GET['error'] == "invalidsurname") {
              echo "<div id='formFooter'><a class='underlineHover'>Invalid last name!</a></div> \n";
          }
          else if ($_GET['error'] == "invalidmail") {
              echo "<div id='formFooter'><a class='underlineHover'>Invalid e-mail!</a></div> \n";
          }
          else if ($_GET['error'] == "invalidpassword") {
              echo "<div id='formFooter'><a class='underlineHover'>Password must contain at least one uppercase and one lowercase letter, at least one number and one symbol. Password length 8-30 characters.</a></div> \n";
          }
          else if ($_GET['error'] == "passwordcheck") {
              echo "<div id='formFooter'><a class='underlineHover'>Your passwords do not match!</a></div> \n";
          }
          else if ($_GET['error'] == "usertaken") {
              echo "<div id='formFooter'><a class='underlineHover'>This username is already taken!</a></div> \n";
          }
          else if ($_GET['error'] == "mailtaken") {
              echo "<div id='formFooter'><a class='underlineHover'>This email is already taken!</a></div> \n";
          }
      }
      ?>
  </div>

</div>
  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    // Get the modal
    var modal = document.getElementById("signupsuccsess-modal");
    var mainBody = document.getElementById("signup-form");

    function getParameter(parameterName) {
        let parameters = new URLSearchParams(window.location.search);
        return parameters.get(parameterName);
    }

    var signUpComplete =getParameter("success");

    // Get the <span> element that closes the modal
    var btn = document.getElementById("signupsuccsess-btn");

    // When the user clicks on the button, open the modal
    if (signUpComplete=="signupsuccess") {
        modal.style.display = "block"
        modal.style.opacity = 100
        modal.style.position = "relative"
        modal.style.top = "5%"
        mainBody.style.display="none"
    }
    </script>
</body>
</html>