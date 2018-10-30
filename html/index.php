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
                        <td>RGB Band</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "1", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "2", "1") ;'>on</button></td>
                        <td>LED Kette 1</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "2", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "3", "1") ;'>on</button></td>
                        <td>Spot 1 LED</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "3", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "4", "1") ;'>on</button></td>
                        <td>Spot 2 LED</td>
                        <td><button class="bnt_rfc" onclick='rfc("10111", "4", "0") ;'>off</button></td>
                    </tr>
                </table>
                        </td>
                        <td>
                <table>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "1", "1") ;'>on</button></td>
                        <td>Spot 3</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "1", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "2", "1") ;'>on</button></td>
                        <td>LED Kette 2</td>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "2", "0") ;'>off</button></td>
                    </tr>
                    <tr>
                        <td><button class="bnt_rfc" onclick='rfc("00111", "3", "1") ;'>on</button></td>
                        <td>RGB-C Band</td>
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
                
            <article id="IR_Control">
                <h4 class="headline">
                    IR Control
                </h4>  
                <div id="ir_controler">  
<?php
$jsonFile = "code.json";
// Read Json File & decode to Array
$data =json_decode(file_get_contents($jsonFile), true);

foreach ($data["irc"] as $FB) {
    echo "<h2>" . $FB["name"] . '</h2>';
    // Parse and sort in .
    $col = array(array());
    foreach ($FB["keys"] as $key) {
        if (isset($key["color"])) { $color = $key["color"]; }
        else { $color = "#aaaaaa"; }
        $col[$key["row"]][$key["column"]] = array('name'=>$key["name"], 'cmd'=>$key["cmd"], 'color'=>$color);
    }
    // Output to Table
    echo "<table>\n";
    foreach ($col as $l){
        echo "<tr>\n";
        foreach ($l as $cell){
?>
            <td>
                <button class="bnt_rfc" style="background-color: <?php echo $cell["color"]; ?>;" onclick='irc("<?php echo $cell["cmd"]; ?>");'><?php echo $cell["name"]; ?></button>
            </td>
<?php
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
}
?>
                </div>
            </article>
 <!--           
            <article>
                <h4 class="headline">
                    ADC Value
                </h4>
                <p>ADC 0 <span class="adc" id="adc0">0</span></p>
                <p>ADC 1 <span class="adc" id="adc1">1</span></p>
                <p>ADC 2 <span class="adc" id="adc2">2</span></p>
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