var badge_header = document.getElementById("badge-role-header");
if(badge_header.textContent == "administrateur"){
  badge_header.classList.add("badge-danger");
}
else if(badge_header.textContent == "producteur" || badge_header.textContent == "point relain"){
  badge_header.classList.add("badge-primary");
}
else if(badge_header.textContent == "client"){
  badge_header.classList.add("badge-success");
}
