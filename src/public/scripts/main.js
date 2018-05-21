//Print out all entries
getAllEntries();
async function getAllEntries() {
  let entry = await api.fetchData("entries");
  console.log(entry);

    //loop through all entries
    for (var i = 0; i < entry.length; i++) {
      let div = document.getElementById("entries");
      let newArticle = document.createElement("article");
        newArticle.setAttribute("class", "entry");
      div.appendChild(newArticle);

      //title
      let title = document.createElement("h2");
        title.setAttribute("class", "entry-title");
      let titleInput = entry[i].title;
      let titleText = document.createTextNode(titleInput);
      title.appendChild(titleText);
      newArticle.appendChild(title);

      //creator
      let creator = document.createElement("p");
        creator.setAttribute("class", "entry-creator");
      let creatorInput = "Skriven av: " + entry[i].username;
      let creatorText = document.createTextNode(creatorInput);
      creator.appendChild(creatorText);
      newArticle.appendChild(creator);

      //date
      let created = document.createElement("p");
        created.setAttribute("class", "entry-date");
      let createdInput = "Skapad: " + entry[i].createdAt;
      let createdText = document.createTextNode(createdInput);
      created.appendChild(createdText);
      newArticle.appendChild(created);

      //content
      let content = document.createElement("p");
        content.setAttribute("class", "entry-content");
      let contentInput = entry[i].content;
      let contentText = document.createTextNode(contentInput);
      content.appendChild(contentText);
      newArticle.appendChild(content);

      //Like button
      let likeForm = document.createElement("form");
        likeForm.setAttribute("action","/api/likes");
        likeForm.setAttribute("method","post");
        likeForm.setAttribute("class","like-btn-form");
      let likeHidden = document.createElement("input");
        likeHidden.setAttribute("type","hidden");
        likeHidden.setAttribute("name","entryID");
        likeHidden.setAttribute("value", entry[i].entryID);
      let likeInput = document.createElement("input");
        likeInput.setAttribute("type","submit");
        likeInput.setAttribute("value","Like");
        likeInput.setAttribute("name","likeButton");
      likeForm.appendChild(likeHidden);
      likeForm.appendChild(likeInput);
      newArticle.appendChild(likeForm);

      //Get all comments button
      let commentButton = document.createElement("input");
        commentButton.setAttribute("type", "button");
        commentButton.setAttribute("value", "Show all comments");
        commentButton.setAttribute("onclick", "getComments(1)");
        commentButton.setAttribute("class","all-comment-btn-form");
      newArticle.appendChild(commentButton);

      //Comment button
      let commentForm = document.createElement("form");
        commentForm.setAttribute("action","/comments");
        commentForm.setAttribute("method","post");
        commentForm.setAttribute("class","new-comment-btn-form");
      let commentHidden = document.createElement("input");
        commentHidden.setAttribute("type","hidden");
        commentHidden.setAttribute("name","userID");
        commentHidden.setAttribute("value", entry[i].userID);
      let commentInput = document.createElement("input");
        commentInput.setAttribute("type","input");
      let commentInputButton = document.createElement("input");
        commentInputButton.setAttribute("type","submit");
        commentInputButton.setAttribute("value","Comment");
        commentInputButton.setAttribute("name","commentButton");
      commentForm.appendChild(commentInput);
      commentForm.appendChild(commentHidden);
      commentForm.appendChild(commentInputButton);
      newArticle.appendChild(commentForm);

    }
  }



async function getComments(entryID){
  let userComments = await api.fetchData("entries/" + entryID + "/comments");
  console.log(userComments);
}
async function getLikes(entryID){
  let userLikes = await api.fetchData("entries/" + entryID + "/likes");
  console.log(userLikes);
}


  async function getAllComments() {
    let userComments = await api.fetchData("comments");

    let div = document.getElementById("comments");

    //title
    let title = document.createElement("h2");
    let titleText = document.createTextNode("Comments");
    title.appendChild(titleText);
    div.appendChild(title);

    for(var i = 0; i < userComments.length; i++){

      let comment = buildData.comment(userComments[i]);
      div.appendChild(comment);
    }

  }

  async function getAllLikes() {
    let userLikes = await api.fetchData("likes");
    console.log(userLikes);
  }

/*
getComments(1);
getAllLikes();
*/
