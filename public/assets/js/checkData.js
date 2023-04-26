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
    //Kiểm tra tình trạng kết nối của các sensor
    $.ajax({url:webRoot+'/Equipment/checkConnect',success: function(result){
        console.log("Check Connection")
    }});

    //Thêm thông báo mới
    $.ajax({url:webRoot+'/Home/autoAddLog',success: function(result){
        $.ajax({url:webRoot+'/public/assets/json/log.json',success: function(result){
            console.log("Add new log");
            console.log(result);
            let count = 0;
            for(let item of result){
                console.log("#time"+count)
                $("#des"+item['id']).html(item['description'])
                $("#time"+count).html(dateDiff(item['time']))
                count++;
            }
        }});
    }});
}

function dateDiff(date) {
    var mydate = new Date();
    var theDiff = "";
    var datetime1 = new Date(date);
    var datetime2 = new Date(mydate);
    var diffInMilliSeconds = datetime2.getTime() - datetime1.getTime();
    var seconds = Math.floor(diffInMilliSeconds / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);
    var months = Math.floor(days / 30);
    var years = Math.floor(months / 12);
    if (years > 0) {
      return years + " năm trước";
    } else if (months > 0) {
      return months + " tháng trước";
    } else if (days > 0) {
      return days + " ngày trước";
    } else if (hours > 0) {
      return hours + " giờ trước";
    } else if (minutes > 0) {
      return minutes + " phút trước";
    } else {
      return seconds + " giây trước";
    }
  }
  