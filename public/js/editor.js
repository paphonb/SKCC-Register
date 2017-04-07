require.config({ paths: { 'vs': '/js/monaco-editor/min/vs' }});
require(['vs/editor/editor.main'], function() {
  var editor = monaco.editor.create(document.getElementById('editor'), {
    value: [
      '#include <iostream>',
      '',
      'int main() {',
      '    std::cout << "Hello world!";',
      '    return 0;',
      '}'
    ].join('\n'),
    language: 'cpp'
  });
  editor.addAction({
    id: 'submit',
    label: 'Submit',
    keybindings: [monaco.KeyCode.F9],
    keybindingContext: null,
    contextMenuGroupId: 'modification',
    contextMenuOrder: 1.5,
    run: submitCode
  });
  editor.onKeyUp(onCodeChange);
  function onCodeChange() {
    $('#sourceCode').val(editor.getValue());
  }
  onCodeChange();
});

function submitCode () {
  $('#sourceForm').submit();
}
