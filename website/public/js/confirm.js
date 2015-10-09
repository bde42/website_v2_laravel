var classname = document.getElementsByClassName("button-confirm");

var getConfirmation = function() {
    if (!confirm("Are you sure?")){
        event.preventDefault();
    }
};

for(var i=0;i<classname.length;i++){
    classname[i].addEventListener('click', getConfirmation, false);
}