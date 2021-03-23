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
                // pageSetup: {           
                //     size: { width: '208mm', height: '296mm' },
                //     margin: { 
                //         top: '15mm', 
                //         inner: '37mm', 
                //         outer: '15mm', 
                //         bottom: '15mm' 
                //     },
                // },
                pageSetup: {           
                    size: { width: '8.25in', height: '11.625in' },
                    margin: { 
                        top: '0.6in', 
                        inner: '1.45in', 
                        outer: '0.6in', 
                        bottom: '0.6in' 
                    },
                },
                // pageSetup: {           
                //     size: { width: '209.5mm', height: '295mm' },
                //     margin: { 
                //         top: '0.6in', 
                //         inner: '1.45in', 
                //         outer: '0.6in', 
                //         bottom: '0.6in' 
                //     },
                // },  
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
        
    </script>
</body>
