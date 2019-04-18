<?php include 'Header.php'; ?>
<?php 

	require_once 'connection.php';
	$query ="SELECT * FROM sensors";
	$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); 
     
    echo "<table><tr><th>Id запиту</th><th>Id Сенсора</th><th>К-сть</th><th>Дата</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
     

<?php include 'Footer.php'; ?>