<?php

function validateSession()
{
    //session_start();
    date_default_timezone_set('UTC-4.5');
    $dateloggin=$_SESSION["AuthTime"];
    $ip=  getenv("REMOTE_ADDR");
    $tryAuth=$_SESSION['counterAccess'];
    
    //echo $tryAuth;
    //echo $_SESSION['Auth'];    
    //echo $_SESSION['email'];
    //echo $_SESSION['AuthTime'];
    //echo $_SESSION['counterAccess'];
    //echo $_SESSION['ip'];
    
    $dateResult=dateCompare($dateloggin);
    //echo $dateResult;
    $cond=$tryAuth>5 && $dateResult===0;
    //$cond=FALSE;
    //echo $cond;
    //echo $_SESSION["Auth"];
    //echo dateCompare($dateloggin);
    if($cond)
    {
    header("HTTP/1.1 401 Unauthorized");
    header("Location: ../Utility/Denegado.php");
    throw new Exception("Acceso No Autorizado");
    } /*else if($ip!==$_SESSION['ip'])
    {
    header("Location: auth.php");
    throw new Exception("Too much time without Log in");
    }*/
    
}

function validateSessionAdm()
{
    session_start();
    date_default_timezone_set('UTC-4.5');
    $unsucessAuth="authAdmError.php";
    $dateloggin=$_SESSION["AuthTimeAdm"];
    $ip=  getenv("REMOTE_ADDR");
    //echo $diff;
    
    if($_SESSION["AuthAdm"]===0 || dateCompare($dateloggin)>30||$ip!==$_SESSION['ip'])
    {
    session_abort();
    header("Location:".$unsucessAuth);
    }
}

function dateCompare($dateloggin)
{
    $currentDay=explode("-",date('Y-m-d'));
    
    $loggin=explode("-",$dateloggin);
    $diff=($currentDay[0]-$loggin[0])*360+($currentDay[1]-$loggin[1])*32+($currentDay[2]-$loggin[2]);
    //echo $currentDay[0];
    //echo $currentDay[1];
    //echo $currentDay[2];
    
    //echo $loggin[0];
    //echo $loggin[1];
    //echo $loggin[2];*/
    //echo $diff;
    return $diff;
}
/** Valida que la entrada de datos del usuario no tenga informacion
 * suceptible a ataque XSS
 * @param word es la palabra que se desea validar
 * @return se regresa la palabra saneada o falso si esta palabra no es valida 
*/
function validateInput($word,$pattern)
{   
   // echo $word;
    if(preg_match($pattern, $word)) {
     //  echo "Si";
        return $word;}
    else {//echo "No";
        return FALSE;}
}
        
function validateName($word)
{   
    $pattern="/^[a-zA-Z]+$/i";
    return validateInput(htmlentities($word,ENT_QUOTES|ENT_HTML5,"UTF-8"), 
            $pattern);
}

function validateDate($date)
{
    $pattern="/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/";
    echo $date;
    return validateInput(htmlentities($date,ENT_QUOTES|ENT_HTML5,"UTF-8"), 
            $pattern);
}


function validateString($word)
{   
    $pattern="/^[a-zA-Z0-9]+$/";
    return validateInput(htmlentities($word,ENT_QUOTES|ENT_HTML5,"UTF-8"), 
            $pattern);
}

function validateStringSpecial($word)
{   
    $pattern="/[^?:|\"\']+$/";
    return validateInput(htmlentities($word,ENT_QUOTES|ENT_HTML5,"UTF-8"), 
            $pattern);
}


function validateStringSpecialCmd($word)
{   
    $pattern="/[^?:|\"\']+$/";
    return validateInput($word,$pattern);
}

