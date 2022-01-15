const search = document.querySelector('#scroll-down');
const projectContainer = document.querySelector("#posts");
let text = {};
let iter = 0;

search.addEventListener("click", eventHandler);
document.onkeydown = function(e){
    if(e.keyCode === 13){
        eventHandler(e);
    }
};

function eventHandler (event) {
    text = {};
    event.preventDefault();

    getFormInput();
    console.log(text);

    fetch('/searchBy', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(text)
    }).then(function (response) {
        return response.json();
    }).then(function (projects) {
        projectContainer.innerHTML = "";
        loadProjects(projects);
    });
}

function getFormInput() {
    getCheckedRadio("rGroup");
    getCheckedCheckboxes("genderCheck");
    returnGender(text);
    getInputValue("local", "", "%");
    getCheckedCheckboxes("Color");
    getInputValue("age", '20', '20');
    getHealth("healthy");
    getCheckedCheckboxes("chooseSize");
    getValueFromSelect("filter");
}

function getCheckedCheckboxes(name) {
    checkboxes = document.getElementsByName(name);
    selectedCboxes = Array.prototype.slice.call(checkboxes).filter( ch => ch.checked === true);
    iter = 0;
    // if (selectedCboxes.length == 0)
    //     text = Object.assign({}, text, {[name] : "%"});
    // else
    selectedCboxes.forEach(getValueFromCheckbox);
}

function getValueFromCheckbox(item) {
    tmpObject = {[item.name+"_"+iter++] : item.value};
    text = Object.assign({}, text, tmpObject);
}

function returnGender(arrayAll) {
    if(arrayAll['genderCheck_0']!==undefined && arrayAll['genderCheck_1']!==undefined)
        tmpObject = {'gender' : '%'};
    else if (arrayAll['genderCheck_0']!==undefined)
        tmpObject = {'gender' : arrayAll['genderCheck_0']};
    else if (arrayAll['genderCheck_1']!==undefined)
        tmpObject = {'gender' : arrayAll['genderCheck_1']};
    else
        tmpObject = {'gender' : '%'};
    text = Object.assign({}, text, tmpObject);
}

function getCheckedRadio(name) {
    radio = document.querySelector('input[name='+name+']:checked');
    if(radio===null || radio.value=="all" )
        tmpObject = {[name] : '%'};
    else
        tmpObject = {[radio.name] : radio.value};

    text = Object.assign({}, text, tmpObject);
}


function getInputValue(name, check, allSymbol) {
    item = document.querySelector("input[name="+name+"]");
    if(item.value!==check)
        tmpObject = {[item.name] : item.value};
    else
        tmpObject = {[item.name]: allSymbol};
    text = Object.assign({}, text, tmpObject);
}

function getHealth(name) {
    item = document.querySelector("input[name="+name+"]");
    if(item.value=="healthy" && item.checked)
        tmpObject = {[item.name] : 'Zdrowy/a'};
    else
        tmpObject = {[item.name] : '%'};
    text = Object.assign({}, text, tmpObject);

}

function getValueFromSelect(name) {
    item = document.querySelector("select[name="+name+"]");
    tmpObject = {[item.name] : item.value};
    text = Object.assign({}, text, tmpObject);
}

function loadProjects(projects) {
    for(var i=0; i<projects.length; i++) {
        if (i===0) {
            const templateFirst = document.querySelector("#project-template-first");
            const cloneFirst = templateFirst.content.cloneNode(true);

            createFirstProject(projects[i], cloneFirst);
            projectContainer.appendChild(cloneFirst);
        }
        else {
            const templateSecond = document.querySelector("#project-template-second");
            const cloneSecond = templateSecond.content.cloneNode(true);

            createSecondProject(projects[i], cloneSecond);
            projectContainer.appendChild(cloneSecond);
        }
    }
}

function createFirstProject(project, clone) {
    createSecondProject(project, clone);
    const postTitle = clone.querySelector("#post-title");
    postTitle.innerHTML = project.title + " poszukuje domu";
    const postDesc = clone.querySelector("#post-description");
    postDesc.innerHTML = project.description;
    const postShelter = clone.querySelector("#shelter-name");
    postShelter.innerHTML += project.city;
    const postAddress = clone.querySelector("#shelter-address");
    postAddress.innerHTML += project.street + " " + project.street_number;
    const sliderArray = clone.querySelectorAll(".progress-bar");
    sliderArray[0].id = project.requires_attention;
    sliderArray[1].id = project.accepts_children;
    sliderArray[2].id = project.accepts_animals;
    sliderArray[3].id = project.energy_level;
    for (i=0;i<sliderArray.length;i++)
        sliderArray[i].style.width = sliderArray[i].id * 20 + "%";
}

function createSecondProject(project, clone) {
    const setId = clone.querySelector(".post");
    setId.id = project.id_Project;
    setId.setAttribute("onclick", "location.href=\"/post/"+setId.id+"\"");
    const image = clone.querySelector("img");
    image.src = '/public/uploads/'+project.photo;
    const postName = clone.querySelector(".post-name");
    postName.innerHTML = project.name;
    const gender = postName.nextElementSibling;
    gender.classList.toggle(project.gender);
    addGenderSymbol(gender);
    const local = clone.querySelector(".post-text");
    local.innerHTML = project.city;
    const age = clone.querySelector(".post-age");
    age.innerHTML = "Lat: " + project.age;
    const size = clone.querySelector(".post-size");
    size.innerHTML = project.size;
    const health = clone.querySelector(".post-health");
    health.innerHTML = project.health;
    const date = clone.querySelector(".post-date");
    date.innerHTML = "Dodano: "+project.created_at;
}

function addGenderSymbol(element) {
    if (element.className === "woman") {
        element.innerHTML = '<i class="fas fa-venus"></i>';
    }
    else
        element.innerHTML = '<i class="fas fa-mars"></i>';
}