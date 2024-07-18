function bold(){
    var textarea = document.getElementById('message');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var newText = textarea.value.substring(0, start) + '*' + selectedText + '*' + textarea.value.substring(end);
    textarea.value = newText;
}
function strikethrough(){
    var textarea = document.getElementById('message');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var newText = textarea.value.substring(0, start) + '~' + selectedText + '~' + textarea.value.substring(end);
    textarea.value = newText;
}
function italic(){
    var textarea = document.getElementById('message');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var newText = textarea.value.substring(0, start) + '_' + selectedText + '_' + textarea.value.substring(end);
    textarea.value = newText;
}
function monospace(){
    var textarea = document.getElementById('message');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var newText = textarea.value.substring(0, start) + '```' + selectedText + '```' + textarea.value.substring(end);
    textarea.value = newText;
}