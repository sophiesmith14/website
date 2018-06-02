<?php
session_start();
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$message = $_SESSION['message'];
$checkbox = $_SESSION['checkbox'];

unset($_SESSION['firstName']);
unset($_SESSION['message']);

$fullName = $firstName . " " . $lastName;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
<script type="text/javascript" src="scripts/jquery-3.2.1.js"></script>
<script type="text/javascript" src="scripts/site.js"></script>
</head>
  <h1> Form Submitted </h1>
  <?php
  include("includes/navigation.php");
  ?>

      <p>
      Thank you <?php echo( htmlspecialchars( $firstName) ); ?> <?php echo( htmlspecialchars( $lastName) ); ?> for your message: <?php echo( htmlspecialchars( $message) ); ?>
      <p>

        <?php
        include("includes/footer.php");
        ?>
</html>
