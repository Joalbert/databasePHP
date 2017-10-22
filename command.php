<?php
require '../Utility/dbConnect.php';
require '../Utility/validation.php';
session_start();
validateSession();

date_default_timezone_set('UTC-4.5');
$cmdId=  filter_input(INPUT_POST,'commands');
echo $cmdId;
$carId=  filter_input(INPUT_POST,'cars');
echo $carId;
if($cmdId!==FALSE && $carId!==FALSE)
{    
$conn=  dbOpen();
$trackerIdcar=  trackerIdcar($conn, $carId);
$date=date('Y-m-d');
$time=date('H:i:s');
$status=0;
if(fetchTrackerCommand($conn,$trackerIdcar,$cmdId,$date,$time,$status)===TRUE)
{
    header('Location: sucessComand.php');

}
else {
    header('Location: mapaPosition.php');
    }
dbClose($conn); 
}
else{
    header('Location: mapaPosition.php');
    }


