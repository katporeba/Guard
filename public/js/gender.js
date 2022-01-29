elementsWoman = document.getElementsByClassName("woman");
elementsMan = document.getElementsByClassName("man");

for (var i = 0; i < elementsWoman.length; i++) {
    elementsWoman[i].innerHTML = '<i class="fas fa-venus"></i>';
}

for (i = 0; i < elementsMan.length; i++) {
    elementsMan[i].innerHTML = '<i class="fas fa-mars"></i>';
}

sliderArray = document.getElementsByClassName("progress-bar");
for (i=0;i<sliderArray.length;i++)
    sliderArray[i].style.width = sliderArray[i].id * 20 + "%";