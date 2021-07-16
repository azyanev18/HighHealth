<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/booking.css">
  <link rel="stylesheet" href="../css/nav_and_footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
</head>
<body>
<div class="topnav" id="myTopnav">
<div class="logo-image">
<img src="../images/logo2.jpg" width="200" height="100">
</div>
  <a href="index.html" class="active">HOME</a>
  <a href="services.html">SERVICES</a>
  <a href="departments.html">DEPARTMENTS</a>
  <a href="info.html">KNOW YOUR Pet</a>
  <a href="about.html">ABOUT US</a>
  <a href="booking.php">MAKE AN APPOINTMENT</a>
  

 
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="container1">
  <img src="../images/services2.jpg" style="width:100%;">
  <div class="content">
<h1>Booking</h1>

  </div>
</div>


<br></br>
<br></br>
<br></br>



<div class="row">
  <div class="side"> 
  <!-- The sidebar -->
<div class="sidebar">
 
</div>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $PetErr = "";
$name = $email = $gender = $comment = $Pet = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["Pet"])) {
    $Pet = "";
  } else {
    $Pet = test_input($_POST["Pet"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Pet)) {
      $PetErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Make an appointment today!</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Pet: <input type="text" name="Pet" value="<?php echo $Pet;?>">
  <span class="error"><?php echo $PetErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<footer class="footer-distributed">

  <div class="footer-left">
      <img src="../images/logo2.jpg">
    <h3>About<span>HighHealth</span></h3>

    <p class="footer-links">
      <a href="index.html">Home</a>
      |
      <a href="services.html">Services</a>
      |
      <a href="about.html">About</a>
      |
      <a href="booking.html">Make an appointment</a>
    </p>

    <p class="footer-company-name">© 2021 HighHealth Veterinary clinic</p>
  </div>

  <div class="footer-center">
    <div>
        <p><span>445 Bloomfield Ave</span>
          Caldwell, New York - 07006</p>
    </div>

    <div>
      <p>++x xxx-xxx-xxxx</p>
    </div>
    <div>
      <p><a href="mailto:azyanev@gmail.com">support@gmail.com</a></p>
    </div>
  </div>
  <div class="footer-right">
    <p class="footer-company-about">
      <span>About HighHealth</span>
      HighHealth clinics provide a large number of services and are committed to continuously provide perfect care for your Pets.</p>
    <div class="footer-icons">
      <img src="../images/fb_icon.jpg">
      <img src="../images/tw_icon.jpg">
      <img src="../images/instagram.jpg">
      <img src="../images/in.jpg">
      <img src="../images/youtube.jpg">
    </div>
  </div>
</footer>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>