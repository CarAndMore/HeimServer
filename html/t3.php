<?php

?>     
<!DOCTYPE HTML>
<html>
    <head>
    <title>Carstens mini web</title>
    <script type="text/javascript">
        var ws;
        var wsUri = "ws://rpi3:1880/ws/ext_data";
        var loc = window.location;
        function wsConnect() {
            console.log("connect",wsUri);
            ws = new WebSocket(wsUri);
            //var line = "";    // either uncomment this for a building list of messages
            ws.onmessage = function(msg) {
                var line = "";  // or uncomment this to overwrite the existing message
                // parse the incoming message as a JSON object
                var data = msg.data;    
                //console.log(data);
                // build the output from the topic and payload parts of the object
                line += "<p>"+data+"</p>";
                // replace the messages div with the new "line"
                document.getElementById('messages').innerHTML = line;
                //ws.send(JSON.stringify({data:data}));
                var jsondata = JSON.parse(data);
                if (jsondata.type == "temperature") {
                    document.getElementById('temperature').innerHTML = jsondata.value;// + " &degC;";
                }
                if (jsondata.type == "humidity") {
                    document.getElementById('humidity').innerHTML = jsondata.value;// + " &degC;";
                }
                if (jsondata.type == "pressure") {
                    document.getElementById('pressure').innerHTML = jsondata.value;// + " &degC;";
                }
            }
            ws.onopen = function() {
                // update the status div with the connection status
                document.getElementById('status').innerHTML = "connected";
                //ws.send("Open for data");
                console.log("connected");
            }
            ws.onclose = function() {
                // update the status div with the connection status
                document.getElementById('status').innerHTML = "not connected";
                // in case of lost connection tries to reconnect every 3 secs
                setTimeout(wsConnect,3000);
            }
        }

        function doit(m) {
            if (ws) { ws.send(m); }
        }
    </script>
    </head>
    <body onload="wsConnect();" onunload="ws.disconnect();">
        <font face="Arial">
        <h1>Simple Live Display</h1>
        <div id="messages"></div>     
        <div id="temperature"></div>
        <div id="humidity"></div>
        <div id="pressure"></div>
        <hr />
        <div id="status">unknown</div>
        </font>
    </body>
</html>