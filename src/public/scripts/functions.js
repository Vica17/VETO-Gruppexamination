

var loginform = document.getElementById("login-form");
var logoutform = document.getElementById("register-form");
var logoutBtn = document.getElementById("logoutBtn");



if(loginform != null){
  loginform.addEventListener("submit", (e) => {
    e.preventDefault();
    var data = {
      "username": e.target.elements["username"].value,
      "password": e.target.elements["password"].value
    };
    login(data);
  });
}

if(logoutform != null){
  logoutform.addEventListener("submit", (e) => {
    e.preventDefault();
    var data = {
      "username": e.target.elements["username"].value,
      "password": e.target.elements["password"].value
    };
    register(data);
  });
}

if(logoutBtn != null){
  logoutBtn.addEventListener("submit", (e) => {
    e.preventDefault();
    logout();
  });
}





async function login(data){
  fetch("/login", {
    method: "POST",
    body: JSON.stringify(data),
    credentials: "include",
    headers: {
      "Accept": "application/json, text/plain, */*",
      "Content-Type": "application/json"
    }
  })
  .then( async function(data) {
    let a = await data.json();
    if(a != false){
      sessionStorage.setItem("userID", a[0]);
      sessionStorage.setItem("isAdmin", a[1]);
      location.reload();
    }
    else {
      console.log("Opps something went wrong.");
    }
  })
  .catch(async function(){
    console.log("Opps something went wrong.");
  });
}

async function register(data){
  fetch("/register", {
    method: "POST",
    body: JSON.stringify(data),
    credentials: "include",
    headers: {
      "Accept": "application/json, text/plain, */*",
      "Content-Type": "application/json"
    }
  });
}

async function logout(){
  fetch("/logout", {
    method: "GET",
    credentials: "include",
    headers: {
      "Accept": "application/json, text/plain, */*",
      "Content-Type": "application/json"
    }
  })
  .then( async function() {
    sessionStorage.clear();
    location.reload();
  });
}









async function likePost(e){

  // if logged in
  if(isLoggedIn()){
    // get data from form
    let entryID = e.target.elements["entryID"].value;

    // fetch all like data from server + get userID from sessionStorage
    let question = await api.fetchData("entries/" + entryID + "/likes");
    let userID = sessionStorage.getItem("userID");

    // filter data after userID
    let a = question.filter(like => like.userID == userID);

    // if the result is not empty
    if(a[0] != null) {
      // find all data and send data to route
      let data = { "entryID": entryID };
      api.deleteData("likes/" + question[0].likeID, data);

      // remove class "liked" from like button
    }
    // if the result is empty
    else {
      // find all data and post a new like to database
      let data = { "entryID": entryID };
      api.postData("likes", data);

      // add class "liked" from like button
    }

  }

  // if user has already liked -> remove like
  // else -> add like




}
async function postComment(e) {

  let data = {
    "entryID": e.target.elements["entryID"].value,
    "content": e.target.elements["content"].value
  };

  api.postData("comments", data);

}



async function getAllEntryComments(e, loc){

  let entryID = e.target.elements["entryID"].value;

  let userComments = await api.fetchData("entries/" + entryID + "/comments");

  userComments.forEach(function (entry) {
    let eachComment = buildData.comment(entry);
    loc.appendChild(eachComment);
  });

  e.target.style.display = "none";

}
