<?php
require_once("includes/classes/Formsanitizer.php");
require_once("includes/classes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");
$account = new Account ($conn);
  if(isset($_POST['submitButton'])){
    $userName = Formsanitizer::sanitizeUsername($_POST['username']);
    $password = Formsanitizer::sanitizePassword($_POST['password']);
    $success = $account->login($userName,$password);
    if($success) {
      $_SESSION["userLoggedIn"] = $userName;
      header("Location: index.php");
    }
  }

//helper function to store value in input value

function storeValues($name){
  if(isset($_POST[$name])){
    echo $_POST[$name];
  }
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
      <?php echo $account->getError(Constants::$loginFailed); ?>
        <input type="text" name = 'username' value="<?php storeValues("username") ?>" placeholder = 'Enter username' required>
        <input type="password" name = 'password' placeholder = 'Enter password' required>
        <input type="submit" name = 'submitButton' value = 'Register'>
      </form>
      <a class = 'loginLink' href="register.php">Register ..if not </a>
    </div>
  </div>
</body>
</html>