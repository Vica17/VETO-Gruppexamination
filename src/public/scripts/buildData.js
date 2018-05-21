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
    let content = document.createElement("p");
    let contentInput = data["content"];
    let contentText = document.createTextNode(contentInput);
    content.appendChild(contentText);
    return content;
  }

  return {
    like: like,
    comment: comment
  };

})();
