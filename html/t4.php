<?php  
error_reporting (E_ALL | E_STRICT);
ini_set ('display_errors', 'On');
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