function validateNumber($word)
{   
    $pattern="/^[0-9]+$/";
    return validateInput(htmlentities($word,ENT_QUOTES|ENT_HTML5,"UTF-8"), 
            $pattern);
}
/**
 * @author Joalbert Palacios    
 * esta funcion valida si es correcto que la pagina salta de una url
 * de la pagina a otra arbitraria
 * @param to: es la pagina a la que se desea ir
*/
function url_locator($to)
{
   $from= $_SERVER['REQUEST_URI'];
   $fromArray=explode("/",$from);
   $fromPage=$fromArray[sizeof($fromArray)-1];
   echo $fromPage;
   $validAddress[0][0]="auth.php";
   $validAddress[1][0]="auth1.php";
   $validAddress[2][0]="registerUser.php";
   $numberLocation[0]=3;
   
   $validAddress[0][1]="auth1.php";
   $validAddress[1][1]="Menu.php";
   $validAddress[2][1]="authError.php";
   $numberLocation[1]=3;
   
   
   $validAddress[0][2]="registerUser.php";
   $validAddress[1][2]="auth.php";
   $validAddress[2][2]="regError.php";
   $numberLocation[2]=3;
   
   
   $validAddress[0][3]="Menu.php";
   $validAddress[1][3]="registerCar.php";
   $validAddress[2][3]="mapaPosition.php";
   $validAddress[3][3]="facturacion.php";
   $validAddress[4][3]="mapaHist.php";
   $validAddress[5][3]="authError.php";
   $numberLocation[3]=6;
   
   
   $validAddress[0][4]="registerCar.php";
   $validAddress[1][4]="registerCar1.php";
   $validAddress[2][4]="mapaPosition.php";
   $validAddress[3][4]="facturacion.php";
   $validAddress[4][4]="mapaHist.php";
   $validAddress[5][4]="authError.php";
   $validAddress[6][4]="Menu.php";
   $numberLocation[4]=7;
   
   $validAddress[0][5]="registerCar1.php";
   $validAddress[1][5]="registerCar.php";
   $validAddress[2][5]="authError.php";
   $numberLocation[5]=3;
   
   $validAddress[0][6]="mapaPosition.php";
   $validAddress[1][6]="command.php";
   $validAddress[2][6]="registerCar.php";
   $validAddress[3][6]="facturacion.php";
   $validAddress[4][6]="mapaHist.php";
   $validAddress[5][6]="authError.php";
   $validAddress[6][6]="Menu.php";
   $numberLocation[6]=7;
   
   $validAddress[0][7]="command.php";
   $validAddress[1][7]="sucessComand.php";
   $validAddress[2][7]="mapaPosition.php";
   $validAddress[3][7]="authError.php";
   $numberLocation[7]=4;
   
   $validAddress[0][8]="facturacion.php";
   $validAddress[1][8]="registerPayment.php";
   $validAddress[2][8]="registerCar.php";
   $validAddress[3][8]="mapaPosition.php";
   $validAddress[4][8]="mapaHist.php";
   $validAddress[5][8]="authError.php";
   $validAddress[6][8]="Menu.php";
   $numberLocation[8]=7;
   
   $validAddress[0][9]="registerPayment.php";
   $validAddress[1][9]="facturacion.php";
   $validAddress[2][9]="authError.php";
   $numberLocation[9]=3;
   
   $validAddress[0][10]="mapaHist.php";
   $validAddress[1][10]="registerCar.php";
   $validAddress[2][10]="facturacion.php";
   $validAddress[3][10]="mapaPosition.php";
   $validAddress[4][10]="authError.php";
   $validAddress[5][10]="Menu.php";
   $numberLocation[10]=6;
   
   echo "h";
   $i=findFromIndex($validAddress,$fromPage);
   $vectorAddress= array_column($validAddress, $i);
   
   $isValid=0;
   for($j=0,$final=$numberLocation[$i];j<$final;$j++)
   {
       echo $vectorAddress[j];
       if($vectorAddress===$to){$isValid=1;}
   }
   if($isValid===1) {
//header("Location:".$to);
    echo "0";
       
   }
   
   else {
       //header("Location:".$validAddress[1][2]);
       echo "1";
   }
}

function findFromIndex($validAddress,$word)
{
    $index=-1;
    $final=sizeof($validAddress);
    for($i=0,$final=10;$i<$final;$i++)
    {
    if($validAddress[0][$i]===$word){$index=$i;
                                $i=$final;}    
    }
    echo $index;
    return $index;
}