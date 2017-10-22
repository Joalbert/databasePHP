<?php
require '../Utility/dbConnect.php';
require '../Utility/validation.php';

ob_start();
session_start();
validateSession();

$email=$_SESSION['email'];
        
$sucessReg="registerCar.php";
$unsucessReg="registerCar.php";        
        

    $carMfr=validateName(filter_input(INPUT_POST,'carMfr'));
    $carMdl=  validateString(filter_input(INPUT_POST,'carMdl'));
    $carColor= validateName(filter_input(INPUT_POST,'carColor'));
    $carPlate=  validateString(filter_input(INPUT_POST,'carPlate'));
    $carType=  validateString(filter_input(INPUT_POST,'carType'));
    $carDate=validateDate(filter_input(INPUT_POST,'carDate'));
    
// Validacion de carro ya registrado en la base de datos existencia en la base de datos    

    if($carMfr!==FALSE && $carMdl!==FALSE && $carColor!==FALSE
            && $carPlate!==FALSE && $carType!==FALSE && $carDate!==FALSE)
    {
    $conn =dbOpen();
 
if(fetchCar($conn,$carMfr,$carMdl,$carColor,$carPlate,$carType)) 
    {
    // Seleccion del Carid     
    $carId=  carId($conn, $carType, $carMfr, $carMdl, $carColor, $carPlate);
    $userId=  userId($conn, $email);
    $date=date('Y-m-d');
    if(fetchUserCar($conn, $carId, $userId, $date))
        {$_SESSION["registerCar"]=0;
        dbClose($conn);
        header("Location:".$sucessReg);}
        // "Location:".
    } 
   else 
    {
        dbClose($conn);
        header("Location:".$unsucessReg);
    }

    }
    
    else
        {
        header("Location:".$unsucessReg);
    }

