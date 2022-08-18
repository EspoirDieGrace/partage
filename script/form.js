$(document).ready(function(){
///button
$('button[id="inscription"]').attr('disabled',true);
$('input[id="userName"]' || 'input[id="pwd"]').on('keyup',function(){
if($(this).val()!=""){
  $('button[id="inscription"]').attr('disabled',false);
}else{
  $('button[id="inscription"]').attr('disabled',true);

}
})




///nom
$("#Name").keyup(function(){
  //les elements de username
  var regx_nom=/^([A-Z][A-Za-z' -àâ]+)/i;
  //verificationif()
  var nom_input=$(this).val();
  if(regx_nom.test(nom_input)){
      $("#nom_status").text("valid");
      $("#nom_status").removeClass("text-danger");
  }else{
      $("#nom_status").removeClass("text-danger");
      $("#nom_status").text("invalid");
      $('button[id="inscription"]').attr('disabled',true);
  }

});
///nom
$("#prenom").keyup(function(){
  //les elements de username
  var regx_nom=/^([A-Z][A-Za-z' -]+)/i;
  //verificationif()
  var nom_input=$(this).val();
  if(regx_nom.test(nom_input)){
      $("#prenom_status").text("valid");
      $("#prenom_status").removeClass("text-danger");
  }else{
      $("#prenom_status").removeClass("text-danger");
      $("#prenom_status").text("invalid");
      $('button[id="inscription"]').attr('disabled',true);
  }

});
///email
    $("#userName").keyup(function(){
        //les elements de username
        var regx_email=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
        //verificationif()
        var email_input=$(this).val();
        if(regx_email.test(email_input)){
            $("#email_status").text("valid");
            $("#email_status").removeClass("text-danger");
        }else{
            $("#email_status").removeClass("text-danger");
            $("#email_status").text("invalid");
            $('button[id="inscription"]').attr('disabled',true);
        }

    });
///password
$('input[type=password]').keyup(function() {
 // set password variable
 var pwd = $(this).val();
 //validate the length
if ( pwd.length < 8 ) {
 $('#length').removeClass('valid').addClass('invalid');
 $('button[id="inscription"]').attr('disabled',true);
} else {
 $('#length').removeClass('invalid').addClass('valid');
 $('button[id="inscription"]').attr('disabled',false);
}
//validate letter
if ( pwd.match(/[A-z]/) ) {
 $('#letter').removeClass('invalid').addClass('valid');
} else {
 $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pwd.match(/[A-Z]/) ) {
 $('#capital').removeClass('invalid').addClass('valid');
} else {
 $('#capital').removeClass('valid').addClass('invalid');
}

//validate number
if ( pwd.match(/\d/) ) {
 $('#number').removeClass('invalid').addClass('valid');
} else {
 $('#number').removeClass('valid').addClass('invalid');
}    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });
});
///email
function validateEmail(email) {  
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email); 
  };
///nom
function validateName(nom) {  
  var regexNom = /^([A-Z][A-Za-z' -]+)/;
  return regexNom.test(nom); 
};  
///prenom
function validateLastName(prenom) {  
  var regexPrenom = /^([A-Z][A-Za-z' -]+)/;
  return regexPrenom.test(prenom); 
};

    $("#successMessage").hide();
    $("#errorMessage").hide();

  $('#inscription').click (function() {
    var emailMissing = "";
    var passwordMissing = "";
    var emailErrorMessage = "";
    var nameErrorMessage = "";
    var lastnameErrorMessage = "";

    /* Checking email validation */
    if ($("#userName").val() == "") {
      emailMissing = "L'adresse Email est vide!";  
      $("#emailMissing").html(emailMissing); 
  }
   
  if (validateEmail($("#userName").val()) == false) {    
    emailErrorMessage = "<p>Votre adresse Email n'est pas valide</p>";
      $("#emailError").html(emailErrorMessage);
  }
  //verification name
  if (validateName($("#Name").val()) == false) {    
    nameErrorMessage = "<p>Votre nom n'est pas valide</p>";
      $("#nameError").html(nameErrorMessage);
  }
   //verification last name
   if (validateLastName($("#prenom").val()) == false) {    
    lastnameErrorMessage = "<p>Votre prenom n'est pas valide</p>";
      $("#lastNameError").html(lastnameErrorMessage);
  }
///::////////////////::::://////////::EMAIL
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
//////////////////////////password
  /* Password validation */
  if ($("#pwd").val() == "") {
    passwordMissing = "le mot de passe est obligatoire!";
    $("#passwordMissing").html(passwordMissing);
  }
   
  /* password missing */
  if (passwordMissing != "") {                   
    $("#passwordMissing").show(); 
  }


  ////////////////////////////nom
   /* Name no error */
  if (nameErrorMessage != "") {                   
    $("#nameError").show(); 
  } else{
    $("#nameError").hide(); 
  }
   
 ////////////////////////////prenom
   /* Name no error */
   if (lastnameErrorMessage != "") {                   
    $("#lastNameError").show(); 
  } else{
    $("#lastNameError").hide(); 
  }
  

  /* Display success message if there is no error */
  if (emailErrorMessage == "" && lastnameErrorMessage != "" && nameErrorMessage !="") {
    $("#successMessage").show();
    $("#errorMessage").hide();
  } else {
    $("#successMessage").hide();
    $("#errorMessage").show();
  }
});