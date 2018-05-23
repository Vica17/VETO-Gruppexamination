async function createProfile(){
  // get username
  let username = window.location.pathname.split("/").slice(-1)[0];

  // get user
  let user = await api.fetchData("users/username/" + username);

  // if user does not exists
  if(user == false){
    let container = document.getElementById("profile-entries");
    let message = document.createElement("p");
      message.innerHTML = "Sorry. Can't find a user with that name.";
    container.appendChild(message);
    return false;
  }

  let entries = await api.fetchData("entries/user/" + user["userID"]);
  let comments = await api.fetchData("users/" + user["userID"] + "/comments");
  let likes = await api.fetchData("users/" + user["userID"] + "/likes");

  let header = document.getElementById("profile-info");
  let name = document.createElement("h1");
    name.innerHTML = username + "'s profile";
  header.appendChild(name);

  // if X is not empty -> print
  if(entries[0] != null){
    let container = document.getElementById("profile-entries");

    let title = document.createElement("h2");
      title.innerHTML = user["username"] + " posted:";
    container.appendChild(title);

    // create all entries
    entries.forEach(function (entry) {
      let d = buildData.entry(entry);
      container.appendChild(d);
    });

  }

  if(comments[0] != null){
    let container = document.getElementById("profile-comments");

    let title = document.createElement("h2");
      title.innerHTML = user["username"] + " commented on these posts:";
    container.appendChild(title);

    // create all likes
    comments.forEach(function (comment) {
      let d = buildData.comment(comment, true);
      container.appendChild(d);
    });

  }

  if(likes[0] != null){
    let container = document.getElementById("profile-likes");

    let title = document.createElement("h2");
      title.innerHTML = user["username"] + " liked:";
    container.appendChild(title);

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
