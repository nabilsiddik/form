const formBody = document.querySelector("#form_container .form-body")
allDragAreas = formBody.querySelectorAll('.upload-box')
firstDragArea = allDragAreas[0];
secondDragArea = allDragAreas[1];

firstDragArea.onclick = () => {
    firstDragArea.querySelector('input[type="file"]').click()
}
secondDragArea.onclick = () => {
    secondDragArea.querySelector('input[type="file"]').click()
}


