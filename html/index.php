<?php





?>
<!DOCTYPE html>
<html>

    <head>
        <title>C.A. Home</title>
    
        <meta charset="UTF-8">
        <meta name="description" content="Mein Kleines Intranet">
        <meta name="author" content="Carsten Andrzejak">
        <meta name="keywords" content="Raspberry pi, Heimautomatisierung">
    
        <link href="favicon.ico" type="image/x-icon" rel="shortcut icon">
        <link href="styles/thema.css" type="text/css" rel="stylesheet" />
        
        <script language="javascript" type="text/javascript" src="script/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="script/my_js.js"></script> 
        <script language="javascript" type="text/javascript" src="script/ms_ws_js.js"></script>         
    </head>
    
    <body onload="wsConnect();" onunload="ws.disconnect();">
        <header>
            <div id="kopf">
                <h1>Wilkommen</h1>
                <h2>auf C.A. HOME</h2>
            </div>
            <div id="news" hidden="hidden">
                 <table>
                    <tr>
                        <th></th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Pressure</th>
                    </tr>
                    <tr>
                        <td>Au&szlig;en</td>
                        <td id="temperature1" align="right"></td>
                        <td id="humidity1" align="right"></td>
                        <td id="pressure1" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn0"></td>
                        <td id="tv0" align="right"></td>
                    </tr>  
                    <tr>
                        <td>Innen</td>
                        <td id="temperature0" align="right"></td>
                        <td id="humidity0" align="right"></td>
                        <td id="pressure0" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn1"></td>
                        <td id="tv1" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn2"></td>
                        <td id="tv2" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn3"></td>
                        <td id="tv3" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn4"></td>
                        <td id="tv4" align="right"></td>
                    </tr>
                 </table>
            </div>
            <div id="uhrzeit"></div>
        </header>
        <section>
            <h3>
                Hallo Welt 
                <br />
                <button type="button" onclick='doit(Massage_10);'>off</button>
                <button type="button" onclick='doit(Massage_11);'>on</button>
                <span id="sw1">1</span>
                <br />
                <button type="button" onclick='doit(Massage_20);'>off</button>
                <button type="button" onclick='doit(Massage_21);'>on</button> 
                <span id="sw2">2</span>
                <br />
                <button type="button" onclick='doit(Massage_30);'>off</button>
                <button type="button" onclick='doit(Massage_31);'>on</button> 
                <span id="sw3">3</span>
            </h3>   
            <article>
                <h4 class="headline">
                    &Uuml;berschrift
                </h4>
                <p>
                    hier k&ouml;nnte Ihr Text Stehen.  
                    <br />
                    tut er aber leider nicht. und das ist sehr schade.
                    warum tut er das nicht? los sprich!
                </p>
            </article>
            <article>
                <h4 class="headline">
                    FreeSpace
                </h4>
                <?php
                    include ("includes/freespace_Class.php");
                    $driveListe = new freespace();
                    // echo $driveListe->print_GekTab();
                    echo $driveListe->printCompactTab();
                ?>
            </article>
            <!--
            <article>
                <h4 class="headline">
                    frame
                </h4>
                <p>
                     <iframe src="http://rpi3:1880/ui/#/0)" width="435"  height="300"></iframe>
                     
                </p>     
            </article>
            -->
        </section>
        <footer>
            <p>
            no impressum; no AGB's; F*ck DSGVO' <span id="status">unknown</span>
            </p>
        </footer>
    </body>
</html>