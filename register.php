<?php
  require_once("includes/classes/Formsanitizer.php");
  require_once("includes/classes/config.php");
  require_once("includes/classes/Account.php");
  require_once("includes/classes/Constants.php");
  $account = new Account ($conn);
  if(isset($_POST['submitButton'])){
    $firstName = Formsanitizer::sanitizeInput($_POST['firstName']);
    $lastName = Formsanitizer::sanitizeLastname($_POST['lastName']);
    $userName = Formsanitizer::sanitizeUsername($_POST['username']);
    $email = Formsanitizer::sanitizeEmail($_POST['email']);
    $email2 = Formsanitizer::sanitizeEmail($_POST['email2']);
    $password = Formsanitizer::sanitizePassword($_POST['password']);
    $password2 = Formsanitizer::sanitizePassword($_POST['password2']);
    $account->register($firstName,$lastName,$userName,$email,$email2,$password,$password2);
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
      <h3>Sign In</h3>
      <span>to continue on webFlix</span>
    </div>
      <form method='POST'>
        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
        <input type="text" name = 'firstName' placeholder = 'Enter Firstname' required>
        <input type="text" name = 'lastName' placeholder = 'Enter Lastname' required>
        <input type="text" name = 'username' placeholder = 'Enter username' required>
        <input type="email" name = 'email' placeholder = 'Enter email' required>
        <input type="email" name = 'email2' placeholder = 'Confirm email' required>
        <input type="password" name = 'password' placeholder = 'Enter password' required>
        <input type="password" name = 'password2' placeholder = 'Confirm password' required>
        <input type="submit" name = 'submitButton' value = 'Register'>
      </form>
      <a class = 'loginLink' href="login.php">if already registered..? you can login</a>
    </div>
  </div>
</body>
</html>