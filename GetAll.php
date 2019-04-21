<?php include 'header.php'; ?>
<?php 
    require_once 'connection.php';  
    //Check id 
    if ( !empty($_GET["id"])) {  
    $id=$_GET["id"];   
    } 
    else { $id=1;}

	$query ="SELECT * FROM sensors WHERE id = $id";
	$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $data[]=array();
    if($result)
    {
        $rows = mysqli_num_rows($result); 
     
     //table HTML
    // echo "<table class='toble'><tr><th>Id запиту</th><th>Id Сенсора</th><th>К-сть</th><th>Дата</th></tr>";
    // for ($i = 0 ; $i < $rows ; ++$i)
    // {
    //     $row = mysqli_fetch_row($result);
    //     echo "<tr>";
    //         for ($j = 0 ; $j < 4 ; ++$j) echo "<td class='td'>$row[$j]</td>";
    //     echo "</tr>";
    // }
    // echo "</table>";
      
        foreach ($result as $row) {
            $data[]=$row;
    }
    
    mysqli_free_result($result);
}
 
mysqli_close($link);

//print json_encode($data);
?>
<div id="chart-conteiner">
    <canvas id="mycanvas"></canvas>
</div>
<form action='' method='' class='knop'>
<p><span class="aidi">ID :   </span><input class='pole' id="inputrec" type='text'  name='id' ></p>
<p><span class="aidi">DATE AFTER :   </span><input class='pole' id="inputdatea" type='text'  name='date' ></p>
<p><span class="aidi">DATE BEFORE:   </span><input class='pole' id="inputdateb" type='text'  name='date' ></p>git 
<input type='button' onclick="getChart()" class="inp" value="OK">
</form>  

<?php include 'footer.php'; ?>