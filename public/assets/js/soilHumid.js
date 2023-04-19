$(document).ready(function () {
    setInterval(function(){f()},30000);
});

function f(){
    var webRoot = $("#webRoot").val()
    var mode = $("#pumpMode").find(":selected").val();
    if(mode == 1){
        $.ajax({url:webRoot+'/soilHumid/autoPump',success: function(result){
        }});
        $.ajax({url:webRoot+'/public/assets/json/soilHumid.json',success: function(result){
            var fanLevel = result['pumpLevel'];
            var temp = result['soilHumid'];
            $("#soilHumid").html(temp);
            $("#pumpLevel").html(fanLevel);
        }});
    }
}