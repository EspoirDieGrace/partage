
$('#inscription').click (function() {
    var emailMissing = "";
    var passwordMissing = "";
    var emailErrorMessage = "";
   
    /* Checking email validation */
    if ($("#userName").val() == "") {
      emailMissing = "L'adresse Email est vide!";  
      $("#emailMissing").html(emailMissing); 
  }
   
  if (validateEmail($("#userName").val()) == false) {    
    emailErrorMessage = "<p>Votre adresse Email n'est pas valide</p>";
      $("#emailError").html(emailErrorMessage);
  }
   
   /* Displaying email Error messages */
   if (emailMissing != "") {         
    $("#emailError").hide(); 
    $("#emailMissing").show();
  } else if (emailErrorMessage != "") {                   
    $("#emailError").show(); 
    $("#emailMissing").hide();
  } else{
    $("#emailError").hide(); 
    $("#emailMissing").hide();
  }
   
  /* Password validation */
  if ($("#pwd").val() == "") {
    passwordMissing = "le mot de passe est obligatoire!";
    $("#passwordMissing").html(passwordMissing);
  }
   
  /* Display password error message */
  if (passwordMissing != "") {                   
    $("#passwordMissing").show(); 
  }
  
  /* Display success message if there is no error */
  if (emailErrorMessage == "") {
    $("#successMessage").show();
    $("#errorMessage").hide();
  } else {
    $("#successMessage").hide();
    $("#errorMessage").show();
  }
  /* Displaying email Error messages */
  if (emailMissing != "") {         
    $("#emailError").hide(); 
    $("#emailMissing").show();
  } else if (emailErrorMessage != "") {                   
    $("#emailError").show(); 
    $("#emailMissing").hide();
  } else{
    $("#emailError").hide(); 
    $("#emailMissing").hide();
  }
   
  /* Password validation */
  if ($("#pwd").val() == "") {
    passwordMissing = "le mot de passe est obligatoire";
    $("#passwordMissing").html(passwordMissing);
  }
  
  /* Display password error message */
  if (passwordMissing != "") {                   
    $("#passwordMissing").show();  
  } 
  /* Display success message if there is no error */
  if (emailErrorMessage == "") {
    $("#successMessage").show();
    $("#errorMessage").hide();
  } else {
    $("#successMessage").hide();
    $("#errorMessage").show();
  }
  }
  );