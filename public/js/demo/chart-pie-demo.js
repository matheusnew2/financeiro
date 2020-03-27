// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function grafico(obj,id){
    var valores = [obj.length];
    var colunas = [obj.length];
    for(var i =0;i < obj.length;i++){
        colunas[i] = obj[i][0];
        valores[i] = obj[i][1];
    }
    var cores = ['#de0000', '#25d600','#4B0082','#00BFFF','#DC143C'];
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart"+id);
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: colunas,
        datasets: [{
          data: valores,
          backgroundColor: cores,
          hoverBackgroundColor: ['#9c0000', '#1ea202'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: true,
          caretPadding: 10,
        },
        legend: {
          display: true
        },
        cutoutPercentage: 80,
      },
    });
}

