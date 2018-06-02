<?php
// Get parameters from HTTP request
$HIDDEN_ERROR_CLASS = "hiddenError";

$submit = $_REQUEST["submit"];

if (isset($submit)) {
  error_log("form was submitted");
  $firstName = $_REQUEST["firstName"];
  if ( !empty($firstName) ) {
    $fnameValid = true;
  } else {
    $fnameValid = false;
  }

  $lastName = $_REQUEST["lastName"];
  if ( !empty($lastName) ) {
    $lnameValid = true;
  } else {
    $lnameValid = false;
  }

  // Handle email
  $message = $_REQUEST["message"];
  if ( !empty($message) ) {
    $messageValid = true;
  } else {
    $messageValid = false;
  }

  $checkbox = $_REQUEST["checkbox"];
  if ( !empty($checkbox) ){
    $checkboxChecked = true;
  } else {
    $checkboxChecked = false;
  }
  // the form is valid if the first name (and last name and message) is valid.
  $formValid = $fnameValid && $lnameValid && $messageValid;

  // if valid, allow submission
  if ($formValid) {
  session_start();
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  $_SESSION['message'] = $message;
  $_SESSION['checkbox'] = $checkbox;


    // redirect to to submit page
    header("Location: action_page.php");
    return;
  }
} else {
  error_log("form was not submitted");

  $fnameValid = true;
  $lnameValid = true;
  $messageValid = true;
  $checkboxChecked = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
<meta charset="UTF-8">
<title> <strong>Sophie Smith</strong> </title>
<!-- <script type="text/javascript" src="scripts/jquery-3.2.1.js"></script> -->
<!-- <script type="text/javascript" src="scripts/site.js"></script> -->
</head>
<body>

<h1> Contact me!</h1>
<?php
include("includes/navigation.php");
?>
<?php
 include "includes/aside.php";
?>
<figure>
        <img class="dems" alt="chelsea" src="images/chelsea.jpg"/>
        <figcaption class="dems">
          Meeting Chelsea Clinton at a campaign event <br/>
          Source: Cornell Democrats Instagram.
        </figcaption>
      </figure>
<p> Email sks277@cornell.edu or sophiesmith10196@gmail.com for references and inquires.</p>
<p> 914-330-3103 </p>
<p> Contact me! </p>
<form action="contact.php" method="post" id="mainForm" novalidate>
  <div class="labelAndInputHolder">
    <div class="labelHolder">
      <label for="firstName">First Name: * </label>
    </div>
    <div class="inputHolder">
      <input id="firstName" name="firstName" required value="<?php echo( htmlspecialchars( $firstName));?>" >
    </div>
    <span class="errorContainer <?php if ($fnameValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="fnameError">
      First Name is required.
    </span>
  </div>

  <div class="labelAndInputHolder">
    <div class="labelHolder">
      <label for="lastName">Last Name: * </label>
    </div>
    <div class="inputHolder">
      <input id="lastName" name="lastName" required value="<?php echo( htmlspecialchars($lastName));?>" >
    </div>
  </div>
  <span class="errorContainer <?php if ($lnameValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="lnameError">
          Last name is required.
        </span>

  I am a
  <div class="inputHolder">
  <input id="identity1" type="checkbox" name="identity" value="recruiter"
  <?php if ( identity == recruiter) {echo ("checked");}?> > Recruiter<br>
</div>
  <span class="errorContainer <?php if ($checkboxChecked) { echo($HIDDEN_ERROR_CLASS);} ?>" id="checkboxError">
          Identity is required.
        </span>
  <div class="inputHolder">
  <input id="identity2" type="checkbox" name="identity" value="peer"
  <?php if ( identity == peer) {echo ("checked");}?> > Peer <br>
</div>
<span class="errorContainer <?php if ($checkboxChecked) { echo($HIDDEN_ERROR_CLASS);} ?>" id="checkboxError">
        Identity is required.
      </span>
  <div class="inputHolder">
  <input id="identity3" type="checkbox" name="identity" value="other"
  <?php if ( identity ==other) {echo ("checked");}?> > Other <br>
</div>
   <span class="errorContainer <?php if ($checkboxChecked) { echo($HIDDEN_ERROR_CLASS);} ?>" id="checkboxError">
          Identity is required.
        </span>

<div class="labelAndInputHolder">
  <div class="labelHolder">
    <label for="message"> Message (please include your preferred contact information) * </label>
  </div>
  <div class="inputHolder">
    <input id="message" name="message" required value="<?php echo( htmlspecialchars($message));?>" >
</div>
<span class="errorContainer <?php if ($messageValid) { echo($HIDDEN_ERROR_CLASS);} ?>" id="messageError">
          Message is required.
        </span>
</div>

  <div>
    <button type="submit" name="submit" id="submit">Submit</button>
  </div>
</form>

<?php
include("includes/footer.php");
?>

</body>
</html>
