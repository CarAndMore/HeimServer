<?php
error_reporting (E_ALL | E_STRICT);
ini_set ('display_errors', 'On');

// for Raspberry Pi
 /*
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title>
            Freespace
        </title>
    </head>
    <body> 
        <style>
        h3 {margin:0;padding:0;} 
        table {border: none;}
        table tr {border: none;}
        table tr td{border: solid 1px #000000;}
        table tr th{border: solid 1px #000000;}
        </style>
        <h3>Freespace</h3>
        <div>
<?php
    $driveListe = new freespace();         
    echo $driveListe->print_GekTab();
    // echo $driveListe->printCompactTab();
?>
        </div>     
    </body>
</html>
      

<?php 
*/
class freespace {     
    public $datenArray = array();
    
    public function __construct(){
        // exec("df -H", $DiskFree);
        exec("df -h", $DiskFree);
        array_shift($DiskFree);                    
        foreach ($DiskFree AS $DFline) {
            $c=0;
            $diskdata = array();
            foreach(explode(" ",$DFline) AS $DFrow) {
                if (empty($DFrow) AND $DFrow !== "0") { continue; }
                ++$c;
                if ($c > "1" AND $c != "6" AND $pos = strpos($DFrow,".0")) {
                    $prefix = substr($DFrow,-1);
                    $DFrow = "".substr($DFrow,0,$pos)."".$prefix."";
                }
                if ($c > "1" AND $c < "5") {
                    $DFrow = str_replace("B"," B",$DFrow);
                    $DFrow = str_replace("K"," KB",$DFrow);
                    $DFrow = str_replace("M"," MB",$DFrow);
                    $DFrow = str_replace("G"," GB",$DFrow);
                }
                if ($c == 1) { $diskdata['Filesystem'] = $DFrow; }
                if ($c == 2) { $diskdata['Size'] = $DFrow; }
                if ($c == 3) { $diskdata['Used'] = $DFrow; }
                if ($c == 4) { $diskdata['Free'] = $DFrow; }
                if ($c == 5) {
                    $DFrow = str_replace("%","",$DFrow);
                    $diskdata['FreeProz'] = $DFrow;
                }
                if ($c == 6) { $diskdata['Mountpoint'] = $DFrow; }
                if ($c > 6)  { 
                    $diskdata['Mountpoint'] = $diskdata['Mountpoint']." ".$DFrow; 
                }
            }
                if (substr($diskdata['Mountpoint'], 0, 7) === '/media/'){    
                    $diskdata['Mountpoint_Edit'] = str_replace("/media/","",$diskdata['Mountpoint']);
                } elseif ( $diskdata['Mountpoint'] === '/'){
                    $diskdata['Mountpoint_Edit'] = "/ [Root System]";
                } else {
                    $diskdata['Mountpoint_Edit'] = $diskdata['Mountpoint'];
                }
                    $this->datenArray[$diskdata['Mountpoint']] = $diskdata;
                }   
    }
    private function print_LoadColor($x) {
        if ($x  >= 90) { return "#FF0000"; }
        elseif (($x  >= 70) && ($x  <= 89)) { return "#FF4000"; }
        elseif (($x  >= 60) && ($x  <= 69)) { return "#FF8000"; }
        elseif (($x  >= 50) && ($x  <= 59)) { return "#FFBF00"; }
        elseif (($x  >= 30) && ($x  <= 49)) { return "#FFFF00"; }
        elseif (($x  >= 20) && ($x  <= 29)) { return "#BFFF00"; }
        elseif (($x  >= 10) && ($x  <= 19)) { return "#80FF00"; }
        else  { return "#00FF00"; }
    }
    function printBar($prozent,$height='10px') {
        $StyleBoxA = " height:" . $height . ";margin: 0;width:97%;padding:2px;background-color: rgba(255,255,255,0.3); border: solid 1px #000000;";
        $StyleBoxB = " height:" . $height . ";margin: 0;padding:0;";
    
        $driveBar = "";
        $driveBar.="\n\t\t\t\t<div style='$StyleBoxA'>";
        $driveBar.="\n\t\t\t\t\t<div style='$StyleBoxB width:". $prozent ."%; background-color: ".$this->print_LoadColor($prozent).";'>";
        $driveBar.="</div>";
        $driveBar.="\n\t\t\t\t</div>";
        return $driveBar ;
    }
    function printCompactTab(){
        $FreeSpace="";
        foreach ($this->datenArray AS $Platte) {
            if (substr($Platte['Filesystem'], 0, 5) === '/dev/') {
                $FreeSpace .= "\n\t\t\t\t<p><b>".$Platte['Mountpoint_Edit']."</b> - ".$Platte['Free']." von ".$Platte['Size']." frei</p>";
    
                $FreeSpace .= $this->printBar($Platte['FreeProz']);
            }
        }
        return $FreeSpace;
    }
    
    public function print_GekTab() {
        $output = "";
        $output .= "\n\t<table cellspacing='0' cellpadding='3'>";
        $output .= "\n\t\t<tr>";
        $output .= "\n\t\t\t<th>".'Name'."</th>";
        $output .= "\n\t\t\t<th>".'Filesystem'."</th>";
        $output .= "\n\t\t\t<th>".'Size'."</th>";
        $output .= "\n\t\t\t<th>".'Used'."</th>";
        $output .= "\n\t\t\t<th>".'Free'."</th>";
        $output .= "\n\t\t\t<th>".'Mountpoint'."</th>";
        $output .= "\n\t\t</tr>";
        foreach ($this->datenArray AS $Platte) {
            if (substr($Platte['Filesystem'], 0, 5) === '/dev/') {
                $output .= "\n\t\t<tr>";
                $output .= "\n\t\t\t<td>".$Platte['Mountpoint_Edit']."</td>";
                $output .= "\n\t\t\t<td>".$Platte['Filesystem']."</td>";
                $output .= "\n\t\t\t<td>".$Platte['Size']."</td>";
                $output .= "\n\t\t\t<td>".$Platte['Used']."</td>";
                $output .= "\n\t\t\t<td>".$Platte['Free']."</td>";
                $output .= "\n\t\t\t<td>".$Platte['Mountpoint']."</td>";
                $output .= "\n\t\t</tr>";
            }
        }
        $output .= "\n\t</table>";
        $output .= "\n";
        return $output;
    }
}
?>