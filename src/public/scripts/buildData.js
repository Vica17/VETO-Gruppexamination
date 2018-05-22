var buildData = ( function(){

  function like(data){
    let container = document.createElement("div");
      container.setAttribute("class", "like");

    let title = document.createElement("h4");
      title.innerHTML = data["title"];

    container.appendChild(title);
    return container;
  }

  function comment(data){
    let container = document.createElement("div");
      container.setAttribute("class", "comment");

    let user = document.createElement("p");
      user.setAttribute("class", "user");
      user.innerHTML = "<b>" + data["username"] + " said:</b> " + data["content"];

    container.appendChild(user);
    return container;
  }

  function entry(data){

    let newArticle = document.createElement("article");
      newArticle.setAttribute("class", "entry");

    //Delete entry button
    let deleteEntryForm = document.createElement("form");
      deleteEntryForm.setAttribute("action","/entries/" +  data["entryID"] + "/entries");
      deleteEntryForm.setAttribute("method","post");
    let deleteButton = document.createElement("input");
      deleteButton.setAttribute("type", "submit");
      deleteButton.setAttribute("value", "Delete entry");
      deleteButton.setAttribute("class", "deleteEntryButton");
    let deleteButtonHidden = document.createElement("input");
      deleteButtonHidden.setAttribute("type","hidden");
      deleteButtonHidden.setAttribute("name","entryID");
      deleteButtonHidden.setAttribute("value", data["entryID"]);
    deleteEntryForm.appendChild(deleteButton);
    deleteEntryForm.appendChild(deleteButtonHidden);

    //adds delete function to delete likeButton
    deleteEntryForm.addEventListener("submit", function(e){
      e.preventDefault(); deleteEntry(e, commentLoadLocation);
    });
    
    newArticle.appendChild(deleteEntryForm);

    //title
    let title = document.createElement("h2");
      title.setAttribute("class", "entry-title");
    let titleInput = data["title"];
    let titleText = document.createTextNode(titleInput);
    title.appendChild(titleText);
    newArticle.appendChild(title);

    //creator
    let creator = document.createElement("p");
      creator.setAttribute("class", "entry-creator");
    let creatorInput = "Skriven av: " + data["username"];
    let creatorText = document.createTextNode(creatorInput);
    creator.appendChild(creatorText);
    newArticle.appendChild(creator);

    //date
    let created = document.createElement("p");
      created.setAttribute("class", "entry-date");
    let createdInput = "Skapad: " + data["createdAt"];
    let createdText = document.createTextNode(createdInput);
    created.appendChild(createdText);
    newArticle.appendChild(created);

    //content
    let content = document.createElement("p");
      content.setAttribute("class", "entry-content");
    let contentInput = data["content"];
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
      likeHidden.setAttribute("value", data["entryID"]);
    let userHidden = document.createElement("input");
      userHidden.setAttribute("type","hidden");
      userHidden.setAttribute("name","userID");
      userHidden.setAttribute("value", data["userID"]);
    let likeInput = document.createElement("input");
      likeInput.setAttribute("type","submit");
      likeInput.setAttribute("value","Like");
      likeInput.setAttribute("name","likeButton");

    //Starts function likePost() after pushing like button
    likeForm.addEventListener("submit", function(e){
      e.preventDefault(); likePost(e);
    });

    likeForm.appendChild(likeHidden);
    likeForm.appendChild(userHidden);
    likeForm.appendChild(likeInput);
    newArticle.appendChild(likeForm);

    //Get all comments button
    let getAllCommentsForm = document.createElement("form");
      getAllCommentsForm.setAttribute("action","/entries/" +  data["entryID"] + "/entries");
      getAllCommentsForm.setAttribute("method","post");
      getAllCommentsForm.setAttribute("class","all-comments-form");
    let commentButton = document.createElement("input");
      commentButton.setAttribute("type", "submit");
      commentButton.setAttribute("value", "Show all comments");
      commentButton.setAttribute("class","all-comment-btn-form");
    let getAllCommentsHidden = document.createElement("input");
      getAllCommentsHidden.setAttribute("type","hidden");
      getAllCommentsHidden.setAttribute("name","entryID");
      getAllCommentsHidden.setAttribute("value", data["entryID"]);

    let commentLoadLocation = document.createElement("div");
      commentLoadLocation.setAttribute("class", "comments-load-location");

    getAllCommentsForm.addEventListener("submit", function(e){
      e.preventDefault(); getAllEntryComments(e, commentLoadLocation);
    });

    getAllCommentsForm.appendChild(commentButton);
    getAllCommentsForm.appendChild(getAllCommentsHidden);
    newArticle.appendChild(getAllCommentsForm);
    newArticle.appendChild(commentLoadLocation);

    //Comment button
    let commentForm = document.createElement("form");
      commentForm.setAttribute("action","/comments");
      commentForm.setAttribute("method","post");
      commentForm.setAttribute("class","new-comment-btn-form");
    let commentHidden = document.createElement("input");
      commentHidden.setAttribute("type","hidden");
      commentHidden.setAttribute("name","userID");
      commentHidden.setAttribute("value", data["userID"]);
    let commentHidden2 = document.createElement("input");
      commentHidden2.setAttribute("type","hidden");
      commentHidden2.setAttribute("name","entryID");
      commentHidden2.setAttribute("value", data["entryID"]);
    let commentInput = document.createElement("textarea");
      commentInput.setAttribute("type","input");
      commentInput.setAttribute("name","content");
    let commentInputButton = document.createElement("input");
      commentInputButton.setAttribute("type","submit");
      commentInputButton.setAttribute("value","Comment");
      commentInputButton.setAttribute("name","commentButton");

      commentForm.addEventListener("submit", function(e){
        e.preventDefault();
        postComment(e);
      });

    commentForm.appendChild(commentInput);
    commentForm.appendChild(commentHidden);
    commentForm.appendChild(commentHidden2);
    commentForm.appendChild(commentInputButton);
    newArticle.appendChild(commentForm);

    return newArticle;
  }

  return {
    like: like,
    comment: comment,
    entry: entry
  };

})();
