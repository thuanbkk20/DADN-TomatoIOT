$(document).ready(function () {
    setInterval(function(){f()},30000);
});

function f(){
    console.log('f()')
    var webRoot = $("#webroot").val()
    var pumpAutoMode = $("#pumpAutoMode").val();
    var fanAutoMode = $("#fanAutoMode").val();
    console.log(webRoot,pumpAutoMode,fanAutoMode)
    $.ajax({url:webRoot+'/home/autoLoadData',success: function(result){
        console.log('autoLoadData')
    }});
    if(pumpAutoMode == 1){
        $.ajax({url:webRoot+'/soilHumid/autoPump',success: function(result){
            console.log('autoPump')
        }});
    }
    if(fanAutoMode == 1){
        $.ajax({url:webRoot+'/temperature/autoFan',success: function(result){
            console.log('autoFan')
        }});
    }
}