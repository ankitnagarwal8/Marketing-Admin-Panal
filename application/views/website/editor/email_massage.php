<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f4f4f4;
    }

    #text-editor {
      max-width: 800px;
      width: 100%;
      padding: 20px;
      box-sizing: border-box;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #editor-area {
      width: 100%;
      min-height: 200px;
      border: 1px solid #ccc;
      padding: 10px;
      box-sizing: border-box;
      margin-bottom: 10px;
      resize: vertical; /* Allow vertical resizing of the textarea */
    }

    select, input, button {
      margin: 5px;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    table, th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
  </style>
  <title>Simple Text Editor</title>
</head>
<body>
     <?php 

        $compaint_id = $_SESSION['compaint_id'];
        
      
      ?>
  

<form action='<?= base_url("USER/PROJECTMAIL/email_massage/".$compaint_id); ?>' method="post"  enctype="multipart/form-data">
  <div id="text-editor">
    <select id="heading-selector">
      <option value="h1">Heading 1</option>
      <option value="h2">Heading 2</option>
      <option value="h3">Heading 3</option>
      <option value="h4">Heading 4</option>
      <option value="h5">Heading 5</option>
      <option value="h6">Heading 6</option>
    </select>

    <input type="color" id="font-color-picker" />
    <input type="color" id="background-color-picker" />

    <button id="bold">Bold</button>
    <button id="italic">Italic</button>
    <button id="indent">Indent</button>
    <button id="outdent">Outdent</button>

    <select id="alignment-selector">
      <option value="left">Left</option>
      <option value="center">Center</option>
      <option value="right">Right</option>
    </select>

    <input type="file" name="files" id="image-input" />
    <input type="number" id="image-width" placeholder="Width" />
    <input type="number" id="image-height" placeholder="Height" />

    <button id="create-table">Create Table</button>
    <button id="increase-row">Increase Row Height</button>
    <button id="decrease-row">Decrease Row Height</button>
    <button id="increase-col">Increase Column Width</button>
    <button id="decrease-col">Decrease Column Width</button>
    

         <textarea id="editor-area" placeholder="Start typing..." name="massage"></textarea>
         <button type="submit">save</button>
         

   </form>
  </div>

  <script>
    function insertAtCursor(text) {
      const editor = document.getElementById('editor-area');
      const cursorPos = editor.selectionStart;
      const textBefore = editor.value.substring(0, cursorPos);
      const textAfter = editor.value.substring(cursorPos, editor.value.length);
      editor.value = textBefore + text + textAfter;
    }

    document.getElementById('heading-selector').addEventListener('change', function () {
      insertAtCursor(`<${this.value}>Selected Text</${this.value}>`);
    });

    document.getElementById('font-color-picker').addEventListener('input', function () {
      insertAtCursor(`<span style="color: ${this.value};">Selected Text</span>`);
    });

    document.getElementById('background-color-picker').addEventListener('input', function () {
      insertAtCursor(`<span style="background-color: ${this.value};">Selected Text</span>`);
    });

    document.getElementById('bold').addEventListener('click', function () {
      insertAtCursor('<strong>Selected Text</strong>');
    });

    document.getElementById('italic').addEventListener('click', function () {
      insertAtCursor('<em>Selected Text</em>');
    });

    document.getElementById('indent').addEventListener('click', function () {
      insertAtCursor('<blockquote>Selected Text</blockquote>');
    });

    document.getElementById('outdent').addEventListener('click', function () {
      // This is a simple example; you may need a more sophisticated approach for outdenting
      insertAtCursor('    Selected Text');
    });

    document.getElementById('alignment-selector').addEventListener('change', function () {
      insertAtCursor(`<div style="text-align: ${this.value};">Selected Text</div>`);
    });

    document.getElementById('image-input').addEventListener('change', function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          insertAtCursor(`<img src="${e.target.result}" alt="Image" />`);
        };
        reader.readAsDataURL(file);
      }
    });

    document.getElementById('create-table').addEventListener('click', function () {
      const rows = prompt('Enter number of rows:');
      const cols = prompt('Enter number of columns:');
      if (rows && cols) {
        let tableHTML = '<table>';
        for (let i = 0; i < rows; i++) {
          tableHTML += '<tr>';
          for (let j = 0; j < cols; j++) {
            tableHTML += '<td>Cell</td>';
          }
          tableHTML += '</tr>';
        }
        tableHTML += '</table>';
        insertAtCursor(tableHTML);
      }
    });

    document.getElementById('increase-row').addEventListener('click', function () {
      // Implement increasing row height if needed
    });

    document.getElementById('decrease-row').addEventListener('click', function () {
      // Implement decreasing row height if needed
    });

    document.getElementById('increase-col').addEventListener('click', function () {
      // Implement increasing column width if needed
    });

    document.getElementById('decrease-col').addEventListener('click', function () {
      // Implement decreasing column width if needed
    });
  </script>

</body>
</html>
