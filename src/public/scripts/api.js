const api = ( function(){

  async function fetchData(url){
    var promise = await fetch("api/" + url);
    var data = await promise.json();
    return data;
  }

  async function postData(url, data){
    fetch("api/" + url,{
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Accept": "application/json, text/plain, */*",
        "Content-Type": "application/json"
      }
    }).then( function() {
      console.log("Request success!");
    });
  }

  async function deleteData(url){
    fetch("api/" + url, {
      method: "DELETE"
    }).then( function() {
      console.log("Deleted!");
    });
  }

  return{
    fetchData: fetchData,
    postData: postData,
    deleteData: deleteData
  };

})();


async function test() {
  let userEntries = await api.fetchData("entries");
  console.log(userEntries);
}


test();




// IDEA
// to fetch, post or delete data all you have to do is to use theses methods
// Make sure the data you send to postData is JSON

// api.fetchData(URL)
// api.postData(URL, DATA)
// api.deleteData(URL)
