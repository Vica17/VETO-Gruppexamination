
async function getAllComments() {
  let userComments = await api.fetchData("comments");
  console.log(userComments);
}
async function getAllLikes() {
  let userLikes = await api.fetchData("likes");
  console.log(userLikes);
}


 async function deleteComment(id)
{
  let deleteOneComment = await api.fetchData("comments")+id;
  console.log(deleteOneComment);
}
async function creteComments (res,name) {
  
}

getAllComments();
getAllLikes();
deleteComment();

/*var api2 = (function (){

  async function get(route) {
    return await fetch("api/" + route)
      .then(res => res.json())
      .then( function(res) {
        return res;
      });
  }

  return{
    get: get
  };

})();
function getAllEntries(){
  fetch('api/entries')
    .then(res => res.json())
    .then(console.log);
}*/

/*
function postEntires(){
  const formData = new FormData();
  const entriesInput = document.getElementById('entriesInput');
  formData.append('content', entriesInput.value);


const postOptions = {
    method: 'POST',
    body: formData,
    credentials: 'include'
  }
fetch('api/entries',postOptions)
.then(res => res.json())
.then((newEntry) => {
  document.body.insertAdjacentHTML('beforeend', newEntry.data.content);
});
}*/
