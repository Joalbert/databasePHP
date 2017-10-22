<?php

    require 'dbConnect.php';
    $conn=  dbOpen();
    //$sucessAuth="commands.php";    
    $lines=file($_FILES['fileUpload']['tmp_name']);
    $filename=$_FILES['fileUpload']['name'];
    if($filename==="commandStatusAck.txt")
    {
    foreach($lines as $numlines=>$line)
    {
    //echo "line: ".$line;
    list($command,$phone,$msg,$id)=explode("|",$line);
    UpdateComHist($conn,trim($id));
    //echo $phone;
    //echo $command;
    //echo $msg;
    //echo $id;
    }
    
    dbClose($conn);}  else {
        dbClose($conn);
        header("Location: Denegado.php");
        throw new Exception("File Invalid");
        
}