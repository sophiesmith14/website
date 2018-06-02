// On load
$(document).ready(function() {
  // whenever the user tries to submit the form

$("mainForm").on("submit", function() {
  // assume the form is valid, unless we find an invalid field
  formValid = true;
  // check if the first name is empty
   var firstNameIsValid = $("#firstName").prop("validity").valid;
  // if the first name field is valid (has text in it),
  if(firstNameIsValid) {
   // hide the error message
   $("#fnameError").hide();
  } else { // (otherwise, if the first name field is empty)
   // show the error message
   $("#fnameError").show();
   // and don’t let the user submit the form
   formValid = false; }
var lastNameIsValid = $("#lastName").prop("validity").valid;
    // if the last name field is valid (has text in it),
    if(lastNameIsValid) {
     // hide the error message
     $("#lnameError").hide();
   } else { // (otherwise, if the last name field is empty)
     // show the error message
     $("#lnameError").show();
     // and don’t let the user submit the form
     formValid = false;}
var messageIsValid = $("#message").prop("validity").valid;
      // if the message field is valid (has text in it),
      if(messageIsValid) {
       // hide the error message
       $("#messageError").hide();
     } else { // (otherwise, if the message field is empty)
       // show the error message
       $("#messageError").show();
       // and don’t let the user submit the form
       formValid = false;}

  // var checkboxChecked = $("#identity").prop("validity").valid;
       // if ("$identity").is(":checked") || $("#identity").is(":checked")) {
        // $("#checkboxError").hide();
      // } else {
        // $("#checkboxError").show();
        // formValid = false;

         }
       }
      }
  // if the form is valid, let the user submit it; otherwise, block submission
  return formValid;
});

});
