var img = document.getElementsByClassName('deleteEdit');
var input = document.querySelector('.toRemove');
var toDelete = [];
Array.from(img).forEach(i => {
    i.addEventListener('click', ()=>{
        var id = i.getAttribute('dataImg');
        toDelete.push(id);
        input.value = toDelete;
        i.style.display = "none";
    });
});