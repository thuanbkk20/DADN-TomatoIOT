'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
	green: '#75c181',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*100)};


//Chart.js Line Chart Example 

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
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			],
		}, {
			label: 'Nhiệt độ hôm qua',
		    borderDash: [3, 5],
			backgroundColor: window.chartColors.gray,
			borderColor: window.chartColors.gray,
			
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			],
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
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return value.toLocaleString() + '\u00B0C';   //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
		            }
		        },
			}]
		}
	}
};



// Chart.js Bar Chart Example 

var barChartConfig = {
	type: 'bar',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
		datasets: [{
			label: 'Độ ẩm đất',
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			borderWidth: 1,
			maxBarThickness: 16,
			
			data: [
				23,
				45,
				76,
				75,
				62,
				37,
				83,
				34,
				21,
				23,
				23,
				32,
				21,
				34,
				47,
				32,
				49,
				55,
				59,
				78,
				38,
				17,
				91,
				82
			]
		}]
	},
	options: {
		responsive: true,
		aspectRatio: 1.5,
		legend: {
			position: 'bottom',
			align: 'end',
		},
		title: {
			display: true,
			text: 'Biểu đồ theo dõi độ ẩm đất'
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
	
/* Random number generator for demo purpose */
var randomData = function(){ return Math.round(Math.random()*4000)};
//Area line Chart Demo
var lineChartConfig_2 = {
	type: 'line',

	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
		
		datasets: [{
			label: 'Độ sáng',
			backgroundColor: "rgba(117,193,129,0.2)", 
			borderColor: "rgba(117,193,129, 0.8)", 
			data: [
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
				randomData(),
			],
		}]
	},
	options: {
		aspectRatio: 1.5,
		responsive: true,		
		
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
	                return tooltipItem.value + ' Lux';   
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
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return value.toLocaleString() + ' Lux';  
		            }
		        },
			}]
		}
	}
};
var randomData_2 = function(){ return Math.round(Math.random()*100)};
var barChartConfig_2 = {
	type: 'bar',
	data: {
		labels: ['12AM', '1AM', '2AM', '3AM', '4AM', '5AM', '6AM', '7AM', '8AM', '9AM', '10AM', '11AM', 
				 '12PM', '1PM', '2PM', '3PM', '4PM', '5PM', '6PM', '7PM', '8PM', '9PM', '10PM', '11PM'],
		datasets: [{
			label: 'Độ ẩm không khí',
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			borderWidth: 1,
			maxBarThickness: 16,
			
			data: [
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
				randomData_2(),
			]
		}]
	},
	options: {
		responsive: true,
		aspectRatio: 1.5,
		legend: {
			position: 'bottom',
			align: 'end',
		},
		title: {
			display: true,
			text: 'Biểu đồ theo dõi độ ẩm không khí'
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