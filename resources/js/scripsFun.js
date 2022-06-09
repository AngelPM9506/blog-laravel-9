const froala_editorMin = require("froala-editor");

document.addEventListener('DOMContentLoaded',()=>{
    establecerFroala();
});
function establecerFroala() {
    var editorDes = document.querySelector('#editor-description') ?? false;
    var editorCont = document.querySelector('#editor-content') ?? false;
    if (editorDes && editorCont) {
        var editorD = new froala_editorMin(editorDes);
        var editorC = new froala_editorMin(editorCont);
    }
}