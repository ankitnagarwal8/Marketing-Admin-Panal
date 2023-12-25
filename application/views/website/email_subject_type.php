<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="https://github.com/JiHong88" />
    <meta name="keywords" content="wysiwyg,editor,javascript,suneditor,wysiwyg eidtor,rich text editor,html editor,contenteditable,위지위그 에디터 웹에디터">
    <meta name="description" content="Pure javascript wysiwyg web editor" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6933506635175446" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W0R51STQTY"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-W0R51STQTY');
    </script>
    <title>SunEditor</title>
    <!-- sample css -->
    <link rel="stylesheet" href="./css/bootstrap.css" media="all">
    <link rel="stylesheet" href="./css/sample.css" media="all">
    <!-- suneditor -->
    <link href="../dist/css/suneditor.min.css" rel="stylesheet">
    <!-- codeMirror -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/lib/codemirror.min.css">
    <!-- KaTeX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/katex.min.css">
    <style>
        .tab {
            overflow: hidden;
            color: #f4b124;
            font-weight: bold;
            border-bottom: 2px solid #f4b124;
            border-radius: 2px;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: transparent;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 35px;
            transition: 0.3s;
            font-size: 16px;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            margin: 0;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            color: #f5f5f5;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            color: #fff;
            background-color: #f4b124;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
        }

        /* inline editor */
        .inline-margin {
            margin-top: 10px;
        }

        @media (max-width: 560px) {
            .tab button {
                padding: 12px 24px;
            }
        }
        @media (max-width: 475px) {
            .tab button {
                padding: 12px 16px;
            }
        }
        @media (max-width: 407px) {
            .tab button {
                padding: 12px 10px;
            }
        }
        @media (max-width: 380px) {
            .tab button {
                padding: 12px 8px;
            }
        }
    </style>
</head>
<body>
    <h1>Enter your subject</h1>
<form action="" method="post" enctype="">
<div class="content" style="max-width: 1550px;">
    
    <div id="classic" class="tabcontent" style="display: block;">
        <div class="inline-margin"></div>
        <textarea id="editor_classic" style="display:none;">
            
        </textarea>

        <div class="inline-margin"></div>
        <textarea id="editor_inline3" style="display:none;" name="subject">
            <p><br></p>
            <div class="se-component se-image-container __se__float-right"><figure style="margin: auto;"><img src="http://suneditor.com/docs/cat2.jpg" data-align="right" alt="Cat" data-rotate="" data-proportion="false" data-rotatex="" data-rotatey="" origin-size="640,959" data-origin="640,959" style="width: 640px; max-width: 100%;"><figcaption style="margin-top: 0px;"><p>Insert description</p></figcaption></figure></div>
            <p><br></p>
        </textarea>
    </div>
</div>
</form>

