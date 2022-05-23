<?php
  if(isset($_POST['submitButton'])){
    echo "Form is submitted";
  }


?>


<! DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href='assets/styles/style.css'>
  <title>Web Flix</title>
</head>
<body>

  <div class="signInContainer">
    <div class="column">
    <div class="header">
      <img src="assets/images/webflix.png" class = 'logo' alt="logo">
      <h3>Log In</h3>
      <span>Welcome Back</span>
    </div>
      <form method='POST'>
        <input type="text" name = 'username' placeholder = 'Enter username' required>
        <input type="password" name = 'password' placeholder = 'Enter password' required>
        <input type="submit" name = 'submitButton' value = 'Register'>
      </form>
      <a class = 'loginLink' href="register.php">Register ..if not </a>
    </div>
  </div>
</body>
</html>