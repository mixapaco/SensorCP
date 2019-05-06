<?php 
    session_start();
    require_once 'connection.php';
    
    if ( !empty($_GET["id"])) {  
        $id = $_GET["id"];   
    } 
    else {
        $id = 1;
    }
    
    $userid = $_SESSION['userId'];
    $query = "SELECT UserId FROM sensors WHERE  id = $id and UserId = $userid";
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $r = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
    $active = $row['UserId'];
        
    if ($active == $_SESSION['userId']) {
        if(!empty($_GET["cdatea"]) & !empty($_GET["cdateb"])) {
            $cdatea = $_GET["cdatea"];
            $cdateb = $_GET["cdateb"];
            $query = "SELECT Number, Id, Value, cdate FROM sensors WHERE  id = $id and cdate between '$cdatea' and '$cdateb' ";
            $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        }
        else {
            $query ="SELECT Number, Id, Value, cdate FROM sensors WHERE id = $id";
            $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка " . mysqli_error($link)); 
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
        }
    }
 
    $data[] = array();
    if(!empty($result)) {
        $rows = mysqli_num_rows($result); 
        foreach ($result as $row) {
            $data[] = $row;
        }
        mysqli_free_result($result);
    }
    mysqli_close($link);
    print json_encode($data);
?>
