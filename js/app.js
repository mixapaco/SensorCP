 var barGraph;
 var d = new Date();
$(document).ready(getChart());
function getChart()
{
  var connectId = document.getElementById("inputrec").value;
  var connectDateA=document.getElementById("inputdatea").value;
  var connectDateB=document.getElementById("inputdateb").value;
  
  if(document.getElementById("rFilW").checked)
    {
		connectDateB=d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
		var bufd = new Date(); 
		bufd.setTime(Date.now()-604800000);
		connectDateA=bufd.getFullYear()+'-'+(bufd.getMonth()+1)+'-'+(bufd.getDate());
	}

  if(document.getElementById("rFilM").checked)
    {
      connectDateB=d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
      var bufd = new Date(); 
      bufd.setTime(Date.now()-43800*60*1000);
      connectDateA=bufd.getFullYear()+'-'+(bufd.getMonth()+1)+'-'+(bufd.getDate());

    }
  if(document.getElementById("rFilY").checked)
    {
      connectDateB=d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
      var bufd = new Date(); 
      bufd.setTime(Date.now()-43800*60*1000*12);
      connectDateA=bufd.getFullYear()+'-'+(bufd.getMonth()+1)+'-'+(bufd.getDate());

    }
  
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
      //console.log(dat);
      dat.sort();


    var chartdata = 
    {
      labels: dat,
      datasets : 
      [{
        label: 'Chart',
        backgroundColor: 'rgba(51,255,102,1)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: value
      }]
    };
      
    if(document.getElementById("rFilW").checked)
    {
      
      chartdata.datasets =
      [
        {
        label: 'Chart',
        backgroundColor: 'rgba(251,255,102,1)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: value},
        {
        label: 'Chart2',
        backgroundColor: 'rgba(251,25,102,1)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: value}
      ];
      barGraph.options=
        
      {
        scales: 
        {
          yAxes: 
          [{
            stacked: true,
            ticks: 
            {
              beginAtZero: true
            }
          }],
          xAxes: 
          [{
            stacked: true,
            ticks: 
            {
              beginAtZero: true
            }, 
            time: 
            {
              displayFormats: {'day': 'MM/YY'},
              tooltipFormat: 'DD/MM/YY',
              unit: 'week',
            }
          }]
        }
      }
      

    } 
    if(document.getElementById("rFilM").checked)
    {
      console.log(value);
      var tempDate = dat;
      var tempVal= [12];
      for (var i = 0; i < 12; i++) {
        tempVal[i] =0;
      }
      //tempVal={0};
      for (var i = tempDate.length - 1; i >= 0; i--) {
        tempVal[parseInt(tempDate[i].substr(5,2))-1] +=parseInt(value[i]);
        //console.log(parseInt(tempDate[i].substr(5,2)));

      }
      dat = tempDate;
      value = tempVal;
      chartdata = 
    {
      labels: dat,
      datasets : 
      [{
        label: 'Chart',
        backgroundColor: 'rgba(51,255,102,1)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: value
      }]
    };
      console.log(dat);
      console.log(value);
            console.log(chartdata);

     // chartdata.datasets.data=value;
      console.log(chartdata);
      
      chartdata.labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
      barGraph.options.scales.xAxes = 
      [
        {
          stacked: true, 
          time: 
          {
            unit: 'month',
          }
        }
      ]

    }      
    if(document.getElementById("rFilY").checked)
    {
      barGraph.options.scales.xAxes = [{
            stacked: true, 
            time: 
            {
              unit: 'year',
            }
          }]
      console.log(barGraph.options.scales.xAxes);
    }
    
    console.log(chartdata);
      if(barGraph===undefined)
      {
        createChartObj(chartdata);
      
        return 0;
      }
      
      barGraph.data=chartdata;
      console.log(barGraph.data);
      barGraph.update();
      console.log(barGraph.data);
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

function getLoginPage()
{
  var ur="http://localhost/SensorCP/log/login.php";
  $.ajax(
  {
    url: ur,
    method: "POST",
    success: function(data) 
    {
      var loginH = document.getElementById("login");
      loginH.innerHTML=data;
      
     
    },
      error: function(data) 
      {
        console.log(data);
      }
  });

}

function getLogoutPage()
{
  var ur="http://localhost/SensorCP/log/logout.php";
  $.ajax(
  {
    url: ur,
    method: "POST",
    success: function(data) 
    {
      var loginH = document.getElementById("login");
      loginH.innerHTML="<button onclick='getLoginPage()'>login</button>";
      
      
     
    },
      error: function(data) 
      {
        console.log(data);
      }
  });

}
function getRegistrPage()
{
  var ur="http://localhost/SensorCP/log/registrate.php";
  $.ajax(
  {
    url: ur,
    method: "POST",
    success: function(data) 
    {
      var loginH = document.getElementById("login");
      loginH.innerHTML=data;
      
      console.log(data);
     
    },
      error: function(data) 
      {
        console.log(data);
      }
  });

}

function textInputFilter(e)
{
     console.log(e.value);
     
    console.log(e.value.length);
    if (e.value.length>50){
      console.log("Entered maximum length");
      var temp = e.value;
      e.value = temp.substring(0,e.value.length-1);
    }
     var alet = false;
    for (var i = 0; i <= e.value.length - 1; i++) {
     
      if (e.value[e.value.length-1].match(/[A-Za-z0-9_]/)==null) 
      {
        alet = true;
     var temp = e.value;
      e.value = temp.substr(0,e.value.length-1);
     }
      else{
        
      }
   }
   if (alet){alert("Wrong input: please enter a-z/A-Z/0-9");}
}