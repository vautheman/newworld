var bgColors = [
    "linear-gradient(to right, #00b09b, #96c93d)",
    "linear-gradient(to right, #ff5f6d, #ffc371)",
  ],
  i = 0;

// Options for the toast
var options = {
  text: "Votre produit a été ajouté au panier",
  duration: 2500,
  close: true,
};



function notif(){
  // Initializing the toast
  var myToast = Toastify(options);

  // Toast after delay
  setTimeout(function() {
    myToast.showToast();
  });
}

// Displaying toast on manual action `Try`
document.getElementById("new-toast").addEventListener("click", function() {
  Toastify({
    text: "I am a toast",
    duration: 3000,
    close: i % 3 ? true : false,
    backgroundColor: bgColors[i % 2],
  }).showToast();
  i++;
});
