$(document).ready(function () {
    setInterval(function(){f()},30000);
});

function f(){
    var webRoot = $("#webRoot").val()
    var mode = $("#fanMode").find(":selected").val();
    if(mode == 1){
        $.ajax({url:webRoot+'/temperature/autoFan',success: function(result){
        }});
        $.ajax({url:webRoot+'/public/assets/json/temperature.json',success: function(result){
            var fanLevel = result['fanLevel'];
            var temp = result['temp'];
            $("#temp").html(temp);
            $("#fanLevel").html(fanLevel);
        }});
    }
}