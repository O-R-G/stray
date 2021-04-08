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
                /* Bindery.View.PRINT,*/
        });
    </script>
    <style type="text/css">
        <?= ($isPreview) ? "
            :root {
                --bindery-sheet-width: 210mm;
                --bindery-sheet-height: 292mm;
                /*
                --bindery-margin-inner: 32mm;
                --bindery-margin-outer: 10mm;
                --bindery-margin-top: 10mm;
                --bindery-margin-bottom: 0;
                */
                /*
                --bindery-spread-width: 420mm;
                --bindery-page-width: 210mm;
                --bindery-page-height: 292mm;
                --bindery-sheet-width: calc(210mm + 12pt + 12pt);
                --bindery-sheet-height: calc(292mm + 2 * 12pt + 2 * 12pt);
                --bindery-margin-inner: 37mm;
                --bindery-margin-outer: 15mm;
                --bindery-margin-top: 15mm;
                --bindery-margin-bottom: 5mm;
                --bindery-bleed: 12pt;
                --bindery-mark-length: 12pt;
                */
            }
            @media print {
                .preview .📖-right .📖-flow-box, .📖-left .📖-footer,
                .preview .📖-left .📖-flow-box, .📖-left .📖-footer {
                    margin-top: 10mm;
                    margin-right: 10mm;
                    margin-bottom: 0;
                    margin-left: 32mm;
                    background-color: #FF0;
                }
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
