async function createProfile(){
  // get username
  let username = window.location.pathname.split("/").slice(-1)[0];

  // get user
  let user = await api.fetchData("users/username/" + username);

  // if user does not exists
  if(user == false){ return false; }

  let entries = await api.fetchData("entries/user/" + user["userID"]);
  let comments = await api.fetchData("users/" + user["userID"] + "/comments");
  let likes = await api.fetchData("users/" + user["userID"] + "/likes");

  // if X is not empty -> print
  if(entries[0] != null){
    let container = document.getElementById("profile-entries");
    let menu = document.getElementById("profile-menu");

    let button = document.createElement("button");
      button.innerHTML = "All Entries";
    menu.appendChild(button);

    // create all entries
    entries.forEach(function (entry) {
      let d = buildData.entry(entry);
      container.appendChild(d);
    });

  }

  if(comments[0] != null){
    let container = document.getElementById("profile-comments");
    let menu = document.getElementById("profile-menu");

    let button = document.createElement("button");
    button.innerHTML = "All Comments";
    menu.appendChild(button);

    // create all likes
    comments.forEach(function (comment) {
      let d = buildData.comment(comment);
      container.appendChild(d);
    });

  }

  if(likes[0] != null){
    let container = document.getElementById("profile-likes");
    let menu = document.getElementById("profile-menu");

    let button = document.createElement("button");
      button.innerHTML = "All Likes";
    menu.appendChild(button);

    // create all likes
    likes.forEach(function (like) {
      let d = buildData.like(like);
      container.appendChild(d);
    });

  }



















  // Patch Function

    // let entryID = 11;
    // let data = {
    //   "title": "This is the title",
    //   "content": "This data was sent with javascript again again again !!!!",
    //   "createdBy": 1
    // };

    // api.patchData("entries/" + entryID, data);

}

createProfile();

  // get user info
  // get elements
  // print user info in elements
// else
  // error
