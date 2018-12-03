<?php
session_start();
include "lib/constants.php";
include "lib/validation-functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blissful Rooming</title>
  <meta charset="utf-8">
  <meta name="author" content="Connor Allan and Sam Nguon">
  <meta name="description" content="Rooming made easier">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/custom_css.css" type="text/css" media="screen">

  <?php
  // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
  //
  // inlcude all libraries.
  // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
  //$user = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8");
  print "<!-- require Database.php -->";

  require_once(BIN_PATH . '/Database.php');

  // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
  //
  // Set up database connection
  //
  // generally you dont need the admin on the web

  print "<!-- make Database connections -->";
  $dbUserName = 'crallan_reader';
  $whichPass = "r"; //flag for which one to use.
  $dbName = DATABASE_NAME;

  $thisDatabaseReader = new Database($dbUserName, $whichPass, $dbName);

  $dbUserName = 'crallan_writer';
  $whichPass = "w";
  $thisDatabaseWriter = new Database($dbUserName, $whichPass, $dbName);
  ?>
</head>

<!-- **********************     Body section      ********************** -->
<?php
$email = htmlentities($_SESSION['email'], ENT_QUOTES, "UTF-8");
$pass = htmlentities($_SESSION['password'], ENT_QUOTES, "UTF-8");
// $query = 'SELECT fldpassword FROM tblUsers WHERE pmkEmail= ?'; //Takes user's input for email to find matching password
$data = array($email);
// $results = $thisDatabaseReader->select($query, $data, 1, 0, 0, 0, FALSE, FALSE);
$Qpass = $results[0]['fldpassword'];
// if ($Qpass !== $pass) {
if(FALSE){
  header('Location: https://crallan.w3.uvm.edu/blissfulrooming/lib/login.php');
}
if (DEBUG) {
  echo '<pre>';
  print_r($_SESSION);
  echo 'results';
  print_r($results);
  echo '</pre>';
}
print '<body id="' . $PATH_PARTS['filename'] . '">';
?>
<header id=header>
<img src="media/980x.jpg" alt="Blissful Rooming Logo">
<h1>Blissful Rooming</h1>
<h4>Rooming made easier</h4>
</header>
