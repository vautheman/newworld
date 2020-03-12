function adresseInput(){
  // info utilisateur
  var mail = document.getElementById('userMail').value;

  // info relai
  var adresse = document.getElementById("relaiAdresse").value;
  var ville = document.getElementById("relaiVille").value;
  alert(adresse);

  var oReq = new XMLHttpRequest();
  //oReq.onload = reqListener;
  oReq.open("get", "https://api-adresse.data.gouv.fr/search/?q="+adresse+"+"+ville, true);
  oReq.responseType = 'json';
  oReq.send();

  oReq.onload = function(){
    var jsonDoc = oReq.response;
    var coordX = jsonDoc['features'][0]['geometry']['coordinates'][0];
    var coordY = jsonDoc['features'][0]['geometry']['coordinates'][1];
    //alert("X:" + coordX + " y:" + coordY);
    addCoordBdd(coordX, coordY, mail);
  }
}

// Ajout dans la base de données
function addCoordBdd(x, y, mail){
  $.ajax({
    // chargement du fichier externe pour la connexion à la base de données et effectuer la requête
    url: "assets/php/datagouv-coordAJAX.php",
    // Passage des données au fichier externe (ici le type chargé)
    type: 'post',
    data: ({
      relayCoordX: x,
      relayCoordY: y,
      userMail: mail
      //userKey: key
    }),
    success: function(){

    }
  });
}
