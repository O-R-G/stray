<!DOCTYPE html>
<html>

<head>
    <title>bionicpinkytoe's Zine</title>
    <style>
        body {
            background-color: black;
        }
        
        p {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div id="content">
        <div>
            <p>April 01, 2021<br> ↳April 07, 2021</p>
            <p>@bionicpinkytoe</p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6065255d1c2e781037576721/vsco60652560c1c82.jpg" />
            <p>we look like cartoon characters</p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/606525f01c2e781037576722/vsco606525f4c54d6.jpg" />
            <p>bestie+ dangling </p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6065277a1c2e781037576724/vsco6065277e1db75.jpg" />
            <p>reflection in the prius</p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6066660f3a94b66222e613da/vsco60666610aa4bd.jpg" />
            <p>small businesses, the final frontier of independent graphic design </p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6068da36ad40ce0314f6edef/vsco6068da37d8b52.jpg" />
            <p>bae in pub gar😍🌳</p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6068dc83ad40ce0314f6edf0/vsco6068dc848e9cc.jpg" />
            <p>this hair was so baller ⛹️ </p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/6068dd0fad40ce0314f6edf1/vsco6068dd1075801.jpg" />
            <p>🏢🏇</p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/606a53e67d52aa6415f64edf/vsco606a53e708127.jpg" />
            <p>SpideyMobile is a honda odyssey 🕷🚗 </p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/606a54387d52aa6415f64ee0/vsco606a54394eeaf.jpg" />
            <p>i liked the colors and the lines 🎯 </p>
        </div>
        
        <div>
            <img style="width: 100%" src="http://im.vsco.co/aws-us-west-2/988393/81457622/606b9aca3a757f383bfae387/vsco606b9acb93d3a.jpg" />
            <p>fleet street😙🤾</p>
        </div>
        
        <img>

    </div>
    <script src="https://vsco-zine.herokuapp.com/static/bindery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script>
        Bindery.makeBook({
            content: '#content',
            rules: [
                Bindery.PageBreak({
                    selector: 'img',
                    position: 'before'
                }),
            ],
            pageSetup: {
                size: { width: '210mm', height: '297mm' },
            },
            printSetup: {
                paper: Bindery.Paper.A4_PORTRAIT,
                marks: Bindery.Marks.NONE,
            },
            view: Bindery.View.FLIPBOOK,
        });
    </script>

<style type="text/css">
    :root {
        --bindery-page-width: 210mm;
        --bindery-page-height: 292mm;
        --bindery-sheet-width: 210mm;
        --bindery-sheet-height: 292mm;
    }
    @media print {
        .📖-right .📖-flow-box, .📖-left .📖-footer,
        .📖-left .📖-flow-box, .📖-left .📖-footer {
            margin: 0mm;
            background-color: #FF0;
        }

        .📖-page {
            background-color: #090;
            zoom: 1.25;
        }

    }

    @media screen {
        .📖-page {
            background-color: #FF0;
        }
    }

@media print {
}

</style>

</body>

</html>
