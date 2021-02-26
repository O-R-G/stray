<? 
/*
    lo-fi strict test of bindery.js following docs
*/

?><head>
    <link rel='stylesheet' href='/static/css/main.css'>
    <script src='/static/js/bindery.min.js'></script>
    <style>
        /* 
            force hide text on /image 
            src div for bindery.js 
            must be position: relative
            no explicit height set
        */
        .mask-text-container {
            display: none;
            /* color: #000; */
        }
    </style>
</head>
<body>    
    <script>  
        Bindery.makeBook({
            content: {
                selector: '#print-container',
                url: '/book'
            },
            pageSetup: {           
                size: { width: '210mm', height: '297mm' },
                margin: { 
                    top: '15mm', 
                    inner: '37mm', 
                    outer: '15mm', 
                    bottom: '5mm' 
                },
            },  
            view: 
                Bindery.View.FLIPBOOK,
            rules: [
                Bindery.PageBreak({ 
                    selector: '.page', 
                    position: 'both' 
                })
            ],
        });
    </script>
</body>
