$(document).ready(
function ()
//getChart()
{

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");


  $.ajax({
    url: "http://localhost/SensorCP/getJson.php"+"?id="+c,
    method: "GET",
    success: function(data) {
   		console.log(data);
      var value = [];
      var dat = [];
      data = JSON.parse(data);

      for(var i in data) {
        if(data[i].Id===undefined){continue;}
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
      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
}
);