<script src="js/common.js"></script>
<!-- suneditor -->
<script src="../dist/suneditor.min.js"></script>
<!-- codeMirror -->
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/lib/codemirror.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/xml/xml.js"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.49.0/mode/css/css.js"></script>
<!-- KaTeX -->
<script src="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/katex.min.js"></script>
<script>
    const editorInstance = SUNEDITOR.create('editor_classic', {
        display: 'block',
        width: '100%',
        height: 'auto',
        popupDisplay: 'full',
        charCounter: true,
        charCounterLabel: 'Characters :',
        imageGalleryUrl: 'https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo',
        buttonList: [
            // default
            ['undo', 'redo'],
            ['font', 'fontSize', 'formatBlock'],
            ['paragraphStyle', 'blockquote'],
            ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
            ['fontColor', 'hiliteColor', 'textStyle'],
            ['removeFormat'],
            ['outdent', 'indent'],
            ['align', 'horizontalRule', 'list', 'lineHeight'],
            ['table', 'link', 'image', 'video', 'audio', 'math'],
            ['imageGallery'],
            ['fullScreen', 'showBlocks', 'codeView'],
            ['preview', 'print'],
            ['save', 'template'],
            // (min-width: 1546)
            ['%1546', [
                ['undo', 'redo'],
                ['font', 'fontSize', 'formatBlock'],
                ['paragraphStyle', 'blockquote'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['table', 'link', 'image', 'video', 'audio', 'math'],
                ['imageGallery'],
                ['fullScreen', 'showBlocks', 'codeView'],
                ['-right', ':i-More Misc-default.more_vertical', 'preview', 'print', 'save', 'template']
            ]],
            // (min-width: 1455)
            ['%1455', [
                ['undo', 'redo'],
                ['font', 'fontSize', 'formatBlock'],
                ['paragraphStyle', 'blockquote'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['table', 'link', 'image', 'video', 'audio', 'math'],
                ['imageGallery'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template']
            ]],
            // (min-width: 1326)
            ['%1326', [
                ['undo', 'redo'],
                ['font', 'fontSize', 'formatBlock'],
                ['paragraphStyle', 'blockquote'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template'],
                ['-right', ':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery']
            ]],
            // (min-width: 1123)
            ['%1123', [
                ['undo', 'redo'],
                [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template'],
                ['-right', ':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery']
            ]],
            // (min-width: 817)
            ['%817', [
                ['undo', 'redo'],
                [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                ['bold', 'underline', 'italic', 'strike'],
                [':t-More Text-default.more_text', 'subscript', 'superscript', 'fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template'],
                ['-right', ':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery']
            ]],
            // (min-width: 673)
            ['%673', [
                ['undo', 'redo'],
                [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                [':t-More Text-default.more_text', 'bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                [':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template']
            ]],
            // (min-width: 525)
            ['%525', [
                ['undo', 'redo'],
                [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                [':t-More Text-default.more_text', 'bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                [':e-More Line-default.more_horizontal', 'align', 'horizontalRule', 'list', 'lineHeight'],
                [':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template']
            ]],
            // (min-width: 420)
            ['%420', [
                ['undo', 'redo'],
                [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                [':t-More Text-default.more_text', 'bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'fontColor', 'hiliteColor', 'textStyle', 'removeFormat'],
                [':e-More Line-default.more_horizontal', 'outdent', 'indent', 'align', 'horizontalRule', 'list', 'lineHeight'],
                [':r-More Rich-default.more_plus', 'table', 'link', 'image', 'video', 'audio', 'math', 'imageGallery'],
                ['-right', ':i-More Misc-default.more_vertical', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save', 'template']
            ]]
        ],
        placeholder: 'Start typing something...',
        templates: [
            {
                name: 'Template-1',
                html: '<p>HTML source1</p>'
            },
            {
                name: 'Template-2',
                html: '<p>HTML source2</p>'
            }
        ],
        codeMirror: CodeMirror,
        katex: katex
    });

    SUNEDITOR.create('editor_inline1', {
        mode: 'inline',
        display: 'block',
        width: '100%',
        height: '162',
        popupDisplay: 'full',
        buttonList: [
            ['bold', 'underline', 'align', 'horizontalRule', 'list', 'table', 'codeView']
        ],
        placeholder: 'Start typing something...'
    });
    SUNEDITOR.create('editor_inline2', {
        mode: 'inline',
        display: 'block',
        width: '100%',
        height: '204',
        popupDisplay: 'full',
        buttonList: [
            ['font', 'fontSize', 'formatBlock', 'link'],
            ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
            ['codeView']
        ],
        placeholder: 'Start typing something...'
    });
    SUNEDITOR.create('editor_inline3', {
        mode: 'inline',
        display: 'block',
        width: '100%',
        height: 'auto',
        popupDisplay: 'full',
        buttonList: [
            ['link', 'image', 'video']
        ],
        placeholder: 'Start typing something...'
    });

    SUNEDITOR.create('editor_balloon', {
        mode: 'balloon',
        display: 'block',
        width: '100%',
        height: 'auto',
        popupDisplay: 'full',
        buttonList: [
            ['fontSize', 'fontColor', 'bold', 'underline', 'align', 'horizontalRule', 'table', 'codeView']
        ],
        placeholder: 'Start typing something...'
    });

    SUNEDITOR.create('editor_balloon_always', {
        mode: 'balloon-always',
        display: 'block',
        width: '100%',
        height: 'auto',
        popupDisplay: 'full',
        buttonList: [
            ['bold', 'italic', 'link', 'undo', 'redo']
        ],
        placeholder: 'Start typing something...'
    });


    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>
