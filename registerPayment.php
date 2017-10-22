<?php
require '../Utility/dbConnect.php';
require '../Utility/validation.php';

ob_start();
session_start();
validateSession();

$email=$_SESSION['email'];
        
$sucessReg="facturacion.php";
$unsucessReg="facturacion.php";        
        

$paymentMethod=  validateName(filter_input(INPUT_POST,'paymentMethod'));
$confirmationNumber=  validateString(filter_input(INPUT_POST,'confirmationNumber'));
$amountPaid=  validateNumber(filter_input(INPUT_POST,'amountPaid'));
$date=  validateDate(filter_input(INPUT_POST,'date'));
$bank= validateString(filter_input(INPUT_POST,'bank'));

if($paymentMethod!==FALSE && $confirmationNumber!==FALSE && $amountPaid!==FALSE
        &&$date!==FALSE && $bank!==FALSE)
{
    $conn =dbOpen();
    if(fetchPayment($conn,$date,$amountPaid,$paymentMethod,
            $confirmationNumber,$bank,$email))
            {
                $_SESSION["Facturacion"]=1;
                dbClose($conn);
                header("Location:".$sucessReg);
            }
            else
            {
            $_SESSION["Facturacion"]=0;
            dbClose($conn);
            header("Location:".$unsucessReg);
            }
}
else
{
     header("Location:".$unsucessReg);
           
}
            
        
