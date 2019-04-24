<?php include 'header.php'; ?>
<div id="mytable"></div>

<div id="chart-conteiner">
    <canvas id="mycanvas"></canvas>
</div>
<form action='' method='' class='knop'>
    <p><span class="aidi">ID :   </span><input class='pole' id="inputrec" type='text'  name='id' ></p>
    <p><span class="aidi">DATE AFTER :   </span><input class='pole' id="inputdatea" type='date'  name='date' ></p>
    <p><span class="aidi">DATE BEFORE:   </span><input class='pole' id="inputdateb" type='date'  name='date' ></p> 
    <input type='button' onclick="getChart()" class="inp" value="OK">
</form>  
</div>
<?php include 'footer.php'; ?>