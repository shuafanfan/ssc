function showChart(type, callback) {
  var title = '';
  if(type=='recharge') {
    title = '充值统计图';
    yword = '充值金额';
  } else if(type=='withdraw') {
    title = '提现统计图';
    yword = '提现金额';
  } else if(type=='user') {
    title = '用户注册统计图';
    yword = '注册人数';
  }
  Highcharts.setOptions({
      timezoneOffset: -8
  });
  data = callback();
  $('#container').highcharts({
      credits: {
          enabled: false
      }, 
      chart: {
          zoomType: 'x'
      },
      title: {
          text: title
      },
      subtitle: {
          text: document.ontouchstart === undefined ?
          '鼠标拖动可以进行缩放' : '手势操作进行缩放'
      },
      xAxis: {
          type: 'datetime',
          dateTimeLabelFormats: {
              millisecond: '%H:%M:%S.%L',
              second: '%H:%M:%S',
              minute: '%H:%M',
              hour: '%H:%M',
              day: '%m-%d',
              week: '%m-%d',
              month: '%Y-%m',
              year: '%Y'
          }
      },
      tooltip: {
          dateTimeLabelFormats: {
              millisecond: '%H:%M:%S.%L',
              second: '%H:%M:%S',
              minute: '%H:%M',
              hour: '%H:%M',
              day: '%Y-%m-%d',
              week: '%m-%d',
              month: '%Y-%m',
              year: '%Y'
          }
      },
      yAxis: {
          title: {
              text: yword
          }
      },
      legend: {
          enabled: false
      },
      plotOptions: {
          area: {
              fillColor: {
                  linearGradient: {
                      x1: 0,
                      y1: 0,
                      x2: 0,
                      y2: 1
                  },
                  stops: [
                      [0, Highcharts.getOptions().colors[0]],
                      [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                  ]
              },
              marker: {
                  radius: 2
              },
              lineWidth: 1,
              states: {
                  hover: {
                      lineWidth: 1
                  }
              },
              threshold: null
          }
      },
      series: [{
          type: 'area',
          name: yword,
          data: data
      }]
  });
}
