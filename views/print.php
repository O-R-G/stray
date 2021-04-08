<? 
/*
    lo-fi strict test of bindery.js following docs
*/
    
$isPreview = false;
if($uri[1] == 'preview')
    $isPreview = true;      // safari

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
            rules: [
                Bindery.PageBreak({ 
                    selector: '.page', 
                    position: 'both' 
                }),
                Bindery.RunningHeader({
                })
            ],
            pageSetup: {
                size: { 
                    width: <?= ($isPreview) ? "'210mm'" : "'8.25in'"; ?>,
                    height: <?= ($isPreview) ? "'292mm'" : "'11.625in'"; ?>,  
                },
                margin: { 
                    top: '15mm', 
                    inner: '37mm', 
                    outer: '15mm', 
                    bottom: '5mm' 
                },
            },  
            printSetup: {
                marks: Bindery.Marks.NONE, 
            },
            view:
                Bindery.View.FLIPBOOK,
        });
    </script>
    <style type="text/css">
        <?= ($isPreview) ? "
            :root {
                --bindery-sheet-width: 210mm;
                --bindery-sheet-height: 292mm;
            }
            .📖-print-options,
            .📖-controls .📖-btn {
                display: none;
            }
        " : "
            :root {
                --bindery-sheet-width: 8.25in;
                --bindery-sheet-height: 11.625in;
            }
        ";
        ?>
    </style>
</body>
