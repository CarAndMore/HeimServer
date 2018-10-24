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
        var jsondata = JSON.parse(data); 
        if (jsondata.sensor == "bme280") { 
            if (jsondata.id == 0) {
                if (jsondata.type == "temperature") {
                    document.getElementById('temperature0').innerHTML = jsondata.value;
                }
                if (jsondata.type == "humidity") {
                    document.getElementById('humidity0').innerHTML = jsondata.value;
                }
                if (jsondata.type == "pressure") {
                    document.getElementById('pressure0').innerHTML = jsondata.value;
                }
            }
            if (jsondata.id == 1) {
                if (jsondata.type == "temperature") {
                    document.getElementById('temperature1').innerHTML = jsondata.value;
                }
                if (jsondata.type == "humidity") {
                    document.getElementById('humidity1').innerHTML = jsondata.value;
                }
                if (jsondata.type == "pressure") {
                    document.getElementById('pressure1').innerHTML = jsondata.value;
                }
            }
        }
        if (jsondata.sensor == "ds18b20") {
            if (jsondata.id == 0) {
                document.getElementById('tn0').innerHTML = jsondata.ort;
                document.getElementById('tv0').innerHTML = jsondata.value;
            }
            if (jsondata.id == 1) {
                document.getElementById('tn1').innerHTML = jsondata.ort;
                document.getElementById('tv1').innerHTML = jsondata.value;
            }
            if (jsondata.id == 2) {
                document.getElementById('tn2').innerHTML = jsondata.ort;
                document.getElementById('tv2').innerHTML = jsondata.value;
            }
            if (jsondata.id == 3) {
                document.getElementById('tn3').innerHTML = jsondata.ort;
                document.getElementById('tv3').innerHTML = jsondata.value;
            }
            if (jsondata.id == 4) {
                document.getElementById('tn4').innerHTML = jsondata.ort;
                document.getElementById('tv4').innerHTML = jsondata.value;
            }
        }
        if (jsondata.type == "io") {
            if (jsondata.id == 1) {
                document.getElementById('sw1').innerHTML = jsondata.value;
            }
            if (jsondata.id == 2) {
                document.getElementById('sw2').innerHTML = jsondata.value;
            }
            if (jsondata.id == 3) {
                document.getElementById('sw3').innerHTML = jsondata.value;
            }    
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
var Massage_11 = '{"type": "io", "id": 1, "value": "on"}';
var Massage_10 = '{"type": "io", "id": 1, "value": "off"}';
var Massage_21 = '{"type": "io", "id": 2, "value": "on"}';
var Massage_20 = '{"type": "io", "id": 2, "value": "off"}';
var Massage_31 = '{"type": "io", "id": 3, "value": "on"}';
var Massage_30 = '{"type": "io", "id": 3, "value": "off"}';

function doit(m) {
    if (ws) { ws.send(m); }
}