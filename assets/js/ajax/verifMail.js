function verifMailExist(){
  // Mail utilisateur
  var mail = document.getElementById('form0_emailControl');
  $.post(
    'assets/php/verifMailAJAX.php',
    {
      userMail : mail.value
    },

    function(data){
      if(data == "failed")
      {
        $("#form0_emailMsg").html("The email address already exists !");
        mail.classList.remove("is-valid");
        mail.classList.remove("is-valid");
        mail.classList.add("is-invalid");
      } else {
        $("#msgMailExist").html("");
        mail.classList.remove("is-invalid");
        mail.classList.add("is-valid");
      }
    },

    'text'
  );
}

function formNextVerifMailExist(mail){
  $.post(
    'assets/php/verifMailAJAX.php',
    {
      userMail : mail.value
    },

    function(data){
      if(data == "failed")
      {
        $("#formNext_emailMsg").html("The email address already exists !");
        mail.classList.remove("is-valid");
        mail.classList.add("is-invalid");
      } else {
        $("#formNext_emailMsg").html("");
        mail.classList.remove("is-invalid");
        mail.classList.add("is-valid");
      }
    },

    'text'
  );
}
