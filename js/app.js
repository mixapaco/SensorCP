var ipUrl = "192.168.0.190";
var barGraph;
var d = new Date();

class DateOb{
  constructor(dat,val){
    this.dateprop=dat;
    this.valprop=val;
  }
}

$(document).ready(getChart());
function getChart() {
  var connectId = document.getElementById("inputrec").value;
  var connectDateA = document.getElementById("inputdatea").value;
  var connectDateB = document.getElementById("inputdateb").value;
  
  if(document.getElementById("rFilW").checked) {
		
		var bufd = new Date(); 
		bufd.setTime(Date.now()+86400000);

    connectDateB = bufd.getFullYear() + '-' + (bufd.getMonth() + 1) + '-' + (bufd.getDate());
    bufd.setTime(Date.now());
    if(bufd.getDay()==0){bufd.setTime(Date.now() - 7 * 86400000);
    }
    else{
      bufd.setTime(Date.now() - bufd.getDay()*86400000);
    }
    
    connectDateA = bufd.getFullYear() + '-' + (bufd.getMonth() + 1) + '-' + bufd.getDate();
    console.log(connectDateA,connectDateB);

	}

  if(document.getElementById("rFilM").checked) {
    connectDateB = d.getFullYear() + '-' + (d.getMonth() + 1) + '-31';
    //var bufd = new Date(); 
    //bufd.setTime(Date.now()-43800 * 60 * 1000);
    connectDateA = d.getFullYear() + '-' + (d.getMonth() + 1) + '-01';
  }
  
  if(document.getElementById("rFilY").checked) {
    connectDateB = d.getFullYear()+'-12-31';
    connectDateA = d.getFullYear()+'-01-01';
  }
  
  if(connectId == null) {
    connectId = 1;
  }
  
  var ur = "http://"+ipUrl+"/SensorCP/GetJson.php?id="+connectId;
  
  if(connectDateA != null & connectDateB != null) {
    ur += "&cdatea=" + connectDateA + "&cdateb=" + connectDateB;
  }
  
  $.ajax({
    url: ur,
    method: "GET",
    success: function(data) 
    {
      
      data = JSON.parse(data);
      addTable(data);

      var value = [];
      var dat = [];
     
      for(var i in data) {
        if(data[i].Id === undefined) {
          continue;
        }
        dat.push(data[i].cdate);
        value.push(data[i].Value);
      }
      var chartdata;
      if(!document.getElementById("rFilW").checked & !document.getElementById("rFilM").checked & 
      !document.getElementById("rFilY").checked){
        console.log(dat);
        dat.sort();
        chartdata = {
          labels: dat,
          datasets : [{
            label: 'Графік',
            backgroundColor: 'rgba(51,255,102,1)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
          }]
        };
      }

      if(document.getElementById("rFilW").checked) {
        var dataobject = [];

        for (var i = dat.length - 1; i >= 0; i--) {
          dataobject[i] = {
            dateprop: dat.pop(),
            valprop : value.pop(),
          };
        }

        var bufd = new Date();
        var datTemp = [];
        for (var i =0 ; i <= dataobject.length - 1; i++) {
          bufd.setFullYear(dataobject[i].dateprop.substr(0,4),dataobject[i].dateprop.substr(5,2)-1,
          dataobject[i].dateprop.substr(8,2));
          if (bufd.getDay()==0) {
            datTemp[6] = dataobject[i].valprop;
          }
          else{
            datTemp[bufd.getDay()-1] = dataobject[i].valprop;
          }
        }
        
        var buf = [];
        bufd.setTime(Date.now());
        var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        
        chartdata = {
          labels: dat,//dataobject.dateprop,
          datasets: [{
            label: 'Chart',
            backgroundColor: 'rgba(51,255,102,1)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: datTemp//dataobject.valprop
          }]
        };
        
        chartdata.labels = days;//["Sun ","Mon ","Tue ","Wed ","Thu ","Fri ","Sat "];
        // {
        //   label: 'Chart2',
        //   backgroundColor: 'rgba(251,25,102,1)',
        //   borderColor: 'rgba(200, 200, 200, 0.75)',
        //   hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        //   hoverBorderColor: 'rgba(200, 200, 200, 1)',
        //   data: value
        // }
        barGraph.options = {
          scales: {
            yAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }
            }],
            xAxes: [{
              stacked: true,
              ticks: {
                beginAtZero: true
              }, 
              time: {
                displayFormats: {'day': 'MM/YY'},
                tooltipFormat: 'DD/MM/YY',
                unit: 'week',
              }
            }]
          }
        }
      } 
      
      if(document.getElementById("rFilM").checked) {
        var tempDate = dat;
        var tempVal=[] ;
        
        var bufd = new Date(); 
        bufd.setTime(Date.now());
        bufd.setFullYear(dat[0].substr(0,4),(dat[0].substr(5,2))-1,dat[0].substr(8,2));
        
        for (var i = 0; i < 30; i++) {
          tempVal[i] = 0;
        }
        for (var i = tempDate.length - 1; i >= 0; i--) {
          tempVal[parseInt(tempDate[i].substr(8,2)) - 1] += parseInt(value[i]);
        }
      
        dat = tempDate;
        value = tempVal;
        chartdata = {
          labels: dat,
          datasets : [{
            label: 'Chart',
            backgroundColor: 'rgba(51,255,102,1)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
          }]
        };
      
        var DaysInMonth = [];
        for (var i = 0; i <= 30; i++) {
          DaysInMonth[i]=i+1;
        }

        chartdata.labels = DaysInMonth;
        
        barGraph.options.scales.xAxes = [{
          stacked: true, 
          time: {
            unit: 'month',
          }
        }]
      }      

      if(document.getElementById("rFilY").checked) {
        var tempDate = dat;
        var tempVal= [12];
        
        var bufd = new Date(); 
        bufd.setTime(Date.now());
        bufd.setFullYear(dat[0].substr(0,4),(dat[0].substr(5,2)),dat[0].substr(8,2));

        for (var i = 0; i < 12; i++) {
          tempVal[i] = 0;
        }
        for (var i = tempDate.length - 1; i >= 0; i--) {
          tempVal[parseInt(tempDate[i].substr(5,2)) - 1] += parseInt(value[i]);
        }
      
        dat = tempDate;
        value = tempVal;
        chartdata = {
          labels: dat,
          datasets : [{
            label: 'Chart',
            backgroundColor: 'rgba(51,255,102,1)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
          }]
        };
      
        chartdata.labels = ["Jan "+bufd.getFullYear(),"Feb "+bufd.getFullYear(),"Mar "+bufd.getFullYear(),
        "Apr "+bufd.getFullYear(),"May "+bufd.getFullYear(),"Jun "+bufd.getFullYear(),
        "Jul "+bufd.getFullYear(),"Aug "+bufd.getFullYear(),"Sep "+bufd.getFullYear(),
        "Oct "+bufd.getFullYear(),"Nov "+bufd.getFullYear(),"Dec "+bufd.getFullYear()];
        barGraph.options.scales.xAxes = [{
          stacked: true, 
          time: {
            unit: 'month',
          }
        }]
      }

      if(barGraph === undefined) {
        createChartObj(chartdata);
        return 0;
      }
     
      barGraph.data = chartdata;
      barGraph.update();
    },
      error: function(data) {
        console.log(data);
      }
  });
}

