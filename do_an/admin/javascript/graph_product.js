eval(document.getElementById('product_graph_data').innerHTML);

new Chart("product_week_chart", {
  type: "line",
  data: {
    labels: x_product_week,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.5)",
      data: y_product_week
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Số sản phẩm bán được tuần qua"
    },
    responsive: true,
    scales: {
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true,
                    callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                }
            }],
            xAxes: [{
              display: true,
              ticks: [{
                autoSkip: false
              }]
            }]
        }
  }
});

new Chart("product_month_chart", {
  type: "line",
  data: {
    labels: x_product_month,
     datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.5)",
      data: y_product_month
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Số sản phẩm bán được tháng qua"
    },
    responsive: true,
    scales: {
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true,
                    callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                }
            }],
            xAxes: [{
              display: true,
              ticks: {
                autoSkip: true,
                maxTicksLimit: 15
              }
            }]
    }
  }
});