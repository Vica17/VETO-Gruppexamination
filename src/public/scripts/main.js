

//Print out or entries
async function getAllEntries() {
  let entry = await api.fetchData("entries")
  console.log(entry);

  for (var i = 0; i < entry.length; i++) {
    let div = document.getElementById("entries");
    let newArticle = document.createElement("article");
    div.appendChild(newArticle);


    //title
    let title = document.createElement("h2");
    let titleInput = entry[i].title;
    let titleText = document.createTextNode(titleInput);
    title.appendChild(titleText);
    newArticle.appendChild(title);

    //creator
    let creator = document.createElement("h5");
    let creatorInput = entry[i].username;
    let creatorText = document.createTextNode(creatorInput);
    creator.appendChild(creatorText);
    newArticle.appendChild(creator);

    //date
    let created = document.createElement("h5");
    let createdInput = "Skapad: " + entry[i].createdAt;
    let createdText = document.createTextNode(createdInput);
    created.appendChild(createdText);
    newArticle.appendChild(created);

    //content
    let content = document.createElement("p");
    let contentInput = entry[i].content;
    let contentText = document.createTextNode(contentInput);
    content.appendChild(contentText);
    newArticle.appendChild(content);


    console.log(titleInput);
  }

/*

const article = document.createElement("div");
 //article.setAttribute("class", "post-wrapper");
 const tag1 = document.createElement("h4");
 const text1 = res[i].username;
 const textNode1 = document.createTextNode(text1);
 tag1.appendChild(textNode1);
 article.appendChild(tag1);
 mainParent.appendChild(article);
*/

  }
  async function getAllComments() {
    let userComments = await api.fetchData("comments");
    console.log(userComments);
  }
  async function getAllLikes() {
    let userLikes = await api.fetchData("likes");
    console.log(userLikes);
  }
getAllEntries();
getAllComments();
getAllLikes();
