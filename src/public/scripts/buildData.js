var buildData = ( function(){

  function like(data){
    let container = document.createElement("div");
      container.setAttribute("class", "like");

    let title = document.createElement("h4");
      title.innerHTML = data["title"];

    container.appendChild(title);
    return container;
  }

  return {
    like: like
  };

})();
