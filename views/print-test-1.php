<? 
/*
    lo-fi strict test of bindery.js following docs
*/
    
$isPreview = false;
if($uri[1] == 'preview')
    $isPreview = true;

?><head>
    <link rel='stylesheet' href='/static/css/main.css'>
    <script src='/static/js/bindery.min.js'></script>
</head>
<body class="<?= $isPreview ? 'preview' : ''; ?>">    
    <script>  
        Bindery.makeBook({
            content: {
                selector: '#print-container',
                url: '/book-test-1'
            },
            pageSetup: {           
                size: { width: '210mm', height: '297mm' },
                margin: { 
                    top: '15mm', 
                    inner: '37mm', 
                    outer: '15mm', 
                    bottom: '15mm' ,
                },
            },  
            view: 
                Bindery.View.FLIPBOOK,
            rules: [
                Bindery.PageBreak({ 
                    selector: '.page', 
                    position: 'both' 
                }),
                Bindery.RunningHeader({
                }),
            ],
        });
    </script>
</body>
