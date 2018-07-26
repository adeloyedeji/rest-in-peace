//----------------------------------
//   File          : js/pages/charts/charts_highcharts_pie.js
//   Type          : JS file
//   Version       : 1.0.0
//   Last Updated  : April 4, 2017
//----------------------------------

// ---------------------------------
// Table of contents
// ---------------------------------
// 1. Basic Pie
// 2. Pie with legend
// 3. Donut chart
// 4. Semi circle donut

$(function() {
	'use strict';

	// ---------------------------------
	// 1. Basic Pie
	// ---------------------------------
	$.ajax({
		url: '/reports/get-beneficiaries-in-states',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			console.log(data);
			Highcharts.chart('pie-donut', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					width: null,
					height: 240,
					backgroundColor: chart_bg,
				},
				title: {
					text: 'Percentage ratio of beneficiaries by state'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: chart_grid_text_color
							}
						}
					}
				},
				series: [{
					name: 'Brands',
					colorByPoint: true,
					data: [
						{
							name: 'Abia',
							color: chart_data_color_option1,
							y: data[0]
						}, {
							name: 'Adamawa',
							color: chart_data_color_option2,
							y: data[1],
						}, {
							name: 'Akwa Ibom',
							color: chart_data_color_option3,
							y: data[2]
						}, {
							name: 'Anambra',
							color: chart_data_color_option4,
							y: data[3]
						}, {
							name: 'Bauchi',
							color: chart_data_color_option5,
							y: data[4]
						}, {
							name: 'Bayelsa',
							color: chart_data_color_option6,
							y: data[5]
						}, {
							name: 'Benue',
							color: chart_data_color_option1,
							y: data[6]
						}, {
							name: 'Borno',
							color: chart_data_color_option2,
							y: data[7]
						}, {
							name: 'Cross River',
							color: chart_data_color_option3,
							y: data[8]
						}, {
							name: 'Delta',
							color: chart_data_color_option4,
							y: data[9]
						}, {
							name: 'Ebonyi',
							color: chart_data_color_option5,
							y: data[10]
						}, {
							name: 'Edo',
							color: chart_data_color_option6,
							y: data[11]
						}, {
							name: 'Ekiti',
							color: chart_data_color_option1,
							y: data[12]
						}, {
							name: 'Enugu',
							color: chart_data_color_option2,
							y: data[13]
						}, {
							name: 'FCT',
							color: chart_data_color_option3,
							y: data[14]
						}, {
							name: 'Gombe',
							color: chart_data_color_option4,
							y: data[15]
						}, {
							name: 'Imo',
							color: chart_data_color_option5,
							y: data[16]
						}, {
							name: 'Jigawa',
							color: chart_data_color_option6,
							y: data[17]
						}, {
							name: 'Kaduna',
							color: chart_data_color_option1,
							y: data[18]
						}, {
							name: 'Kano',
							color: chart_data_color_option2,
							y: data[19]
						}, {
							name: 'Katsina',
							color: chart_data_color_option3,
							y: data[20]
						}, {
							name: 'Kebbi',
							color: chart_data_color_option4,
							y: data[21]
						}, {
							name: 'Kogi',
							color: chart_data_color_option5,
							y: data[22]
						}, {
							name: 'Kwara',
							color: chart_data_color_option6,
							y: data[23]
						}, {
							name: 'Lagos',
							color: chart_data_color_option1,
							y: data[24]
						}, {
							name: 'Nasarawa',
							color: chart_data_color_option2,
							y: data[25]
						}, {
							name: 'Niger',
							color: chart_data_color_option3,
							y: data[26]
						}, {
							name: 'Ogun',
							color: chart_data_color_option4,
							y: data[27]
						}, {
							name: 'Ondo',
							color: chart_data_color_option5,
							y: data[28]
						}, {
							name: 'Osun',
							color: chart_data_color_option6,
							y: data[29]
						}, {
							name: 'Oyo',
							color: chart_data_color_option1,
							y: data[30]
						}, {
							name: 'Pleatau',
							color: chart_data_color_option2,
							y: data[31]
						}, {
							name: 'Rivers',
							color: chart_data_color_option3,
							y: data[32]
						}, {
							name: 'Sokoto',
							color: chart_data_color_option4,
							y: data[33]
						}, {
							name: 'Taraba',
							color: chart_data_color_option5,
							y: data[34]
						}, {
							name: 'Yobe',
							color: chart_data_color_option6,
							y: data[35]
						}, {
							name: 'Zamfara',
							color: chart_data_color_option1,
							y: data[36]
						}
					]
				}]
			});
		},
		fail: function(error) {
			console.log(error);
			showNote('error', 'Unable to complete request. Please check your connection and try again.');
		}
	});
});
