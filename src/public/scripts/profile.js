async function test(){
  // get username
  let username = window.location.pathname.split("/").slice(-1)[0];

  // get user
  let user = await api.fetchData("users/username/" + username);
  console.log(user);

  // if user exists
  if(user != false){
    console.log("User found");
    console.log(user["username"]);
  } else {
    console.log("User not found");
  }
}

test();

  // get user info
  // get elements
  // print user info in elements
// else
  // error
