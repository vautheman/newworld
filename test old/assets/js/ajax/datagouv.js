var coord = [],
    adresse,
    ville,
    mail;

function cMail(){
  mail = document.getElementById('formNext_emailControl').value;
  mail = JSON.stringify(mail);
  alert(JSON.parse(mail));
  return mail;
}

function cAdresse(){
  adresse = document.getElementById("relaiAdresse").value;
  adresse = JSON.stringify(adresse);
  return adresse;
}

function cVille(){
  ville = document.getElementById("relaiVille").value;
  ville = JSON.stringify(ville);
  return ville;
}

function adresseInput(){
  var oReq = new XMLHttpRequest();
  //oReq.onload = reqListener;
  oReq.open("get", "https://api-adresse.data.gouv.fr/search/?q="+adresse+"+"+ville, true);
  oReq.responseType = 'json';
  oReq.send();

  oReq.onload = function(){
    var jsonDoc = oReq.response;
    var coordX = jsonDoc['features'][0]['geometry']['coordinates'][0];
    var coordY = jsonDoc['features'][0]['geometry']['coordinates'][1];
    coord = [coordX, coordY];
    coord = JSON.stringify(coord);
    alert(JSON.parse(coord)[0]);
  }
  return coord;
}

function test(){
  alert(JSON.parse(adresse) + " " + JSON.parse(ville));
  adresseInput();
}

// Ajout dans la base de données
function addCoordBdd(){
  alert(JSON.parse(adresse)+" "+JSON.parse(ville)+" "+JSON.parse(mail));
  alert("X:" + JSON.parse(coord)[0] + " Y:" + JSON.parse(coord)[1]);
  $.ajax({
    // chargement du fichier externe pour la connexion à la base de données et effectuer la requête
    url: "assets/php/datagouv-coordAJAX.php",
    // Passage des données au fichier externe (ici le type chargé)
    type: 'post',
    data: ({
      relayCoordX: coord[0],
      relayCoordY: coord[1],
      userMail: mail
      //userKey: key
    }),
    success: function(){

    }
  });
}
