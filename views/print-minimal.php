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
            src div for bindery.js must be position: relative
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
                selector: '#text-container',
                url: '/text'
            },
            /*
            content: {
                selector: '#image-container',
                url: '/image'
            },
            */
            pageSetup: {           
                size: { width: '210mm', height: '297mm' },
                margin: { 
                    top: '20mm', 
                    inner: '20mm', 
                    outer: '20mm', 
                    bottom: '20mm' 
                },
            },  
            view: 
                Bindery.View.FLIPBOOK,
            rules: [
                Bindery.PageBreak({ 
                    selector: '.head', 
                    position: 'both' 
                })
            ],
        });
    </script>
</body>
