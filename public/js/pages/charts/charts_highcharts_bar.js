//----------------------------------
//   File          : js/pages/charts/charts_highcharts_bar.js
//   Type          : JS file
//   Version       : 1.0.0
//   Last Updated  : April 4, 2017
//----------------------------------

// ---------------------------------
// Table of contents
// ---------------------------------
// 1. Basic Bar
// 2. Stacked Bar
// 3. Basic column
// 4. Column with negative values
// 5. Stacked column
// 6. Fixed placement columns
// 7. Column range


$(function() {
	'use strict';

	var dt = new Date();
	y = dt.getFullYear();
	$.ajax({
		url: '/reports/get-beneficiaries-by-size/' + y,
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			console.log(data);
			Highcharts.chart('basic-bar', {
				chart: {
					type: 'bar',
					width: null,
					height: 240,
					backgroundColor: chart_bg,
				},
				title: {
					text: 'Percentage ration of beneficiaries by household size.'
				},
				subtitle: {
					// text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
					text: ''
				},
				xAxis: {
					categories: ['1 - 2', '3 - 6', '7 - 14', '15 - 20', 'Over 20'],
					title: {
						text: null
					},
					labels: {
						style: {
							color: chart_grid_text_color,
						}
					},
					gridLineWidth: 0,
					lineColor: chart_gridlines_color,
					tickColor: chart_gridlines_color,
				},
				yAxis: {
					min: 0,
					title: {
						// text: 'Population (millions)',
						text: 'Population',
						align: 'high'
					},
					labels: {
						overflow: 'justify',
						style: {
							color: chart_grid_text_color,
						}
					},
					gridLineColor: chart_gridlines_color,
					lineColor: chart_gridlines_color,
					tickColor: chart_gridlines_color,
				},
				tooltip: {
					// valueSuffix: ' millions'
					valueSuffix: ' '
				},
				plotOptions: {
					bar: {
						dataLabels: {
							enabled: false
						}
					}
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -20,
					y: 80,
					floating: true,
					borderWidth: 1,
					backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
					shadow: true
				},
				credits: {
					enabled: false
				},
				series: [{
					name: 'Year ' + y,
					color: chart_data_color_option1,
					data: data
				}]
			});
		},
		fail: function(error) {
			console.log(error);
			showNote('error', 'Unable to complete request. Please try again.');
		}
	});
});
