const postArray = document.getElementsByClassName("post");
for (var i=0;i<postArray.length;i++) {
    postArray[i].setAttribute("onclick","location.href='/post/"+postArray[i].id+"'");
}