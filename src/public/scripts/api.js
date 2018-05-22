const api = ( function(){

  async function fetchData(url){
    var promise = await fetch("/api/" + url);
    var data = await promise.json();
    return data;
  }

  async function postData(url, data){
    fetch("/api/" + url,{
      method: "POST",
      body: JSON.stringify(data),
      credentials: "include",
      headers: {
        "Accept": "application/json, text/plain, */*",
        "Content-Type": "application/json"
      }
    }).then( function() {
      console.log("Posted!");
    });
  }

  async function patchData(url, data) {
    fetch("/api/" + url,{
      method: "PATCH",
      body: JSON.stringify(data),
      credentials: "include",
      headers: {
        "Accept": "application/json, text/plain, */*",
        "Content-Type": "application/json"
      }
    }).then( function() {
      console.log("Patch success!");
    });
  }

  async function deleteData(url){
    fetch("/api/" + url, {
      method: "DELETE"
    }).then( function() {
      console.log("Deleted!");
    });
  }

  return{
    fetchData: fetchData,
    postData: postData,
    patchData: patchData,
    deleteData: deleteData
  };

})();


// IDEA
// to fetch, post or delete data all you have to do is to use theses methods
// Make sure the data you send to postData is JSON

// api.fetchData(URL)
// api.postData(URL, DATA)
// api.patchData(URL, DATA)
// api.deleteData(URL)
