<?php
//echo "hola";
    require 'dbConnect.php';
    //require 'validation';
    $sucessAuth="commands.php";    
    $lines=file($_FILES['fileUpload']['tmp_name']);
    $conn=  dbOpen();
    $filename=$_FILES['fileUpload']['name'];
    if($filename==="Position.txt") {
    foreach($lines as $numlines=>$line)
    {
    //echo "line: ".$lines;
    list($phone,$latitude,$longitude,$date,$time,$speed,$direction)=explode("|",$line);
    fetchPosition($conn,trim($phone),trim($latitude),trim($longitude),trim($date),trim($time),trim($speed),trim($direction));
    /*echo $phone;
    echo $latitude;
    echo $longitude;
    echo $date;
    echo $time;
    echo $speed;
    echo $direction;*/
    }
    }
    else
        {
        dbClose($conn);
        header("Location: Denegado.php");
        throw new Exception("File Invalid");
        }
    
    dbClose($conn);
