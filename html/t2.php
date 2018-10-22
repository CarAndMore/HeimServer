<?php

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>delay demo</title>
  <style>
  div {
    position: absolute;
    width: 60px;
    height: 60px;
    float: left;
  }
  .first {
    background-color: #33ff33;
    left: 0;
  }
  .second {
    background-color: #3333ff;
    left: 80px;
  }
  .dritter   {
    background:#ff3333;  
    left: 160px;
  }
  
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p>
    <button id="b1">Run 1</button>
    <button id="b2">Run 2</button>
    <button id="b3">Run 3</button>
</p>
<div class="first"></div>
<div class="second"></div> 
<div class="dritter"></div>
 
<script>   
$(document).ready(function(){
    $( "#b1" ).click(function() {
      $( "div.first" ).slideUp( 300 ).delay( 800 ).fadeIn( 400 );
      $( "div.second" ).slideUp( 300 ).show( "slow" );
      $( "div.dritter" ).slideUp( 400 ).delay( 200 ).slideDown( 400 );
    });   
    $("#b2").click(function(){
        $("div").animate({
            height: 'toggle'
        });
    });
});
</script>
 
</body>
</html>