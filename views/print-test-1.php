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
                url: '/book-test-2'
            },
            // pageSetup: {           
            //     size: { width: '4.25in', height: '8in' },
            //     margin: { 
            //         top: '0.5in', 
            //         inner: '0.5in', 
            //         outer: '0.5in', 
            //         bottom: '0.5in',
            //     },
            // }, 
            pageSetup: {           
                size: { width: '5.5in', height: '8.5in' },
                margin: { 
                    top: '60pt', 
                    inner: '48pt', 
                    outer: '60pt', 
                    bottom: '72pt' 
                },
            },  
            view: 
                Bindery.View.FLIPBOOK,
            rules: [
                Bindery.PageBreak({ 
                    selector: '.page', 
                    position: 'after' 
                }),
                Bindery.RunningHeader({
                }),
            ],
        });
    </script>
</body>
