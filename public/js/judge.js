function loadFile(event) {
    var file = event.target.files[0];
    if (!(file instanceof File)) return;
    var reader = new FileReader();
    reader.addEventListener("loadend", function () {
        document.getElementById('sourceCode').value = reader.result;
    });
    reader.readAsText(file, 'UTF-8');
}
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('inputFile').addEventListener('change', loadFile, false);
}, false);