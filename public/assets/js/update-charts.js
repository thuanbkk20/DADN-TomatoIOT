$(document).ready(function(){
    f1();
    f2();
    f3();
    f4();
    setInterval(function(){f1()},30000);
    setInterval(function(){f2()},30000);
    setInterval(function(){f3()},30000);
    setInterval(function(){f4()},30000);
});

//Get new data for temp chart
function f1(){
    //Get value tem date value
    var webRoot = $("#webRoot").val();
    $.ajax({url:webRoot+'/Home/tempChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/tempHumidChart1.json',success: function(result){
        console.log("Temp Chart Data1",result)
    }});
    $.ajax({url:webRoot+'/public/assets/json/tempHumidChart2.json',success: function(result){
        console.log("Temp Chart Data2",result)
    }});
}


//Get new data for soilHumid chart
function f2(){
    //Get value tem soilHumid value
    var webRoot = $("#webRoot").val();
    //Gọi ajax để cập nhật dữ liệu cho file json
    $.ajax({url:webRoot+'/Home/soilHumidChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/soilHumidChart1.json',success: function(result){
        console.log("SoilHumid Chart Data1",result)
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/soilHumidChart2.json',success: function(result){
        console.log("SoilHumid Chart Data2",result)
    }});
}

//Get new data for light chart
function f3(){
    //Get value light date value
    var webRoot = $("#webRoot").val();
    //Gọi ajax để cập nhật dữ liệu cho file json
    $.ajax({url:webRoot+'/Home/lightChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/lightHumidChart1.json',success: function(result){
        console.log("Light Chart Data1",result)
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/lightHumidChart2.json',success: function(result){
        console.log("Light Chart Data2",result)
    }});
}

//Get new data for airHumid chart
function f4(){
    //Get value airHumid date value
    var webRoot = $("#webRoot").val();
    //Gọi ajax để cập nhật dữ liệu cho file json
    $.ajax({url:webRoot+'/Home/airHumidChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/airHumidChart1.json',success: function(result){
        console.log("Air Humid Chart Data2",result)
    }});
    //Lấy dữ liệu từ file json
    $.ajax({url:webRoot+'/public/assets/json/airHumidChart2.json',success: function(result){
        console.log("Air Humid Chart Data1",result)
    }});
}