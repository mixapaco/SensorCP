$(document).ready(getChart());
function getChart()
{


     c=document.getElementById("inputrec").value;
     cdatea=document.getElementById("inputdatea").value;
     cdateb=document.getElementById("inputdateb").value;
     if(c==null){c=1;}
     var ur="http://localhost/SensorCP/getJson.php"+"?id="+c;
     if(cdatea!=null & cdateb!=null)
      {ur="http://localhost/SensorCP/getJson.php?id="+c+"&cdatea="+cdatea+"&cdateb="+cdateb;}
  $.ajax({
    url: ur,
    method: "GET",
    success: function(data) {
   		
      var value = [];
      var dat = [];
      data = JSON.parse(data);
      console.log(data);
      for(var i in data) {
        if(data[i].id===undefined){continue;}
        value.push(data[i].cdate);
        dat.push(data[i].Value);
        
      }
      
      var chartdata = {
        labels: value,
        datasets : [
          {
            label: 'Chart',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: dat
          }
        ]
      };
      //console.log(chartdata);
      var ctx = document.getElementById('mycanvas');

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
         options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
}


