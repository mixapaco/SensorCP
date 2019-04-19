
<?php 

	require_once 'connection.php';

    if ( !empty($_GET["id"])) 
    {  
    $id=$_GET["id"];   
    } else
    {
        $id=2;
    }

	$query ="SELECT * FROM sensors WHERE id=$id";
	$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $data[]=array();
if($result)
{
   
    $rows = mysqli_num_rows($result); 
     
   
    foreach ($result as $row) {
        $data[]=$row;
    }
    
    mysqli_free_result($result);
}
 
mysqli_close($link);

print json_encode($data);


?>
