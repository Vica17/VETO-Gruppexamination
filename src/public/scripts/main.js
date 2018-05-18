var api2 = (function (){

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
}
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
}
