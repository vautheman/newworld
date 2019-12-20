// Fonction de vérification formulaire client
// On déclare la fonction qui vérifie les mails
function verifMail()
{
  // Ca fonctionne
  // vérification email
  var inputEmail = document.getElementById('userMail');
  var erreurMsgMail = document.getElementById('userErreurMsgMail');
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

function verifMailRegister()
{
  var registerEmail = document.getElementById('registerMail');
  var registerErreurMsgMail = document.getElementById('registerErreurMsgMail');
  if (registerEmail.value.indexOf("@") == -1 || registerEmail.value.indexOf(".") == -1) {
    registerErreurMsgMail.style.visibility="visible";
    registerEmail.classList.remove("is-valid");
    registerEmail.classList.add("is-invalid");
  }
  else {
    registerEmail.classList.remove("is-invalid");
    registerEmail.classList.add("is-valid");
    registerErreurMsgMail.style.visibility="hidden";
  }
}

function verifPwRegister()
{
  // Verification mot de passe
  var pw1 = document.getElementById('RegisterPassword');
  var erreurMsgPw = document.getElementById('registerErreurMsgPw');
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

function verifPw()
{
  // Verification mot de passe
  var pw1 = document.getElementById('userPassword');
  var erreurMsgPw = document.getElementById('userErreurMsgPw');
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

function verifPwConfirm()
{
  var pw1 = document.getElementById('userPassword');
  var pw2 = document.getElementById('userPasswordConfirm');
  var erreurMsgPwConfirm = document.getElementById('userErreurMsgPwConfirm');
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
