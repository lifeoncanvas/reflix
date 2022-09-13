
<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizeer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

 if(isset($_POST["submitButton"])) {
    // accessing the form sanitizer class
    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

    $success = $account->login($username,$password);

    if($success){
      $_SESSION["UserLoggedIn"] = $username;
      header("Location: index.php");
    }

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title>Welcome to reflix</title>
</head>
<body>
     <div class="signInContainer">
       <div class="column">
        <div class="header">
          <img class="logo" src="assets/images/LOGO.png" title="logo" alt="site logo">
          <h3>Sign In</h3>
          <span>To continue to reflix</span>
        </div>
        <form method="POST">

            <?php echo $account->getError(Constants::$loginFailed); ?>
            <input type="text" name="username" placeholder=" Username" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" name="submitButton" value="Submit">

        </form>

        <a href="register.php" class="signInMessage">dont have an account ?Sign up here !</a>
       </div>
     </div>
</body>
</html>