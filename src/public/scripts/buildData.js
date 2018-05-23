var buildData = ( function(){

  function like(data){
    let container = document.createElement("div");
      container.setAttribute("class", "like");

    let title = document.createElement("h2");
      title.setAttribute("class", "entry-title");

    let link = document.createElement("a");
      link.setAttribute("href", "/post/" + data["entryID"]);
      link.innerHTML = data["title"];

    title.appendChild(link);
    container.appendChild(title);
    return container;
  }

  function comment(data, showTitle = false){

    let container = document.createElement("div");
      container.setAttribute("class", "comment");

    let user = document.createElement("p");
      user.setAttribute("class", "user");
      user.innerHTML = "<b>" + data["username"] + " said:</b> " + data["content"];

    if(showTitle){
      let title = document.createElement("h2");
        title.setAttribute("class", "entry-title");

      let link = document.createElement("a");
        link.setAttribute("href", "/post/" + data["entryID"]);
        link.innerHTML = data["title"];

      title.appendChild(link);
      container.appendChild(title);
    }

    container.appendChild(user);

    if(isLoggedIn() && data["userID"] == userID()){
      let deleteForm = document.createElement("form");
        deleteForm.setAttribute("action","/api/comments");
        deleteForm.setAttribute("method","delete");
        deleteForm.setAttribute("class","delete-btn-form");
      let userHidden = document.createElement("input");
        userHidden.setAttribute("type","hidden");
        userHidden.setAttribute("name","commentID");
        userHidden.setAttribute("value", data["commentID"]);
      let deleteBtn = document.createElement("input");
        deleteBtn.setAttribute("type","submit");
        deleteBtn.setAttribute("value", "delete");
        deleteBtn.setAttribute("class", "deleteCommentButton");

      deleteForm.addEventListener("submit",function(e) {
        e.preventDefault(); deleteComment(e, container);
      });

      deleteForm.appendChild(deleteBtn);
      deleteForm.appendChild(userHidden);
      container.appendChild(deleteForm);
    }

    return container;
  }

  function entry(data){

    let newArticle = document.createElement("article");
      newArticle.setAttribute("class", "entry");

    // Delete + Edit Button button
    if(isLoggedIn() && data["userID"] == userID()){
      let editForm = document.createElement("form");
        editForm.setAttribute("action","/edit");
        editForm.setAttribute("method","POST");
        editForm.setAttribute("class","edit-btn-form");

      let editHidden = document.createElement("input");
        editHidden.setAttribute("type", "hidden");
        editHidden.setAttribute("value", data["entryID"]);
        editHidden.setAttribute("name", "entryID");

      let editContentHidden = document.createElement("input");
        editContentHidden.setAttribute("type", "hidden");
        editContentHidden.setAttribute("value", data["content"]);
        editContentHidden.setAttribute("name", "content");
      let editTitleHidden = document.createElement("input");
        editTitleHidden.setAttribute("type", "hidden");
        editTitleHidden.setAttribute("value", data["title"]);
        editTitleHidden.setAttribute("name", "title");

      let editInput = document.createElement("input");
        editInput.setAttribute("type", "submit");
        editInput.setAttribute("class", "editButton");
        editInput.setAttribute("value", "Edit");
        editInput.setAttribute("name", "editButton");

      let deleteEntryForm = document.createElement("form");
        deleteEntryForm.setAttribute("action","/entries/" +  data["entryID"] + "/entries");
        deleteEntryForm.setAttribute("method","delete");

      let deleteButtonHidden = document.createElement("input");
        deleteButtonHidden.setAttribute("type","hidden");
        deleteButtonHidden.setAttribute("name","entryID");
        deleteButtonHidden.setAttribute("value", data["entryID"]);

      let deleteButton = document.createElement("input");
        deleteButton.setAttribute("type", "submit");
        deleteButton.setAttribute("value", "Delete");
        deleteButton.setAttribute("class", "deleteEntryButton");

      deleteEntryForm.addEventListener("submit", function(e){
        e.preventDefault(); deleteEntry(e, newArticle);
      });

      editForm.appendChild(editHidden);
      editForm.appendChild(editTitleHidden);
      editForm.appendChild(editContentHidden);
      editForm.appendChild(editInput);
      newArticle.appendChild(editForm);

      deleteEntryForm.appendChild(deleteButton);
      deleteEntryForm.appendChild(deleteButtonHidden);
      newArticle.appendChild(deleteEntryForm);
    }

    //title
    let title = document.createElement("h2");
      title.setAttribute("class", "entry-title");

    let link = document.createElement("a");
      link.setAttribute("href", "/post/" + data["entryID"]);
      link.innerHTML = data["title"];

    title.appendChild(link);
    newArticle.appendChild(title);



    //creator
    let creator = document.createElement("p");
      creator.setAttribute("class", "entry-creator");
      creator.innerHTML = "Av: <a href=/profile/" + data["username"] + ">" + data["username"] + "</a> - " + data["createdAt"];
    newArticle.appendChild(creator);

    //date
    let created = document.createElement("p");
      created.setAttribute("class", "entry-date");
    let createdInput = "Skapad: " + data["createdAt"];
    let createdText = document.createTextNode(createdInput);
    created.appendChild(createdText);
    // newArticle.appendChild(created);

    //content
    let content = document.createElement("p");
      content.setAttribute("class", "entry-content");
    let contentInput = data["content"];
    let contentText = document.createTextNode(contentInput);
    content.appendChild(contentText);
    newArticle.appendChild(content);

    // Like button
    if(isLoggedIn()){
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
        likeInput.setAttribute("class", "likeButton");

      //Starts function likeEntry() after pushing like button
      likeForm.addEventListener("submit", function(e){
        e.preventDefault(); likeEntry(e);
      });

      likeForm.appendChild(likeHidden);
      likeForm.appendChild(userHidden);
      likeForm.appendChild(likeInput);
      newArticle.appendChild(likeForm);
    }


    // Post New Comment button
    if(isLoggedIn()){
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
        commentInput.setAttribute("class", "commentArea");
      let commentInputButton = document.createElement("input");
        commentInputButton.setAttribute("type","submit");
        commentInputButton.setAttribute("value","Comment");
        commentInputButton.setAttribute("name","commentButton");
        commentInputButton.setAttribute("class", "postCommentButton");

        commentForm.addEventListener("submit", function(e){
          e.preventDefault();
          postComment(e);
        });

      commentForm.appendChild(commentInput);
      commentForm.appendChild(commentHidden);
      commentForm.appendChild(commentHidden2);
      commentForm.appendChild(commentInputButton);
      newArticle.appendChild(commentForm);
    }



    // Show all comments button
    let getAllCommentsForm = document.createElement("form");
      getAllCommentsForm.setAttribute("action","/entries/" +  data["entryID"] + "/entries");
      getAllCommentsForm.setAttribute("method","post");
      getAllCommentsForm.setAttribute("class","all-comments-form");
    let commentButton = document.createElement("input");
      commentButton.setAttribute("type", "submit");
      commentButton.setAttribute("value", "Show all comments");
      commentButton.setAttribute("class","all-comment-btn-form");
      commentButton.setAttribute("class","getCommentsButton");
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

    return newArticle;
  }

  return {
    like: like,
    comment: comment,
    entry: entry
  };

})();
