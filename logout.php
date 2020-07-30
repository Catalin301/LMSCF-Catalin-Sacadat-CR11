<?php
session_start();
if (!isset($_SESSION['user'])) {
 header( "Location: login.php");
}  else if(isset($_SESSION[ 'user'])!="" && $_SESSION['user'] == 1) {
 header("Location: indexadmin.php");
} else if(isset($_SESSION[ 'user'])!="") {
 header("Location: index.php");
} 

if  (isset($_GET['logout'])) {
 unset($_SESSION['user' ]);
 session_unset();
 session_destroy();
 header("Location: login.php");
 exit;
}
?>