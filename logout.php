<?php
  session_start();
  session_destroy();

  unset($_COOKIE["login"]);
  setcookie("login","login",time()-1);

  header('Location: index.php');
 ?>
