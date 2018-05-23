


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function userID(){
  let a = localStorage.getItem("userID");
  return a;
}

function isAdmin(){
  let a = localStorage.getItem("isAdmin");
  if(a == true || a == 1){ return true; }
  else { return false; }
}

function isLoggedIn(){
  let a = localStorage.getItem("userID");
  if(a){ return true; }
  else { return false; }
}
