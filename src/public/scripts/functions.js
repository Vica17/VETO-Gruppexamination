async function likePost(e){
  let data = {
    "entryID": e.target.elements["entryID"].value
  };
  let d = await api.postData("likes", data);
}
