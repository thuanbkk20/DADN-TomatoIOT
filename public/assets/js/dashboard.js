$(document).ready(function () {
    setInterval(function(){f()},30000);
});

function f(){
    console.log('f()')
    var webRoot = $("#webRoot").val()
    var pumpAutoMode = $("#pumpAutoMode").val();
    var fanAutoMode = $("#fanAutoMode").val();
    $.ajax({url:webRoot+'/home/autoLoadData',success: function(result){
        console.log('autoLoadData')
    }});
    $.ajax({url:webRoot+'/public/assets/json/envIndex.json',success: function(result){
        console.log(result)

        $("#soilHumidLastData").html(result['soilHumid']['LastData'])
        $("#soilHumidLastUpdate").html(result['soilHumid']['LastUpdate'])
        if(result['soilHumid']['LastData']>result['soilHumid']['maxValue']){
            $("#soilHumidLastUpdate").css("color", "red");
        }else if(result['soilHumid']['LastData']<result['soilHumid']['minValue']){
            $("#soilHumidLastUpdate").css("color", "blue");
        }else{
            $("#soilHumidLastUpdate").css("color", "black");
        }


        $("#tempLastData").html(result['temperature']['LastData'])
        $("#tempLastUpdate").html(result['temperature']['LastUpdate'])
        if(result['temperature']['LastData']>result['temperature']['maxValue']){
            $("#tempLastData").css("color", "red");
        }else if(result['temperature']['LastData']<result['temperature']['minValue']){
            $("#tempLastData").css("color", "blue");
        }else{
            $("#tempLastData").css("color", "black");
        }

        $("#lightLastData").html(result['light']['LastData'])
        $("#lightLastUpdate").html(result['light']['LastUpdate'])
        if(result['light']['LastData']>result['light']['maxValue']){
            $("#lightLastData").css("color", "red");
        }else if(result['light']['LastData']<result['light']['minValue']){
            $("#lightLastData").css("color", "blue");
        }else{
            $("#lightLastData").css("color", "black");
        }

        $("#airHumidLastData").html(result['airHumid']['LastData'])
        $("#airHumidLastUpdate").html(result['airHumid']['LastUpdate'])
        if(result['airHumid']['LastData']>result['airHumid']['maxValue']){
            $("#airHumidLastData").css("color", "red");
        }else if(result['airHumid']['LastData']<result['airHumid']['minValue']){
            $("#airHumidLastData").css("color", "blue");
        }else{
            $("#airHumidLastData").css("color", "black");
        }
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