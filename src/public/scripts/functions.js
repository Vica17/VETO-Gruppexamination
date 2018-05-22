async function likePost(e){

  let entryID = e.target.elements["entryID"].value;
  let userID = e.target.elements["userID"].value;

  let data = {
    "entryID": entryID
  };
  api.postData("likes", data);



  // if user has already liked -> remove like
  // else -> add like

  let question = await api.fetchData("entries/" + entryID + "/likes");
  console.log(question);


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
