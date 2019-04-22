$(document).ready(getChart());
function getChart()
{


     c=document.getElementById("inputrec").value;
     cdatea=document.getElementById("inputdatea").value;
     cdateb=document.getElementById("inputdateb").value;
     if(c==null){c=1;}
     var ur="http://localhost/SensorCP/GetJson.php"+"?id="+c;
     if(cdatea!=null & cdateb!=null)
      {ur="http://localhost/SensorCP/GetJson.php?id="+c+"&cdatea="+cdatea+"&cdateb="+cdateb;}
  $.ajax({
    url: ur,
    method: "GET",
    success: function(data) 
    {
      data = JSON.parse(data);
   	////
      var value = [];
      var dat = [];
    
      console.log(data);
      for(var i in data) {
        if(data[i].Id===undefined)
          {
            continue;
          }
        dat.push(data[i].cdate);
        value.push(data[i].Value);
      }
      
      var chartdata = {
        labels: dat,
        datasets : [
          {
            label: 'Chart',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
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


