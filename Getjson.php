<?php 
    require_once 'connection.php';
    //check if id not null
    if ( !empty($_GET["id"])) 
    {  
        $id=$_GET["id"];   
    } 
    else
    {
        $id=1;
    }
    //check if date not null
    if(!empty($_GET["cdatea"])&!empty($_GET["cdateb"]))
    {
        $cdatea=$_GET["cdatea"];
        $cdateb=$_GET["cdateb"];

        $query ="SELECT Number, Id, Value, cdate FROM sensors WHERE  id=$id and cdate between '$cdatea' and '$cdateb' ";
        $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    }
    else
    {
        $query ="SELECT Number, Id, Value, cdate FROM sensors WHERE id=$id";
        $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
    }

	//push data 
    $data[]=array();
    if($result)
    {
        $rows = mysqli_num_rows($result); 
        foreach ($result as $row)
        {
            $data[]=$row;
        }
        mysqli_free_result($result);
    }
mysqli_close($link);
print json_encode($data);
?>
