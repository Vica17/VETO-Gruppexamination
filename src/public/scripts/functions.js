var loginform = document.getElementById("login-form");
var logoutform = document.getElementById("register-form");
var logoutBtn = document.getElementById("logoutBtn");

let searchEntries = document.getElementById("search-entries");
let createNewEntry = document.getElementById("createNewEntry");
let postEntry = document.getElementById("post-entry");

let editEntryForm = document.getElementById("edit-entry-form");


// if on a page with a login form
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

// if on a page with a logout form
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

// if on a page with a login button
if(logoutBtn != null){
  logoutBtn.addEventListener("submit", (e) => {
    e.preventDefault();
    logout();
  });
}

if(searchEntries != null){ getEntriesFromSearch(); }
if(postEntry != null){ getEntriesFromID(); }

// if on a page with
if(editEntryForm != null){
  editEntryForm.addEventListener("submit", function(e){
    e.preventDefault();
    editEntry(e);
  });
}
if(createNewEntry != null){
  createNewEntry.addEventListener("submit", function(e){
    e.preventDefault();
    createANewEntry(e);
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
      localStorage.setItem("userID", a[0]);
      localStorage.setItem("isAdmin", a[1]);
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
    localStorage.clear();
    location.assign("/");
  });
}








// Like Functions
async function likeEntry(e){
  if(isLoggedIn()){
    let entryID = e.target.elements["entryID"].value;
    let question = await api.fetchData("entries/" + entryID + "/likes");
    let userID = localStorage.getItem("userID");

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

// Comments functions
async function postComment(e) {
  // in input in empty
  let input = e.target.elements["content"].value.trim();
  if(input.length <= 0){
    return false;
  } else {
    let data = {
      "entryID": e.target.elements["entryID"].value,
      "content": e.target.elements["content"].value
    };
    await api.postData("comments", data);
  }


}
async function deleteComment(e, loc) {
  let commentID = e.target.elements["commentID"].value;
  await api.deleteData("comments/" + commentID);
  loc.style.display = "none";
}


// Entry Functions
async function getAllEntryComments(e, loc){
  let entryID = e.target.elements["entryID"].value;
  let userComments = await api.fetchData("entries/" + entryID + "/comments");

  if(userComments[0] != null){
    userComments.forEach(function (entry) {
      let eachComment = buildData.comment(entry);
      loc.appendChild(eachComment);
    });
  } else {
    let comment = document.createElement("p");
      comment.innerHTML = "No Comments.";
    loc.appendChild(comment);
  }

  e.target.style.display = "none";
}
async function getEntriesFromSearch() {
  var key = getParameterByName('key');
  let data = await api.fetchData("entries/search/" + key);
  console.log(data);
  if(data[0] != null){
    data.forEach(function (d) {
      let res = buildData.entry(d);
      searchEntries.appendChild(res);
    });
  } else {
    let comment = document.createElement("p");
      comment.innerHTML = "No Results.";
    searchEntries.appendChild(comment);
  }

}
async function getEntriesFromID() {
  let key = window.location.pathname.split("/").slice(-1)[0];
  let data = await api.fetchData("entries/" + key);

  if(data != false){
    let res = buildData.entry(data);
    postEntry.appendChild(res);
  } else {
    let res = document.createElement("p");
      res.innerHTML = "Sorry. There is no post with that ID.";
    postEntry.appendChild(res);
  }

}

async function deleteEntry(e, loc) {
let entryID = e.target.elements["entryID"].value;
 await api.deleteData("entries/" + entryID);
 loc.style.display = "none";
}

async function createANewEntry(e){
  let data = {
    "title": e.target.elements["title"].value,
    "content": e.target.elements["content"].value,
    "createdBy": e.target.elements["createdBy"].value
  };
  api.postData("entries", data);
  location.assign("/");
}



async function editEntry(e){

  let entryID = e.target.elements["entryID"].value;
  let data = {
    "title": e.target.elements["title"].value,
    "content": e.target.elements["content"].value,
    "createdBy": e.target.elements["userID"].value
  };

  fetch("/api/entries/" + entryID, {
    method: "PATCH",
    body: JSON.stringify(data),
    credentials: "include",
    headers: {
      "Accept": "application/json, text/plain, */*",
      "Content-Type": "application/json"
    }
  })
  .then( async function(data){
    console.log("Your Post has been updated!");
    location.assign("/post/" + entryID);
  })
  .catch( async function(){
    console.log("Opps! Something went wrong!");
  });
}
