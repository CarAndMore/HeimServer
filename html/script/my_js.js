$(document).ready(function(){
    $( "#kopf" ).click(function() {
        $("#news").toggle("slow");
    });
    uhrzeit = setInterval(function(){ $("#uhrzeit").load("includes/time.html"); }, 300);
        
});
  

    