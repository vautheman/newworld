// FORM 0
function form0_ifPasswordIsGood(){
    var submit = document.getElementById("form0_submit");
    var password = document.getElementById("form0_pwdControl");
    var error = document.getElementById("form0_pwdMsg");

    // Si le mot de passe contient au moins une minuscule
    if(/(?=.*[a-z])/.test(password.value))
    {
      error.innerHTML = "";
      password.classList.remove("is-invalid");
      password.classList.add("is-valid");

      // Si le mot de passe contient au moins une majuscule
      if(/(?=.*[A-Z])/.test(password.value))
      {
        error.innerHTML = "";
        password.classList.remove("is-invalid");
        password.classList.add("is-valid");

        // Si le mot de passe contient au moins un chiffre
        if(/(?=.*[0-9])/.test(password.value))
        {
          error.innerHTML = "";
          password.classList.remove("is-invalid");
          password.classList.add("is-valid");

          // Si le mot de passe contient au moins un caractère spécial
          if(/(?=.[!@#\$%\^&*])/.test(password.value))
          {
            error.innerHTML = "";
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");

            // Si le mot de passe fait au minimum 8 caractères
            if(/(?=.{8,})/.test(password.value))
            {
              error.innerHTML = "";
              password.classList.remove("is-invalid");
              password.classList.add("is-valid");
              return true;
            } else {
              error.innerHTML = "The string must be eight characters or longer";
              password.classList.remove("is-valid");
              password.classList.add("is-invalid");
            }
          } else {
            error.innerHTML = "The string must contain at least one special character";
            password.classList.remove("is-valid");
            password.classList.add("is-invalid");
          }
        } else {
          error.innerHTML = "The string must contain at least 1 numeric character";
          password.classList.remove("is-valid");
          password.classList.add("is-invalid");
        }
      } else {
        error.innerHTML = "The string must contain at least 1 uppercase alphabetical character";
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
      }
    } else {
      error.innerHTML = "The string must contain at least 1 lowercase alphabetical character";
      password.classList.remove("is-valid");
      password.classList.add("is-invalid");
    }

//    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(password.value))
//    {
//      error.innerHTML = "";
//      password.classList.remove("is-invalid");
//      password.classList.add("is-valid");
//    } else {
//      error.innerHTML = "The password must contain at least 8 characters as well as: 1 upper case, 1 lower case, 1 number and a special character.";
//      password.classList.remove("is-valid");
//      password.classList.add("is-invalid");
//    }
}

function form0_ifMailIsGood(){
  var email = document.getElementById('form0_emailControl');
  var error = document.getElementById('form0_emailMsg');
  var submit = document.getElementById('form0_submit');

  if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)) {
    error.innerHTML = "";
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
    verifMailExist(email);
    return true;
  } else {
    error.innerHTML = "The email address is invalid !";
    email.classList.remove("is-valid");
    email.classList.add("is-invalid");
    submit.disabled = true;
  }
}

function formNext_ifPasswordIsGood(){
    var submit = document.getElementById("formNext_submit");
    var password = document.getElementById("formNext_pwdControl");
    var error = document.getElementById("formNext_pwdMsg");
    // Si le mot de passe contient au moins une minuscule
    if(/(?=.*[a-z])/.test(password.value))
    {
      error.innerHTML = "";
      password.classList.remove("is-invalid");
      password.classList.add("is-valid");

      // Si le mot de passe contient au moins une majuscule
      if(/(?=.*[A-Z])/.test(password.value))
      {
        error.innerHTML = "";
        password.classList.remove("is-invalid");
        password.classList.add("is-valid");

        // Si le mot de passe contient au moins un chiffre
        if(/(?=.*[0-9])/.test(password.value))
        {
          error.innerHTML = "";
          password.classList.remove("is-invalid");
          password.classList.add("is-valid");

          // Si le mot de passe contient au moins un caractère spécial
          if(/(?=.[!@#\$%\^&*])/.test(password.value))
          {
            error.innerHTML = "";
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");

            // Si le mot de passe fait au minimum 8 caractères
            if(/(?=.{8,})/.test(password.value))
            {
              error.innerHTML = "";
              password.classList.remove("is-invalid");
              password.classList.add("is-valid");
              return true;
            } else {
              error.innerHTML = "The string must be eight characters or longer";
              password.classList.remove("is-valid");
              password.classList.add("is-invalid");
            }
          } else {
            error.innerHTML = "The string must contain at least one special character";
            password.classList.remove("is-valid");
            password.classList.add("is-invalid");
          }
        } else {
          error.innerHTML = "The string must contain at least 1 numeric character";
          password.classList.remove("is-valid");
          password.classList.add("is-invalid");
        }
      } else {
        error.innerHTML = "The string must contain at least 1 uppercase alphabetical character";
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
      }
    } else {
      error.innerHTML = "The string must contain at least 1 lowercase alphabetical character";
      password.classList.remove("is-valid");
      password.classList.add("is-invalid");
    }

//    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(password.value))
//    {
//      error.innerHTML = "";
//      password.classList.remove("is-invalid");
//      password.classList.add("is-valid");
//    } else {
//      error.innerHTML = "The password must contain at least 8 characters as well as: 1 upper case, 1 lower case, 1 number and a special character.";
//      password.classList.remove("is-valid");
//      password.classList.add("is-invalid");
//    }
}

function formNext_ifPasswordIsSimilar(){
  var password1 = document.getElementById("formNext_pwdControl");
  var password2 = document.getElementById("formNext_pwdConfirm");
  var error = document.getElementById("formNext_pwdConfirmMsg");
  if(password2.value === password1.value)
  {
    error.innerHTML = "";
    password2.classList.remove("is-invalid");
    password2.classList.add("is-valid");
  } else {
    error.innerHTML = "Passwords are not identical";
    password2.classList.remove("is-valid");
    password2.classList.add("is-invalid");
  }
}

function formNext_ifMailIsGood(){
  var email = document.getElementById('formNext_emailControl');
  var error = document.getElementById('formNext_emailMsg');

  if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)) {
    error.innerHTML = "";
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
    formNextVerifMailExist(email);
  } else {
    error.innerHTML = "The email address is invalid !";
    email.classList.remove("is-valid");
    email.classList.add("is-invalid");
  }
}

function form0_submitIsValid(){
  var submit = document.getElementById("form0_submit");
  var email = document.getElementById("form0_emailControl");
  var password = document.getElementById("form0_pwdControl");

  if(~(' ' + email.className + ' ').indexOf(' is-invalid '))
  {
    alert("fail");
  }
  else alert("ok");
}
