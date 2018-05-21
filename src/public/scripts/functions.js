async function likePost(e){
  let data = {
    "entryID": e.target.elements["entryID"].value
  };
  let d = await api.postData("likes", data);
}
async function postComment(e) {

  console.log(e);
  console.log("hej det är kommentar");
}
