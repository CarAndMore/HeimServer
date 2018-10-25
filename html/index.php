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
                 <table cellpadding="5" cellspacing="0">
                    <tr>
                        <th></th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Pressure</th>
                        <th>Messung</th>
                    </tr>
                    <tr>
                        <td>Au&szlig;en</td>
                        <td id="temperature1" align="right"></td>
                        <td id="humidity1" align="right"></td>
                        <td id="pressure1" align="right"></td> 
                        <td id="bme280_1" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn0"></td>
                        <td id="tv0" align="right"></td>
                        <td align="center">nc</td>
                        <td align="center">nc</td>
                        <td id="tt0" align="right"></td> 
                    </tr>  
                    <tr>
                        <td>Innen</td>
                        <td id="temperature0" align="right"></td>
                        <td id="humidity0" align="right"></td>
                        <td id="pressure0" align="right"></td>  
                        <td id="bme280_0" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn1"></td>
                        <td id="tv1" align="right"></td> 
                        <td align="center">nc</td>
                        <td align="center">nc</td>
                        <td id="tt1" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn2"></td>
                        <td id="tv2" align="right"></td> 
                        <td align="center">nc</td>
                        <td align="center">nc</td>
                        <td id="tt2" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn3"></td>
                        <td id="tv3" align="right"></td> 
                        <td align="center">nc</td>
                        <td align="center">nc</td>
                        <td id="tt3" align="right"></td>
                    </tr>
                    <tr>
                        <td id="tn4"></td>
                        <td id="tv4" align="right"></td> 
                        <td align="center">nc</td>
                        <td align="center">nc</td>
                        <td id="tt4" align="right"></td>
                    </tr>
                 </table>
            </div>
            <div id="uhrzeit"></div>
        </header>
        <section>
            <h3>
                Hallo Welt 
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
            
            <article>
                <h4 class="headline">
                    RFControl
                </h4>
                <table>
                    <tr>
                        <td>
                <table>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "1", "1") ;'>on</button></td>
                        <td>AA</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "1", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "2", "1") ;'>on</button></td>
                        <td>BB</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "2", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "3", "1") ;'>on</button></td>
                        <td>CC</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "3", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "4", "1") ;'>on</button></td>
                        <td>DD</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "4", "0") ;'>off</button></td>
                    </tr>
                </table>
                        </td>
                        <td>
                <table>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "1", "1") ;'>on</button></td>
                        <td>AA</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "1", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "2", "1") ;'>on</button></td>
                        <td>BB</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "2", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "3", "1") ;'>on</button></td>
                        <td>CC</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "3", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "4", "1") ;'>on</button></td>
                        <td>DD</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "4", "0") ;'>off</button></td>
                    </tr>
                </table>
                        </td>
                    </tr>
                </table>
            </article>
        </section>
        <footer>
            <p>
            no impressum; no AGB's; F*ck DSGVO' <span id="status">unknown</span>
            </p>
        </footer>
    </body>
</html>