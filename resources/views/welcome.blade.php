<!DOCTYPE html>
<html>
    <head>
        <title> CatchPenny Project </title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
                    html, body {
                        height: 100%;
                    }

                    body {
                        margin: 0;
                        padding: 0;
                        width: 100%;
                        color: #B0BEC5;
                        display: table;
                        font-weight: 100;
                        font-family: 'Lato';
                    }

                    .container {
                        text-align: center;
                        display: table-cell;
                        vertical-align: middle;
                        background-color: rgba(0,0,0,0.5);
                    }

                    .content {
                        text-align: center;
                        display: inline-block;

                    }

                    .title {
                        font-size: 96px;
                        margin-bottom: 40px;
                    }

                    .quote {
                        font-size: 24px;
                    }

                    #background {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    min-width: 100%;
                    min-height: 100%;
                    width: auto;
                    height: auto;
                    z-index: -100;
                    -webkit-transform: translateX(-50%) translateY(-50%);
                    transform: translateX(-50%) translateY(-50%);
                    background: url(polina.jpg) no-repeat;
                    background-size: cover;
                }


                </style>


</head>
    <body>
        <video autoplay loop muted poster="screenshot.jpg" id="background">
            <source src="/video/video.mp4" type="video/mp4">
        </video>
        <div class="container">
            <div class="content">
                <div class="quote">Coming Soon</div>
                <div class="title">CatchPenny Project</div>
                <div class="quote">{{ Inspiring::quote() }}</div>
            </div>
        </div>
    </body>
</html>
