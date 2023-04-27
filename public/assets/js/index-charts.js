'use strict';
// temp chart
var iot_1 = document.getElementById('canvas-linechart');
var myLineChart1 = new Chart(iot_1, lineChartConfig);
// soilhumid chart
var iot_2 = document.getElementById('canvas-barchart');
var myLineChart2 = new Chart(iot_2, barChartConfig);
// // light
var iot_3 = document.getElementById('canvas-linechart-2');
var myLineChart3 = new Chart(iot_3, lineChartConfig_2);
// //airhumid
var iot_4 = document.getElementById('canvas-barchart-2');
var myLineChart4 = new Chart(iot_4, barChartConfig_2);
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

// LẤY DỮ LIỆU LÊN NHIỆT ĐỘ
function f1(){
    //Get value temp date value
    var webRoot = $("#webRoot").val();
    $.ajax({url:webRoot+'/Home/tempChartData',success: function(result){
        // console.log("Update temp chart json");
    }});
    //Lấy dữ liệu từ file json
	$.ajax({url:webRoot+'/public/assets/json/tempHumidChart1.json',success: function(result){
		if(result){
			var tempData = result.slice(-24).map(function(data)
			{
				return data.value;
			});
			lineChartConfig.data.datasets[0].data = tempData;
			myLineChart1.update();
		}
	}});
	$.ajax({url:webRoot+'/public/assets/json/tempHumidChart2.json',success: function(result){
		if(result){
			var tempData = result.slice(-24).map(function(data)
			{
				return data.value;
			});
			lineChartConfig.data.datasets[1].data = tempData;
			myLineChart1.update();
		}
	}});
}

function f2(){
    var webRoot = $("#webRoot").val();
    $.ajax({url:webRoot+'/Home/soilHumidChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    $.ajax({url:webRoot+'/public/assets/json/soilHumidChart1.json',success: function(result){
		console.log("Humid Chart Data",result);
		var humidData = result.slice(-24).map(function(data)
		{
			return data.value;
		});
		console.log("Humid Chart Data 1",humidData);
		barChartConfig.data.datasets[0].data = humidData;
		myLineChart2.update();
    }});
    $.ajax({url:webRoot+'/public/assets/json/soilHumidChart2.json',success: function(result){
		var humidData = result.slice(-24).map(function(data)
		{
			return data.value;
		});
		console.log("Humid Chart Data 2",humidData);
		barChartConfig.data.datasets[1].data = humidData;
		myLineChart2.update();
    }});
}

function f3(){
    var webRoot = $("#webRoot").val();
    $.ajax({url:webRoot+'/Home/lightChartData',success: function(result){}});
    $.ajax({url:webRoot+'/public/assets/json/lightHumidChart1.json',success: function(result){
		var lightData = result.slice(-24).map(function(data)
		{
			return data.value;
		});
		console.log("Light Chart Data 1", lightData);
		lineChartConfig_2.data.datasets[0].data = lightData;
		myLineChart3.update();
    }});

    $.ajax({url:webRoot+'/public/assets/json/lightHumidChart2.json',success: function(result){
		var lightData = result.slice(-24).map(function(data)
		{
			return data.value;
		});
		console.log("Light Chart Data 2", lightData);
		lineChartConfig_2.data.datasets[1].data = lightData;
		myLineChart3.update();
    }});
}

function f4(){
    var webRoot = $("#webRoot").val();
    $.ajax({url:webRoot+'/Home/airHumidChartData',success: function(result){
        console.log("Update temp chart json");
    }});
    $.ajax({url:webRoot+'/public/assets/json/airHumidChart1.json',success: function(result){
		var airData = result.slice(-24).map(function(data)
        {
            return data.value;
        });
        console.log("Air Humid Data 1", airData);
		barChartConfig_2.data.datasets[0].data = airData;
		myLineChart4.update();
    }});
    $.ajax({url:webRoot+'/public/assets/json/airHumidChart2.json',success: function(result){
		var airData = result.slice(-24).map(function(data)
        {
            return data.value;
        });
        console.log("Air Humid Data 2", airData);
		barChartConfig_2.data.datasets[1].data = airData;
		myLineChart4.update();
    }});
}