function addTable(data) 
{
  var myTableDiv = document.getElementById("mytable");
 
  if(myTableDiv.children[0] != undefined) {
    myTableDiv.children[0].remove()
  }
  
  var table = document.createElement('TABLE');
  table.border = '1';
  var tableBody = document.createElement('TBODY');
  table.appendChild(tableBody);

  for(var i in data) {
    if(data[i].Id === undefined) {
      continue;
    }
 
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);

    for(var j in data[i]) {
      var td = document.createElement('TD');
      td.setAttribute('class','cell');
      td.appendChild(document.createTextNode(data[i][j]));      
      tr.appendChild(td);
    }
  }
  myTableDiv.appendChild(table);
}

function createChartObj(chartdata) {
  var ctx = document.getElementById('mycanvas').getContext('2d');
  ctx.clearRect(0, 0, ctx.width, ctx.height);
  
  barGraph = new Chart(ctx, {
    type: 'bar',
    data: chartdata,
    options: {scales: {yAxes:[{ticks:{beginAtZero: true}}]}}
  });
}

function getLoginPage() {
  var ur = "http://"+ipUrl+"/SensorCP/log/login.php";
  $.ajax({
    url: ur,
    method: "POST",
    success: function(data) {
      var loginH = document.getElementById("login");
      loginH.innerHTML = data;
    },
    error: function(data) {
      console.log(data);
    }
  });
}

function getLogoutPage() {
  var ur = "http://"+ipUrl+"/SensorCP/log/logout.php";
  $.ajax({
    url: ur,
    method: "POST",
    success: function(data) {},
    error: function(data) {
      console.log(data);
    }
  });
}

function getRegistrPage() {
  var ur = "http://"+ipUrl+"/SensorCP/log/registrate.php";
  $.ajax({
    url: ur,
    method: "POST",
    success: function(data) {
      var loginH = document.getElementById("login");
      loginH.innerHTML = data;
    },
    error: function(data) {
      console.log(data);
    }
  });
}

function textInputFilter(e) {
  if (e.value.length > 50) {
    console.log("Entered maximum length");
    var temp = e.value;
    e.value = temp.substring(0,e.value.length - 1);
  }
  
  var alet = false;
  for (var i = 0; i <= e.value.length - 1; i++) {
    if (e.value[e.value.length - 1].match(/[A-Za-z0-9_]/) == null) {
      alet = true;
      var temp = e.value;
      e.value = temp.substr(0,e.value.length - 1);
    }
    else{
    }
  }
  if (alet){
    alert("Wrong input: please enter a-z/A-Z/0-9");
  }
}