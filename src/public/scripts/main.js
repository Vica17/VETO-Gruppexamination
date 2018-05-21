//Print out all entries
async function getAllEntries() {
  let entry = await api.fetchData("entries");

  let container = document.getElementById("entries");

  for (var i = 0; i < entry.length; i++) {
    let d = buildData.entry(entry[i]);
    container.appendChild(d);
  }
}
getAllEntries();



async function getComments(entryID){
  let userComments = await api.fetchData("entries/" + entryID + "/comments");
  console.log(userComments);
}
async function getLikes(entryID){
  let userLikes = await api.fetchData("entries/" + entryID + "/likes");
  console.log(userLikes);
}


  async function getAllComments() {
    let userComments = await api.fetchData("comments");

    let div = document.getElementById("comments");

    //title
    let title = document.createElement("h2");
    let titleText = document.createTextNode("Comments");
    title.appendChild(titleText);
    div.appendChild(title);

    for(var i = 0; i < userComments.length; i++){

      let comment = buildData.comment(userComments[i]);
      div.appendChild(comment);
    }

  }

  async function getAllLikes() {
    let userLikes = await api.fetchData("likes");
    console.log(userLikes);
  }


// getComments(1);
// getAllLikes();
