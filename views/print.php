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
        window.addEventListener('load', function(){
            Bindery.makeBook({
                content: {
                    selector: '.print-container',
                    url: '/book'
                },
                pageSetup: {           
                    size: { width: '210mm', height: '297mm' },
                    // size: { width: '8.5in', height: '11in' },
                    margin: { 
                        top: '15mm', 
                        inner: '37mm', 
                        outer: '15mm', 
                        bottom: '15mm' 
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
        });
        
        // Bindery.makeBook({ 
        //     content: '.print-content',
        //     view: Bindery.View.PRINT,
        //     pageSetup: {
        //         size: { width: '210mm', height: '297mm' },
        //         margin: { top: '17.5mm', inner: '30mm', outer: '10mm', bottom: '17.5mm' },
        //     },
        //     printSetup: {
        //         marks: Bindery.Marks.CROP,
        //         bleed: '12pt',
        //     },
        //     rules: [
        //       Bindery.PageBreak(
        //         { selector: '.hotfield-break', position: 'after', continue:'left' }
        //     ),
        //     ], 

        // });
    </script>
</body>
