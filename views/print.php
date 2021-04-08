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
            }
            @media print {
                .preview .📖-right .📖-flow-box, .📖-left .📖-footer,
                .preview .📖-left .📖-flow-box, .📖-left .📖-footer {
                    margin-top: calc(var(--bindery-margin-top) * 0.85);
                    margin-left: calc(var(--bindery-margin-inner) * 0.85);
                    margin-bottom: calc(var(--bindery-margin-bottom) * 0.85);
                    margin-right: calc(var(--bindery-margin-right) * 0.85);
                    background-color: #FF0;
                }
                .📖-page {
                    background-color: #090;
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
