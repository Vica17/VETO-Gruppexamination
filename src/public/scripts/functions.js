async function likePost(e){
  let data = {
    "entryID": e.target.elements["entryID"].value
  };
  let d = await api.postData("likes", data);
}
async function postComment(e) {
  console.log(e.target);
  let data = {
    "entryID": e.target.elements["entryID"].value,
    "content": e.target.elements["content"].value
  };

   api.postData("comments", data);
}
