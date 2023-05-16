<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
  
   $newURL="https://coolkaki.com/2021-22/rahman-group/investor-relations.php";
  header('Location: '.$newURL);
?>