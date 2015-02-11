<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{EMPRESA} - Tiempo y asistencia</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Renta de aplicaciones de control empresarial." />
    <meta name="author" content="sincco.com" />
    <meta name="copyright" content="Algunos Derechos Reservados - apsicat.com" />

    <link rel="shortcut icon" href="<?= BASE_URL ?>html/favicon.png">

    <script src="<?= BASE_URL ?>html/js/jquery.js"></script>
    <script src="<?= BASE_URL ?>html/js/webqr.js"></script>
    <script src="<?= BASE_URL ?>html/js/llqrcode.js"></script>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        
        #clock {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 20px auto 0 auto;
            background: url(<?= BASE_URL ?>html/images/clockface.jpg);
            list-style: none;
            }
        
        #sec, #min, #hour {
            position: absolute;
            width: 15px;
            height: 300px;
            top: 0px;
            left: 142px;
            }
        
        #sec {
            background: url(<?= BASE_URL ?>html/images/sechand.png);
            z-index: 3;
            }
           
        #min {
            background: url(<?= BASE_URL ?>html/images/minhand.png);
            z-index: 2;
            }
           
        #hour {
            background: url(<?= BASE_URL ?>html/images/hourhand.png);
            z-index: 1;
            }
            
        p {
            text-align: center; 
            padding: 10px 0 0 0;
            }
    </style>
    
    <script type="text/javascript">
    
        $(document).ready(function() {
         
              setInterval( function() {
              var seconds = new Date().getSeconds();
              var sdegree = seconds * 6;
              var srotate = "rotate(" + sdegree + "deg)";
              
              $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
                  
              }, 1000 );
              
         
              setInterval( function() {
              var hours = new Date().getHours();
              var mins = new Date().getMinutes();
              var hdegree = hours * 30 + (mins / 2);
              var hrotate = "rotate(" + hdegree + "deg)";
              
              $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
                  
              }, 1000 );
        
        
              setInterval( function() {
              var mins = new Date().getMinutes();
              var mdegree = mins * 6;
              var mrotate = "rotate(" + mdegree + "deg)";
              
              $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
                  
              }, 1000 );
         
        });
    
    </script>
</head><!--/head-->

<body>
    <div style="display:inline;">
        <div style ="float:left;margin-left:50px">
            <ul id="clock"> 
                <li id="sec"></li>
                <li id="hour"></li>
                <li id="min"></li>
            </ul>
        </div>

        <div style ="margin-top:50px;margin-left:50px;float:left;">
            <center>
                <a onclick="setwebcam()" style="display:none;" > setwebcam</a>
                <a onclick="setimg()" style="display:none;"> setimg</a>
                <div id="mainbody">
                <canvas id="qr-canvas" style="width:300px;height:250px;background-color:#eee;border-color:#aaa;border-style:dashed;border-width:5px;border-radius:10px;"></canvas>
                </div>
                <div id="outdiv" style="display:none;"></div>
                <div style="width:300px;height:50px;background-color:#e55;border-color:#a55;border-style:dashed;border-width:5px;border-radius:10px;" id="result"></div>
                <audio id="beep"><source src="beep.wav"></source></audio>
            </center>
        </div>
    </div>

    <br /><br />
    <a href="#" onclick="checa()">simular checada</a>
    <script type="text/javascript">load();</script>
</body>
</html>
