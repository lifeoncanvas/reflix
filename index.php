<?PHP
    require_once("includes/config.php");

    if(isset($_SESSION["UserLogged In"])){
        header("Location:register.php");
    }


?>