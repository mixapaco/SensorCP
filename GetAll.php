<?php include 'header.php'; ?>
<div id="mytable"></div>

<div id="chart-conteiner">
    <canvas id="mycanvas"></canvas>
</div>
<form action='' method='' class='knop'>
    <div class="left">
        <div class="aidi">ID :   </div>
        <div class="aidi">DATE AFTER :   </div>
        <div class="aidi">DATE BEFORE:   </div>
    </div>
    <div class="right">
        <div><input class='pole' id="inputrec" type='text'  name='id'></div>
        <div><input class='pole' id="inputdatea" type='date'  name='date'></div>    
        <div><input class='pole' id="inputdateb" type='date'  name='date'></div>
    </div>
    <input type='button' onclick="getChart()" class="inp" value="OK">
</form>  
</div>
<?php include 'footer.php'; ?>