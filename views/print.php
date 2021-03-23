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
                url: '/book'
            },
            pageSetup: {           
                size: { width: '205mm', height: '297mm' },
                // size: { width: '8.5in', height: '11in' },
                margin: { 
                    top: '15mm', 
                    inner: '37mm', 
                    outer: '15mm', 
                    bottom: '0mm' 
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
