var badge = document.getElementById("badge-role");
var badge_header = document.getElementById("badge-role-header");
if(badge.textContent == "administrateur"){
  badge.classList.add("badge-danger");
  badge_header.classList.add("badge-danger");
}
else if(badge.textContent == "producteur" || badge.textContent == "point relai"){
  badge.classList.add("badge-primary");
  badge_header.classList.add("badge-primary");
}
else if(badge.textContent == "client"){
  badge.classList.add("badge-success");
  badge_header.classList.add("badge-success");
}
