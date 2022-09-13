<!-- this is where the connection takes place , that allows to communicate with the database -->
<?php 
  ob_start(); // turns on output buffering . it waits for all the php to be executed before outputting it.
  session_start(); //starts the sessions. sessions are variables and values, even after the page has been closed.
  //it tells whether the session is logged in or not.if session is set means logged in vice versa .

  date_default_timezone_set('Asia/Kolkata');

  try{
    //specify the database name ,hosting on and username and password . root is the default username and password is nothing by default .
     $con = new PDO("mysql:dbname=reflix;host=localhost","root","") ;
     //Now accessing a static property on the PDO object which is attribute errmode
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
  catch(PDOException $e){
      exit("Connection failed". $e->getMessage());
  }
  
?>