<?php
 require 'dbConnect.php';
 require 'accountBalance.php';
        
 function tableHeader($theader)
 {
     echo "<th>";
     echo $theader;
     echo "</th>";
 }

 function tableData($tdata)
 {
    echo "<td>";
    echo $tdata;
    echo "</td>";
 
 }

 function tableDataClass($tdata,$classname)
 {
    echo "<th class='$classname'>";
    echo $tdata;
    echo "</th>";
 
 }
 
 function userCars($email)
 {
     $conn=dbOpen();
     //echo $email;
     $userId=userId($conn,$email);
     //echo $userId;
     $userCarQuery=userCarDB($conn,$userId);
     
     echo "<select name='cars' class=col-md-8>"; 
     echo "<option value=' '> </option>";
       
     while($values=$userCarQuery->fetch_assoc())
     {
     echo "<option value='".filter_var($values['carId'],FILTER_SANITIZE_NUMBER_INT)."'>";
     echo filter_var($values['name'],FILTER_SANITIZE_STRING). " / ";
     echo filter_var($values['lastName'],FILTER_SANITIZE_STRING) . " / ";
     echo filter_var($values['email'],FILTER_SANITIZE_EMAIL) . " / ";
     echo filter_var($values['carMfr'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carMdl'],FILTER_SANITIZE_STRING)." / "; 
     echo filter_var($values['carColor'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carPlate'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carType'],FILTER_SANITIZE_STRING).".";
     echo "</option>";
     }
     
     echo "</select>";
     dbClose($conn);
 }
 
 function userCarsAll()
 {
     $conn=dbOpen();
     //echo $email;
     $userCarQuery=userCarAllDB($conn);
     
     echo "<select name='cars' class=col-md-8>"; 
    
     echo "<option value=' '> </option>";
    
     while($values=$userCarQuery->fetch_assoc())
     {
     echo "<option value='".filter_var($values['carId'],FILTER_SANITIZE_NUMBER_INT)."'>";
     echo filter_var($values['name'],FILTER_SANITIZE_STRING) . " / ";
     echo filter_var($values['lastName'],FILTER_SANITIZE_STRING) . " / ";
     echo filter_var($values['email'],FILTER_SANITIZE_STRING) . " / ";
     echo filter_var($values['carMfr'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carMdl'],FILTER_SANITIZE_STRING)." / "; 
     echo filter_var($values['carColor'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carPlate'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carType'],FILTER_SANITIZE_STRING).".";
     echo "</option>";
     }
     
     echo "</select>";
     dbClose($conn);
 }
 
 function userCarsAllTable()
 {
     $conn=dbOpen();
     //echo $email;
    $userCarQuery=userCarAllDB($conn);
     
     echo "<table name='userCars' class='table table-bordered info table-hover'><thead>";
     tableHeader("Nombre");
     tableHeader("Apellido");
     tableHeader("Correo");
     tableHeader("Fabricante");
     tableHeader("Módelo");
     tableHeader("Color");
     tableHeader("Placa");
     tableHeader("Tipo de Carro");
     echo "</thead><tbody>";
                                        
     while($values=$userCarQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['name'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['lastName'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['email'],FILTER_SANITIZE_EMAIL));
    tableData(filter_var($values['carMfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carMdl'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carColor'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carPlate'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carType'],FILTER_SANITIZE_STRING));
    echo "</tr>";
     }
    
     echo "</tbody></table>";
     dbClose($conn);
 }
function tableHeaderUser()
 {
    echo"<thead>";
     tableHeader("Nombre");
     tableHeader("Apellido");
     tableHeader("Fecha de Nacimiento");
     tableHeader("Correo Electrónico");
     tableHeader("C.I.");
     tableHeader("Teléfono de Contacto");
     tableHeader("Clave");
    echo "</thead>";
    
 }
 function userAllTable()
 {
    $conn=dbOpen();
    $userQuery=userDB($conn);
     echo "<table name='user' class='table table-bordered info table-hover'>";
     tableHeaderUser();
     echo "<tbody>";
     while($values=$userQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['name'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['lastName'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['email'],FILTER_SANITIZE_EMAIL));
    tableData($values['birthday']);
    tableData(filter_var($values['IDcard'],FILTER_SANITIZE_NUMBER_INT));
    tableData(filter_var($values['phone'],FILTER_SANITIZE_NUMBER_INT));
    tableData($values['password']);
    echo "</tr>";
     }
    echo "</tbody></table>";
     dbClose($conn);
 }

 function carAllTable()
 {
    $conn=dbOpen();
    $userQuery=carDB($conn);
     echo "<table name='car' class='table table-bordered info table-hover'>";
     tableHeader("Fabricante");
     tableHeader("Módelo");
     tableHeader("Color");
     tableHeader("Placas");
     tableHeader("Tipo de Carro");
     echo "<tbody>";
     while($values=$userQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['carMfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carMdl'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carColor'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carPlate'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carType'],FILTER_SANITIZE_STRING));
    echo "</tr>";
     }
    echo "</tbody></table>";
     dbClose($conn);
 }

 
function tableHeadertrackerCar()
 {
    echo"<thead>";
     tableHeader("Fabricante del Carro");
     tableHeader("Módelo del Carro");
     tableHeader("Color del Carro");
     tableHeader("Placa del Carro");
     tableHeader("Tipo de Carro");
     tableHeader("Teléfono Tracker");
     tableHeader("Clave");
     tableHeader("Fabricante del Tracker");
     tableHeader("Módelo del Tracker");    
     echo "</thead>";
    
 }

 
 function TrackerCarAllTable()
 {
    $conn=dbOpen();
    $trackerCarQuery=trackerCarDB($conn);
     echo "<table name='trackerCar' class='table table-bordered info table-hover'>";
     tableHeadertrackerCar();
     echo "<td>";
     while($values=$trackerCarQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['carMfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carMdl'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carColor'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carPlate'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carType'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['phone'],FILTER_SANITIZE_NUMBER_INT));
    tableData($values['password']);
    tableData(filter_var($values['mfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['mdl'],FILTER_SANITIZE_STRING));
    
    echo "</tr>";
     }
    echo "</tbody></table>";
     dbClose($conn);
 }

 function userCarsTable($email)
 {
     $conn=dbOpen();
     //echo $email;
     $userId=userId($conn,$email);
     //echo $userId;
     $userCarQuery=userCarDB($conn,$userId);
     
     echo "<table name='cars' class=col-md-12><thead>";
     tableHeader("Tipo de Carro");
     tableHeader("Fabricante");
     tableHeader("Módelo");
     tableHeader("Color");
     tableHeader("Placa");
     echo "</thead><tbody>";
                                        
     while($values=$userCarQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['carType'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carMfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carMdl'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carColor'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['carPlate'],FILTER_SANITIZE_STRING));
    echo "</tr>";
     }
    
     echo "</tbody></table>";
     dbClose($conn);
 }

 function invoiceHist()
 {
     $conn=dbOpen();
     
//echo $email;
     
     $userQuery=userDB($conn);
     
     echo "<table name='balanceHist' class='table table-bordered info table-hover'>"; 
     
     echo "<thead>";
     tableHeader("Nombre");
     tableHeader("Apellido");
     tableHeader("Deuda");
     echo "</thead>";
     echo "<tbody>";
                                        
     while($values=$userQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['name'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['lastName'],FILTER_SANITIZE_STRING));
    tableData(filter_var(balance($conn, $values['email'],
            FILTER_SANITIZE_NUMBER_FLOAT)));
    echo "</tr>";
     }
    
     echo "</tbody>";
                     
     echo "</table>";
     dbClose($conn);
    
 }

 
 function paymentHeader($name,$lastName,$email,$phone)
 {
            echo "<p> <span style='font-weight:bold;'>Nombre: </span> ".
                    filter_var($name,FILTER_SANITIZE_STRING)."</p>".
                    "<p> <span style='font-weight:bold;'>Apellido: </span>".
                    filter_var($lastName,FILTER_SANITIZE_STRING)."</p>".
                    "<p> <span style='font-weight:bold;'>Correo Electrónico: </span>".
                    filter_var($email,FILTER_SANITIZE_EMAIL)."</p>".
                    "<p> <span style='font-weight:bold;'>Teléfono: </span>".
                    filter_var($phone,FILTER_SANITIZE_NUMBER_INT)."</p>".
                    "<thead>";
            echo "<table class='table table-bordered info table-hover'>";        
            tableHeader("Banco Origen");
            tableHeader("Cantidad Pagada");
            tableHeader("Número de Confirmación");
            tableHeader("Fecha");
            echo "</thead>";}
 
 function userPaymentTable($conn,$email)
 {
  $userInvoiceQry=userPaymentDB($conn,$email);     
  $i=0;
    while($values=$userInvoiceQry->fetch_assoc())
        {
        if($i==0)
        {$i=1;
        paymentHeader($values['name'],$values['lastName'],$values['email'],$values['phone']);
        }
            echo "<tbody><tr>";
            tableData(filter_var($values['Bank'],FILTER_SANITIZE_STRING));
            tableData(filter_var($values['amountPaid'],FILTER_SANITIZE_NUMBER_FLOAT));
            tableData(filter_var($values['confirmationNumber'],FILTER_SANITIZE_STRING));
            tableData($values['paymentDate']);
            echo "</tr></tbody>";
            $i++;}
        echo '</table>';
                }
 
 
 function userCarsCheckBox($email)
 {
     $conn=dbOpen();
     //echo $email;
     $userId=userId($conn,$email);
     //echo $userId;
     $userCarQuery=userCarDB($conn,$userId);
     $i=1;
     while($values=$userCarQuery->fetch_assoc())
     {
     //echo "<input type='checkbox'>";
     echo "<span style='display:none'id='con$i'>";
     echo filter_var($values['carId'],FILTER_SANITIZE_NUMBER_INT);
     echo "</span><span style='display:none'> ";
     echo filter_var($values['carMfr'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carMdl'],FILTER_SANITIZE_STRING)." / "; 
     echo filter_var($values['carColor'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carPlate'],FILTER_SANITIZE_STRING)." / ";
     echo filter_var($values['carType'],FILTER_SANITIZE_STRING);
     //echo "</input>";
     echo "</span>";
     $i++;
     }
     
     dbClose($conn);
 }
 
 
 function dataHeaderPosition()
 {
     echo "<table name='positionTracker' class='table' ";
     echo "style='display:none'";
     echo "><thead>";
     tableHeader("Data");
     echo "</thead>";
                
 }
 
 function dataBodyPosition($positionTrackerQry)
 {
     $i=0;
     while($values=$positionTrackerQry->fetch_assoc())
                {
                    $i++;
                    echo "<tbody><tr>";
                    echo "<th id='car$i'>". filter_var($values['carId'],
                            FILTER_SANITIZE_NUMBER_INT)."|";
                    echo filter_var($values['carType'],FILTER_SANITIZE_STRING)."|";
                    echo filter_var($values['carMfr'],FILTER_SANITIZE_STRING)."|";
                    echo filter_var($values['carMdl'],FILTER_SANITIZE_STRING)."|";
                    echo filter_var($values['carColor'],FILTER_SANITIZE_STRING)."|";
                    echo filter_var($values['carPlate'],FILTER_SANITIZE_STRING)."|";
                    echo $values['latitude']."|";
                    echo $values['longitude']."|";
                    echo $values['date']."|";
                    echo $values['time']."|";
                    echo filter_var($values['speed'],FILTER_SANITIZE_NUMBER_FLOAT)."|";
                    echo filter_var($values['direction'],FILTER_SANITIZE_NUMBER_FLOAT);
                    echo "</th></tr>";
                    echo "</tbody>";         
                 }
    echo "</table>";             
 }
 function cmdMfrDesc()
 {
    $conn=  dbOpen();
    $cmdMfrDescQry=cmdMfrDB($conn);
    
    echo "<table name='cmdMfrTable'class='table table-striped table-bordered info table-hover'><thead>";
    tableHeader("Fabricante");
    tableHeader("Módelo");
    tableHeader("Comando");
    tableHeader("Descripción");
    echo "</thead>";
     
    echo "<tody>";
                    
    while($values=$cmdMfrDescQry->fetch_assoc())
                {
                    echo "<tr>";
                    tableData(filter_var($values['mfr'],FILTER_SANITIZE_STRING));
                    tableData(filter_var($values['mdl'],FILTER_SANITIZE_STRING));
                    tableData(filter_var($values['comName'],FILTER_SANITIZE_STRING));
                    tableData(filter_var($values['trackerCmdDesc'],FILTER_SANITIZE_STRING));
                    echo "</tr>";
                }    
 
    echo "</tbody></table>";
                                
   }
   
   
   function commandsTable()
 {
     $conn=dbOpen();
     //echo $email;
     //$userId=userId($conn $email);
     //echo $userId;
     $cmdQuery=cmdDB($conn);
     
    echo "<table name='commandTable' class='table table-striped"
     . " table-bordered info table-hover'><thead>";
    tableHeader("Fabricante");
    echo "</thead>";
    echo "<tbody>";
    
     while($values=$cmdQuery->fetch_assoc())
     {
     echo "<tr>";
     tableData(filter_var($values['comName'],FILTER_SANITIZE_STRING));
     echo "</tr>";
     }
     echo "</tbody></table>";
     
     dbClose($conn);
 }

   
   function trackerMfrTable()
 {
     $conn=dbOpen();
     //echo $email;
     //$userId=userId($conn $email);
     //echo $userId;
     $cmdQuery=trackerMfrMdlDB($conn);
     
        echo "<table name= 'trackerMfrs' class='table "
     . "table-striped table-bordered info table-hover'><thead>";
    tableHeader("Fabricante");
    tableHeader("Módelo");
    echo "<tbody>";
        
     while($values=$cmdQuery->fetch_assoc())
     {
    echo "<tr>";
    tableData(filter_var($values['mfr'],FILTER_SANITIZE_STRING));
    tableData(filter_var($values['mdl'],FILTER_SANITIZE_STRING));
    echo "</tr>";
    
    }
     echo "</tbody></table>";
     
     dbClose($conn);
 }

 
 function positionTrackers($email)
 {
                $conn=  dbOpen();
                $userId = userId($conn, $email);        
                //echo 'Try';
                $positionTrackerQry= positionTrackerDB($conn,$userId);
                //echo 'Sucess';     
                //if($resultuserId->num_rows >0)echo "si";
                dataHeaderPosition();
                
                dataBodyPosition($positionTrackerQry);
                
                 dbClose($conn);
                 echo "</table>";
 }
 
 function commands()
 {
     $conn=dbOpen();
     //echo $email;
     //$userId=userId($conn $email);
     //echo $userId;
     $cmdQuery=cmdDB($conn);
     
     echo "<select name='commands' class='col-md-8'>";
     echo "<option value=' '> </option>";
    
     while($values=$cmdQuery->fetch_assoc())
     {
     echo "<option value='".filter_var($values['comId'],FILTER_SANITIZE_NUMBER_INT)."'>";
     echo filter_var($values['comName'],FILTER_SANITIZE_STRING);
     echo "</option>";
     }
     echo '</select>';
     dbClose($conn);
 }


 
 function trackerMfrMdl()
 {
     $conn=dbOpen();
     //echo $email;
     //$userId=userId($conn $email);
     //echo $userId;
     $cmdQuery=trackerMfrMdlDB($conn);
     
     echo "<select name='trackerMfrMdl' class='col-md-8'>";
     echo "<option value=' '> </option>";
    
     while($values=$cmdQuery->fetch_assoc())
     {
     echo "<option value='".filter_var($values['gpsMfrId'],FILTER_SANITIZE_NUMBER_INT)."'";
     echo ">";
     echo filter_var($values['mfr'],FILTER_SANITIZE_STRING).
             "/".filter_var($values['mdl'],FILTER_SANITIZE_STRING);
     echo "</option>";
     }
     echo '</select>';
     dbClose($conn);
 }
 
 
 function carsSelect()
 {
     $conn=dbOpen();
     $carQuery=carDB($conn);
     echo "<select name='cars' class='col-md-8'>";
     echo "<option value=''></option>";
     
     while($values=$carQuery->fetch_assoc())
     {
     echo "<option value=".filter_var($values['carId'],FILTER_SANITIZE_NUMBER_INT).">";
     echo filter_var($values['carMfr'],FILTER_SANITIZE_STRING).
             " / ".filter_var($values['carMdl'],FILTER_SANITIZE_STRING)." / "
             .filter_var($values['carColor'],FILTER_SANITIZE_STRING)." / "
             .filter_var($values['carPlate'],FILTER_SANITIZE_STRING)." / ".
                     filter_var($values['carType'],FILTER_SANITIZE_STRING);
     echo "</option>";
     }
     echo "</select>";
     
     dbClose($conn);
 }
 
 function userSelect()
 {
     $conn=dbOpen();
     $userQuery=userDB($conn);
     echo "<select name='user' class='col-md-8'>";
     echo "<option value=''></option>";
     
     while($values=$userQuery->fetch_assoc())
     {
     echo "<option value='".filter_var($values['UserID'],FILTER_SANITIZE_NUMBER_INT)."'>";
     echo filter_var($values['name'],FILTER_SANITIZE_STRING).
             " / ".filter_var($values['lastName'],FILTER_SANITIZE_STRING)
             ." / ".filter_var($values['email'],FILTER_SANITIZE_EMAIL)." / "
             .$values['birthday']." / ".
             $values['IDcard']." / ".
             $values['phone'];
     echo "</option>";
     }
     echo "</select>";
     
     dbClose($conn);
 }
 
 function commandHist()
 {
     $conn=dbOpen();
     $cmdHistQuery=cmdHistDB($conn);
     while($values=$cmdHistQuery->fetch_assoc())
     {
     $command=$values['comName'];    
     if($command==="Position")
        {
        echo "call|".$values['phone']."||".$values['cmdHistId']."|\n";
        }
     else
        {
        $commDesc=$values['trackerCmdDesc'];
        //echo $commDesc;
        $commandExec=str_replace("[password]",$values['password'], $commDesc);
        //echo $commandExec;
        echo "msg|".$values['phone']."|".$commandExec."|".$values['cmdHistId']
                ."|\n";
        }
     }
     dbClose($conn);
  }
    
 function commandHistTable()
  
 {
    $conn=dbOpen();
    $cmdHistQuery=cmdHistAdmDB($conn);
    echo "<table class='table table-striped table-bordered info table-hover'><thead>";
    tableHeader("Comando");
    tableHeader("Carro");
    tableHeader("Fecha");
    tableHeader("Hora");
    tableHeader("Estado");
    echo "</thead><tbody>";
    
     while($values=$cmdHistQuery->fetch_assoc())
     {    
         echo "<tr>";
         tableData(filter_var($values['comName'],FILTER_SANITIZE_STRING));
         $carMfr=filter_var($values['carMfr'],FILTER_SANITIZE_STRING);
         $carMdl=filter_var($values['carMdl'],FILTER_SANITIZE_STRING);
         $carColor=filter_var($values['carColor'],FILTER_SANITIZE_STRING);
         $carPlate=filter_var($values['carPlate'],FILTER_SANITIZE_STRING);
         $carType=filter_var($values['carType'],FILTER_SANITIZE_STRING);
         tableData($carMfr."/ ".$carMdl."/ ".$carColor."/ ".$carPlate."/ ".$carType);
         tableData($values['date']);
         tableData($values['time']);
         $status="Pendiente";
         if((int)($values['status'])===1)$status="Ejecutado";
         tableData($status);
         echo "</tr>";
     }
     echo "</tbody>";
     dbClose($conn);
  }
 
 
 