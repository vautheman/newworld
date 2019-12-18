// Fonction de vérification formulaire client
// On déclare la fonction qui vérifie les mails
function client_verifMail()
{
  // Ca fonctionne
  // vérification email
  var inputEmail = document.getElementById('cliEmail');
  var erreurMsgMail = document.getElementById('cliErreurMsgMail');
  if (inputEmail.value.indexOf("@") == -1 || inputEmail.value.indexOf(".") == -1) {
    erreurMsgMail.style.visibility="visible";
    inputEmail.classList.remove("is-valid");
    inputEmail.classList.add("is-invalid");
  }
  else {
    inputEmail.classList.remove("is-invalid");
    inputEmail.classList.add("is-valid");
    erreurMsgMail.style.visibility="hidden";
  }
}

function client_verifPw()
{
  // Verification mot de passe
  var pw1 = document.getElementById('cliPassword');
  var erreurMsgPw = document.getElementById('cliErreurMsgPw');
  // Pattern password
  var re = new RegExp('\\w+');

  // taille du mot de passe
  if(pw1.value.length < 8 && re.test && re.lastIndex == 0)
  {
    erreurMsgPw.style.visibility="visible";
    pw1.classList.remove("is-valid");
    pw1.classList.add("is-invalid");
  }
  else {
    erreurMsgPw.style.visibility="hidden";
    pw1.classList.remove("is-invalid");
    pw1.classList.add("is-valid");
  }
}

function client_verifPwConfirm()
{
  var pw1 = document.getElementById('cliPassword');
  var pw2 = document.getElementById('cliPasswordConfirm');
  var erreurMsgPwConfirm = document.getElementById('cliErreurMsgPwConfirm');
  // correspondance des deux mots de passe
  if(pw1.value != pw2.value)
  {
    erreurMsgPwConfirm.style.visibility="visible";
    pw2.classList.remove("is-valid");
    pw2.classList.add("is-invalid");
  }
  else {
    erreurMsgPwConfirm.style.visibility="hidden";
    pw2.classList.remove("is-invalid");
    pw2.classList.add("is-valid");
  }
}

function prod_verifMail()
{
  // Ca fonctionne
  // vérification email
  var inputEmail = document.getElementById('prodEmail');
  var erreurMsgMail = document.getElementById('prodErreurMsgMail');
  if (inputEmail.value.indexOf("@") == -1 || inputEmail.value.indexOf(".") == -1) {
    erreurMsgMail.style.visibility="visible";
    inputEmail.classList.remove("is-valid");
    inputEmail.classList.add("is-invalid");
  }
  else {
    inputEmail.classList.remove("is-invalid");
    inputEmail.classList.add("is-valid");
    erreurMsgMail.style.visibility="hidden";
  }
}

function prod_verifPw()
{
  // Verification mot de passe
  var pw1 = document.getElementById('prodPassword');
  var erreurMsgPw = document.getElementById('prodErreurMsgPw');
  // Pattern password
  var re = new RegExp('\\w+');

  // taille du mot de passe
  if(pw1.value.length < 8 && re.test && re.lastIndex == 0)
  {
    erreurMsgPw.style.visibility="visible";
    pw1.classList.remove("is-valid");
    pw1.classList.add("is-invalid");
  }
  else {
    erreurMsgPw.style.visibility="hidden";
    pw1.classList.remove("is-invalid");
    pw1.classList.add("is-valid");
  }
}

function prod_verifPwConfirm()
{
  var pw1 = document.getElementById('prodPassword');
  var pw2 = document.getElementById('prodPasswordConfirm');
  var erreurMsgPwConfirm = document.getElementById('prodErreurMsgPwConfirm');
  // correspondance des deux mots de passe
  if(pw1.value != pw2.value)
  {
    erreurMsgPwConfirm.style.visibility="visible";
    pw2.classList.remove("is-valid");
    pw2.classList.add("is-invalid");
  }
  else {
    erreurMsgPwConfirm.style.visibility="hidden";
    pw2.classList.remove("is-invalid");
    pw2.classList.add("is-valid");
  }
}

function verifIdentite()
{
    // Vérification identité
    var inputNom = document.getElementById('nom').value;

    if(inputNom > 1){
      inputNom.classList.add("is-valid");
    }
}

function statutInput()
{
  var inputStatut = document.getElementById('inputStatut');
  var divProducteur = document.getElementById('divProducteur');

  if(inputStatut.value == "Producteur")
  {
    divProducteur.style.visibility="visible";
  }
  else {
    divProducteur.style.visibility="hidden";
  }
}

function rejoindre()
{
  var btnRejoindre = document.getElementById('btnRejoindre');
  var email = document.getElementById('cliEmail').value;
  var password = document.getElementById('cliPassword').value;
  var check1 = document.getElementById('check1').checked;
  var check2 = document.getElementById('check2').checked;
  if(check1==false || email.length<=1 || password.length<8)
  {
    btnRejoindre.setAttribute("disabled", "");
  }
  else {
    btnRejoindre.removeAttribute("disabled");
  }
}
