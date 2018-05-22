


function getCookieByName(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}


function userID(){
  let a = sessionStorage.getItem("userID");
  return a;
}

function isAdmin(){
  let a = sessionStorage.getItem("userID");
  if(a == true || a == 1){ return true; }
  else { return false; }
}

function isLoggedIn(){
  let a = sessionStorage.getItem("userID");
  if(a){ return true; }
  else { return false; }
}
