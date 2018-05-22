


function getCookieByName(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}


function userID(){
  let a = getCookieByName("userID");
  console.log(a);
}

function isAdmin(){
  let a = getCookieByName("isAdmin");
  if(a == true){ return true; }
  else { return false; }
}


userID();
console.log(isAdmin());
