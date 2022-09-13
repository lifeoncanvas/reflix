
<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizeer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

// the $ in php is how you creste a variable of an object 
 if(isset($_POST["submitButton"])) {
  // accessing the form sanitizer class
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

    $success = $account->register($firstName,$lastName,$username,$email,$password,$password2);

    if($success){
      $_SESSION["UserLoggedIn"] = $username;
      header("Location: index.php");
    }

    // echo $firstName;
    // echo $lastName;
    // echo $username;
    // echo $email;
    // echo $password;
    // echo $password2;
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
          <h3>Sign up</h3>
          <span>To continue to reflix</span>
        </div>
        <form method="POST">
           <?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <input type="text" name="firstName" placeholder="First Name" required>
            
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
             <input type="text" name="lastName" placeholder="Last Name" required>

            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <input type="text" name="username" placeholder=" Username" required>

            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailTaken); ?>
            <input type="email" name="email" placeholder="Email" required>

            <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
            <?php echo $account->getError(Constants::$passwordCharacters); ?>
            <input type="password" name="password" placeholder="Password" required>

            
            <input type="password" name="password2" placeholder="Comfirm password" required>

            <input type="submit" name="submitButton" value="Submit">


        </form>

        <a href="login.php" class="signInMessage">Already have an account ?Sign in here !</a>
       </div>
     </div>
</body>
</html>