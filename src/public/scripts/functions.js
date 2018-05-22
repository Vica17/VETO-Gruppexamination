

var loginform = document.getElementById("login-form");
var logoutform = document.getElementById("register-form");
var logoutBtn = document.getElementById("logoutBtn");

let searchEntries = document.getElementById("search-entries");
let postEntry = document.getElementById("post-entry");



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

if(searchEntries != null){
  getPostsFromSearch();
}
if(postEntry != null){
  getPostsFromID();
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
    location.assign("/");
  });
}









async function likePost(e){
  if(isLoggedIn()){
    let entryID = e.target.elements["entryID"].value;
    let question = await api.fetchData("entries/" + entryID + "/likes");
    let userID = sessionStorage.getItem("userID");

    let a = question.filter(like => like.userID == userID);

    if(a[0] != null) {
      let data = { "entryID": entryID };
      api.deleteData("likes/" + question[0].likeID, data);
    }
    else {
      let data = { "entryID": entryID };
      api.postData("likes", data);
    }
  }
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


async function getPostsFromSearch() {
  if(searchEntries != null){
    var key = getParameterByName('key');
    let data = await api.fetchData("entries/search/" + key);
    data.forEach(function (d) {
      let res = buildData.entry(d);
      searchEntries.appendChild(res);
    });
  }
}

async function getPostsFromID() {
  let key = window.location.pathname.split("/").slice(-1)[0];

  let data = await api.fetchData("entries/" + key);
  let res = buildData.entry(data);
  postEntry.appendChild(res);

  let comments = await api.fetchData("entries/" + data.entryID + "/comments");
  comments.forEach(function (d) {
    let res = buildData.comment(d);
    postEntry.appendChild(res);
  });
}

async function deleteComment(e, loc) {
let commentID = e.target.elements["commentID"].value;
 await api.deleteData("comments/" + commentID);
 loc.style.display = "none";
}

async function deleteEntry(e, loc) {
let entryID = e.target.elements["entryID"].value;
 await api.deleteData("entries/" + entryID);
 loc.style.display = "none";
}
