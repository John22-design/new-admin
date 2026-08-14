/**
 * Visitor Analytics Dashboard Charts
 */

'use strict';

(function () {
  const data = window.visitorAnalyticsData || {
    dates: [],
    pageviews: [],
    uniques: [],
    devices: { labels: ['Desktop', 'Mobile', 'Tablet'], series: [0, 0, 0] }
  };

  let cardColor = '#fff';
  let headingColor = '#566a7f';
  let legendColor = '#697a8d';
  let labelColor = '#a1acb8';
  let borderColor = '#eceef1';
  let primaryColor = '#696cff';
  let infoColor = '#03c3ec';
  let successColor = '#71dd37';

  if (typeof config !== 'undefined' && config.colors) {
    cardColor = config.colors.cardColor || cardColor;
    headingColor = config.colors.headingColor || headingColor;
    legendColor = config.colors.bodyColor || legendColor;
    labelColor = config.colors.textMuted || labelColor;
    borderColor = config.colors.borderColor || borderColor;
    primaryColor = config.colors.primary || primaryColor;
    infoColor = config.colors.info || infoColor;
    successColor = config.colors.success || successColor;
  }

  // --------------------------------------------------------------------
  // 1. Visitor Traffic Area Chart (Pageviews vs Unique Visitors)
  // --------------------------------------------------------------------
  const visitorTrafficChartEl = document.querySelector('#visitorTrafficChart');
  if (visitorTrafficChartEl) {
    const visitorTrafficOptions = {
      series: [
        {
          name: 'Total Pageviews',
          data: data.pageviews
        },
        {
          name: 'Unique Visitors',
          data: data.uniques
        }
      ],
      chart: {
        height: 320,
        type: 'area',
        toolbar: {
          show: false
        },
        parentHeightOffset: 0
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 2.5
      },
      colors: [primaryColor, infoColor],
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 0.8,
          opacityFrom: 0.45,
          opacityTo: 0.05,
          stops: [0, 90, 100]
        }
      },
      legend: {
        show: false
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        padding: {
          top: -10,
          bottom: 0,
          left: 10,
          right: 10
        }
      },
      xaxis: {
        categories: data.dates,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            fontSize: '12px',
            fontFamily: 'Public Sans, sans-serif',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '12px',
            fontFamily: 'Public Sans, sans-serif',
            colors: labelColor
          },
          formatter: function (val) {
            return Math.round(val);
          }
        },
        min: 0
      },
      tooltip: {
        shared: true,
        intersect: false,
        theme: 'light',
        y: {
          formatter: function (val) {
            return val + ' visits';
          }
        }
      }
    };

    const visitorTrafficChart = new ApexCharts(visitorTrafficChartEl, visitorTrafficOptions);
    visitorTrafficChart.render();
  }

  // --------------------------------------------------------------------
  // 2. Device Breakdown Donut Chart
  // --------------------------------------------------------------------
  const deviceDonutChartEl = document.querySelector('#deviceDonutChart');
  if (deviceDonutChartEl) {
    const totalDeviceCount = data.devices.series.reduce((a, b) => a + b, 0);

    const deviceDonutOptions = {
      series: data.devices.series.length > 0 && totalDeviceCount > 0 ? data.devices.series : [1, 0, 0],
      labels: data.devices.labels,
      chart: {
        height: 220,
        type: 'donut'
      },
      colors: [primaryColor, successColor, infoColor],
      stroke: {
        width: 4,
        colors: [cardColor]
      },
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      plotOptions: {
        pie: {
          donut: {
            size: '72%',
            labels: {
              show: true,
              value: {
                fontSize: '18px',
                fontFamily: 'Public Sans, sans-serif',
                fontWeight: 600,
                color: headingColor,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val);
                }
              },
              name: {
                offsetY: 15,
                fontFamily: 'Public Sans, sans-serif'
              },
              total: {
                show: true,
                fontSize: '12px',
                color: legendColor,
                label: 'Total Visits',
                formatter: function () {
                  return totalDeviceCount;
                }
              }
            }
          }
        }
      }
    };

    const deviceDonutChart = new ApexCharts(deviceDonutChartEl, deviceDonutOptions);
    deviceDonutChart.render();
  }
})();