window.chartColors = {
	green: '#75c181',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

var lineChartConfig = {
	type: 'line',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
				 
		datasets: [{
			label: 'Nhiệt độ hôm nay',
			fill: false,
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			data: [],
		},{
			label: 'Nhiệt độ hôm qua',
		    borderDash: [3, 5],
			backgroundColor: window.chartColors.gray,
			borderColor: window.chartColors.gray,
			
			data: [],
			fill: false,
		}]
	},
	options: {
		responsive: true,	
		aspectRatio: 1.5,
		
		legend: {
			display: true,
			position: 'bottom',
			align: 'end',
		},
		
		title: {
			display: true,
			text: 'Biểu đồ theo dõi nhiệt độ',

		}, 
		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

            callbacks: {
	            //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
                label: function(tooltipItem, data) {
	                if (parseInt(tooltipItem.value) >= 1000) {
                        return tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '\u00B0C';
                    } else {
	                    return tooltipItem.value + '\u00B0C';
                    }
                }
            },
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				},
				ticks: {
					min: 0,
					max: 100,
					stepSize: 10,
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return value.toLocaleString() + '\u00B0C';   
		            }
		        },
			}]
		}
	}
};

var barChartConfig = {
	type: 'bar',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
		datasets: [{
			label: 'Độ ẩm đất hôm nay',
			backgroundColor: "rgba(117,193,129,0.8)", 
			hoverBackgroundColor: "rgba(117,193,129,1)",	
			data: []
		}, 
		{
			label: 'Độ ẩm đất hôm qua',
			backgroundColor: "rgba(91,153,234,0.8)", 
			hoverBackgroundColor: "rgba(91,153,234,1)",
			data: []
		}
		]
	},
	options: {
		responsive: true,
		aspectRatio: 1.5,

		legend: {
			position: 'bottom',
			align: 'end',
		},

		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,
			callbacks: {
				label: function(tooltipItem, data) {	                 
					return tooltipItem.value + '%';   
				}
			},	
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},

			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.borders,
				},
				ticks: {
					min: 0,
					max: 100,
					stepSize: 10,
					beginAtZero: true,
					userCallback: function(value, index, values) {
						return value + '%';  
					}
				},
			}]
		}
	}
}

// Generate charts on load
window.addEventListener('load', function(){
	
	var lineChart = document.getElementById('canvas-linechart').getContext('2d');
	window.myLine = new Chart(lineChart, lineChartConfig);
	
	var barChart = document.getElementById('canvas-barchart').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);

});	
	
var lineChartConfig_2 = {
	type: 'line',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
				 
		datasets: [{
			label: 'Độ sáng hôm nay',
			fill: false,
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			data: [],
		},{
			label: 'Độ sáng hôm qua',
		    borderDash: [3, 5],
			backgroundColor: window.chartColors.gray,
			borderColor: window.chartColors.gray,
			
			data: [],
			fill: false,
		}]
	},
	options: {
		responsive: true,	
		aspectRatio: 1.5,
		
		legend: {
			display: true,
			position: 'bottom',
			align: 'end',
		},
		
		title: {
			display: true,
			text: 'Biểu đồ theo dõi độ sáng',

		}, 
		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

            callbacks: {
                label: function(tooltipItem, data) {
	                if (parseInt(tooltipItem.value) >= 1000) {
                        return tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' Lux';
                    } else {
	                    return tooltipItem.value + ' Lux';
                    }
                }
            },
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				},
				ticks: {
					min: 0,
					max: 100,
					stepSize: 10,
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return value.toLocaleString() + ' Lux';   
		            }
		        },
			}]
		}
	}
};

var barChartConfig_2 = {
	type: 'bar',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
		datasets: [{
			label: 'Độ ẩm không khí hôm nay',
			backgroundColor: "rgba(117,193,129,0.8)", 
			hoverBackgroundColor: "rgba(117,193,129,1)",	
			data: []
		}, 
		{
			label: 'Độ ẩm không khí hôm qua',
			backgroundColor: "rgba(91,153,234,0.8)", 
			hoverBackgroundColor: "rgba(91,153,234,1)",
			data: []
		}
		]
	},
	options: {
		responsive: true,
		aspectRatio: 1.5,

		legend: {
			position: 'bottom',
			align: 'end',
		},

		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,
			callbacks: {
				label: function(tooltipItem, data) {	                 
					return tooltipItem.value + '%';   
				}
			},	
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.borders,
				},
				ticks: {
					min: 0,
					max: 100,
					stepSize: 10,
					beginAtZero: true,
					userCallback: function(value, index, values) {
						return value + '%';  
					}
				},
			}]
		}
	}
}

// Generate charts on load
window.addEventListener('load', function(){
	
	var lineChart = document.getElementById('canvas-linechart-2').getContext('2d');
	window.myLine = new Chart(lineChart, lineChartConfig_2);

	var barChart = document.getElementById('canvas-barchart-2').getContext('2d');
	window.myLine = new Chart(barChart, barChartConfig_2);
	
});	



