const likeContainer = document.querySelector(".fav");
changeIfInFavourites(likeContainer);
const projectId = parseInt(likeContainer.id);

function giveLike() {
    changeHeart();
    fetch(`/like/${projectId}`);
}

function changeIfInFavourites(container){
    if(container.classList.contains("1"))
        changeHeart();
}

function changeHeart(){
    const symbol = likeContainer.firstElementChild.className;
    if(symbol === "far fa-heart")
        likeContainer.innerHTML = "<i class=\"fas fa-heart\">";
    else
        likeContainer.innerHTML = "<i class=\"far fa-heart\">";
}

likeContainer.addEventListener("click", giveLike);

