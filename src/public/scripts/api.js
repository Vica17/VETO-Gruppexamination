var api = (function (){

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


async function test() {

  let userEntries = await api.get("users");
  console.log(userEntries);

}


test();
