const monPanier = [];
var panier_length = document.getElementById('panier-length');

function addCart(idProduit)
{
  monPanier.push(idProduit);
  document.getElementById('panier-length').innerHTML = monPanier.length;
  //document.getElementById('panierContient').innerHTML = "<li>"++"</li>";
  //alert(monPanier);
}
