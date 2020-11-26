<?php require_once "../init.php";
require_once  "headerLocation.php";
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email       = trim($_POST['email']);
  $password    = md5(trim($_POST['password']));
  $remember_me = trim($_POST['remember_me']);

  $query     = $db->prepare("SELECT  Email, username, password  FROM account WHERE Email = :Email AND password = :password ");
  
  $sql_query = $query->execute(['Email'=>$email, 'password'=>$password]);
  if (!$sql_query) {
    die("field query" . $db->errorInfo());
  }
  while ($row = $query->fetch()) {
    $username      = $row['username'];
    $loginEmail    = $row['Email'];
    $passwordLogin = $row['password'];
  }

  if ($password == $passwordLogin) {
    $_SESSION['username']    = $username;
    $_SESSION['Email']    = $loginEmail;
    $_SESSION['password'] = $passwordLogin;
    if ($remember_me === 'remember_me') {
      $hour = time() + 3600 * 24 * 30;
      $cookieUser     = 'username';
      $cookiePassword = 'password';
      setcookie($cookieUser, $username, $hour);
      setcookie($cookiePassword, $passwordLogin, $hour);
    }
    header("Location:login.php");
  } else {
    $_SESSION['error'] = "<p class='text-danger text-center'>username or password not correct</p>";
        header("Location:../index.php");
?>
      <?php

    }
  } else {
    header("Location:../index.php");

  }

      ?>