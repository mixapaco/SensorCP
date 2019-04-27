 var barGraph;
$(document).ready(getChart());
function getChart()
{
  connectId = document.getElementById("inputrec").value;
  connectDateA=document.getElementById("inputdatea").value;
  connectDateB=document.getElementById("inputdateb").value;
  
  if(connectId==null)
  {
    connectId=1;
  }
  
  var ur="http://localhost/SensorCP/GetJson.php?id="+connectId;
  
  if(connectDateA!=null & connectDateB!=null)
  {
    ur+="&cdatea="+connectDateA+"&cdateb="+connectDateB;
  }
  
  $.ajax(
  {
    url: ur,
    method: "GET",
    success: function(data) 
    {
      data = JSON.parse(data);
      addTable(data);


      var value = [];
      var dat = [];

      for(var i in data) 
      {
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
            backgroundColor: 'rgba(51,255,102,1)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
          }
        ]
      };
      

    
      if(barGraph===undefined)
      {
        createChartObj(chartdata);
      
        return 0;
      }
      
      barGraph.data=chartdata;
      barGraph.update();
    },
      error: function(data) 
      {
        console.log(data);
      }
  });
}

function addTable(data) {
  var myTableDiv = document.getElementById("mytable");

  
  if(myTableDiv.children[0]!=undefined){myTableDiv.children[0].remove()}
  var table = document.createElement('TABLE');
  table.border = '1';


  var tableBody = document.createElement('TBODY');
  table.appendChild(tableBody);

  for(var i in data) 
  {
    if(data[i].Id===undefined)
      {
        continue;
      }
 
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);

    for(var j in data[i]) 
    {
      var td = document.createElement('TD');
      td.setAttribute('class','cell');
      td.appendChild(document.createTextNode(data[i][j]));      
      tr.appendChild(td);
    }
  }
  myTableDiv.appendChild(table);
}

function createChartObj(chartdata)
{
  var ctx = document.getElementById('mycanvas').getContext('2d');
      ctx.clearRect(0, 0, ctx.width, ctx.height);
      barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {scales: {yAxes:[{ticks:{beginAtZero: true}}]}}
      });
}