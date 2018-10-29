//----------------------------------
//   File          : js/pages/dashboard_store.js
//   Type          : JS file
//   Version       : 1.0.0
//   Last Updated  : April 4, 2017
//----------------------------------

// ---------------------------------
// Table of contents
// ---------------------------------
// 1. Sales report
// 2. Top products
// 3. Latest trends

// ---------------------------------
// 1. Sales report
// ---------------------------------
var months = getMonthPeriod();
var monthlyData = [];
var dt = new Date();
var y = dt.getFullYear();
m = dt.getMonth() + 1;
var lk = y + "-" + m;
console.log(`Fetching data for period ${lk}`);
getData(m);
function showNote(type, msg) {
    new Noty({
        type: type,
        layout: 'bottomRight',
        text: msg
    }).show();
}
function getMonthPeriod() {
    var months = [];
    var dt = new Date();
    var y = dt.getFullYear();
    m = dt.getMonth() + 1;

    switch(m) {
        case 1:
            months = ["Jan"];
            break;
        case 2:
            months = ["Jan", "Feb"];
            break;
        case 3:
            months = ["Jan", "Feb", "Mar"];
            break;
        case 4:
            months = ["Jan", "Feb", "Mar", "Apr"];
            break;
        case 5:
            months = ["Jan", "Feb", "Mar", "Apr", "May"];
            break;
        case 6:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
            break;
        case 7:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"];
            break;
        case 8:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"];
            break;
        case 9:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"];
            break;
        case 10:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"];
            break;
        case 11:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov"];
            break;
        case 12:
            months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            break;
    }
    return months;
}

function getData(month) {
    if(!window.server || typeof window.server == "undefined") {
        window.server = "http://127.0.0.1/fcda/public/";
    }
    var url = server + 'utilities/get-projects-stats-data/' + month;
    console.log('url = ' + url);
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'JSON',
        success: function(data) {
            Highcharts.chart('sales', {
                chart: {
                    width: null,
                    height: 322,
                    spacingRight: 0,
                    spacingLeft: 0,
                    backgroundColor: chart_bg,
                },
                title: {
                    text: null
                },
                subtitle: {
                    text: null
                },
                yAxis: {
                    gridLineColor: chart_gridlines_color,
                    lineColor: chart_gridlines_color,
                    tickColor: chart_gridlines_color,
                    labels: {
                        style: {
                            color: chart_grid_text_color,
                        }
                    },
                    title: {
                        text: 'Total Projects',
                        style: {
                            color: chart_grid_text_color,
                        }
                    }
                },
                xAxis: {
                    gridLineWidth: 0,
                    lineColor: chart_gridlines_color,
                    tickColor: chart_gridlines_color,
                    title: {
                        text: 'Months',
                        style: {
                            color: chart_grid_text_color,
                        }
                    },
                    labels: {
                        style: {
                            color: chart_grid_text_color,
                        }
                    },
                    categories: months
                },
                legend: {
                    align: 'right',
                    verticalAlign: 'top',
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        lineWidth: 2,
                        states: {
                            hover: {
                                lineWidth: 3
                            }
                        },
                        marker: {
                            enabled: true
                        },
                    }
                },
                series: [{
                    name: 'Projects Statistics',
                    color: chart_data_color_option1,
                    data: data[0]
                }, {
                    name: 'Beneficiaries',
                    color: chart_data_color_option2,
                    data: data[1]
                }]
            });
        },
        fail: function(error) {
            console.log(error);
            showNote('error', 'Unable to complete request. Check your connection and try again.');
        }
    })
}