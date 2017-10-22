  <?php

    function dbOpen()
    {   
        $serverName="MyServer";
        $usernameDB="MyUser";
        $passwordDB="xxxxxx";
        $DB="MyDatabase";
        $conn= new mysqli($serverName,$usernameDB,$passwordDB,$DB); 
        if($conn->connect_error)
        {
        die("Connection failed: ".$conn->connect_error);
        }
        else
        {
        $conn->set_charset('utf8');
        return $conn; 
        }
    }
    
    function dbClose($conn)
    {
        $conn->close();    
    }
     
    function trackerId($conn,$phone)
    {
    $trackerId="SELECT `trackerId` FROM `GpsTracker` WHERE `phone`=?";
    //echo $validation;
    $trackerIdquery=$conn->prepare($trackerId);
    $trackerIdquery->bind_param("s",$phone);
    $trackerIdquery->execute();
    $result=$trackerIdquery->get_result();
    while($values=$result->fetch_assoc())
         {$trackerIddata=$values['trackerId'];} 
    
    return $trackerIddata;
    }
    
    function trackerIdcar($conn,$carId)
    {
    $trackerIdSQL="SELECT `trackerId` FROM `GpsTrackerCar` "
            . "WHERE `carId`=?";
    //echo $trackerIdSQL;
    //echo $carId;
    $trackerIdquery=$conn->prepare($trackerIdSQL);
    $trackerIdquery->bind_param("s",$carId);
    $trackerIdquery->execute();
    $result=$trackerIdquery->get_result();
    while($values=$result->fetch_assoc())
         {$trackerIddata=$values['trackerId'];} 
    //echo $trackerIddata;
    return $trackerIddata;
    }
    
    function userId($conn,$email)
    {
    $userIdSQL="SELECT `UserID` FROM `User` WHERE `email`=?";
    
    $userIdquery=$conn->prepare($userIdSQL);
    $userIdquery->bind_param("s",$email);
    $userIdquery->execute();
    $result=$userIdquery->get_result();
    while($values=$result->fetch_assoc())
         {$userIddata=$values['UserID'];} 
    //echo $userIddata;
    return $userIddata;
    }
    
    function carId($conn,$carType,$carMfr,$carMdl,$carColor,$carPlate)
    {
    $carIDSql="SELECT `carId` FROM `Cars` WHERE "
            . "`carType`=? AND `carMfr`=? AND "
        . "`carMdl`=? AND `carColor`=? AND `carPlate`=?";
    
    $carIDquery=$conn->prepare($carIDSql);
    $carIDquery->bind_param("sssss",$carType,$carMfr,$carMdl,$carColor,$carPlate);
    $carIDquery->execute();
    $result=$carIDquery->get_result();
    while($values=$result->fetch_assoc())
         {$carIddata=$values['carId'];} 
  //  echo $carIddata;
    return $carIddata;
    }
    
    function mfrId($conn,$mfr,$mdl)
    {
    
    $mfrIdSQL="SELECT `gpsMfrId` FROM `GpsMfr` WHERE `mfr`=? AND `mdl`=?";
    //echo $mfrIdSQL;
    $mfrIdquery=$conn->prepare($mfrIdSQL);
    $mfrIdquery->bind_param("ss",$mfr,$mdl);
    $mfrIdquery->execute();
    $result=$mfrIdquery->get_result();
    while($values=$result->fetch_assoc())
         {$mfrId=$values['gpsMfrId'];} 
    //echo $mfrId;
    return $mfrId;
    }
    
    function userCarId($conn,$carId)
    {
    $userCarIdSQL="SELECT `userCarId` FROM `UserCars` WHERE `carId`=?";
    //echo $userCarIdSQL;
    $userCarIdquery=$conn->prepare($userCarIdSQL);
    $userCarIdquery->bind_param("s",$carId);
    $userCarIdquery->execute();
    $result=$userCarIdquery->get_result();
    while($values=$result->fetch_assoc())
         {
        $userCarIddata=$values['userCarId'];
         } 
    return $userCarIddata;
    }
    
    function trackerCmdId($conn, $trackerMfrMdl,$commands)
    {
    $trackerCmdSQL="SELECT `gpsMfrCmdId` FROM `GpsMfrCmd` "
            . "WHERE `cmdId`=? and "
            . "`gpsMfrId`=?" ;
    $trackerCmdQuery=$conn->prepare($trackerCmdSQL);
    $trackerCmdQuery->bind_param("ss",$commands,$trackerMfrMdl);
    $trackerCmdQuery->execute();
    $result=$trackerCmdQuery->get_result();
    
    //echo $trackerCmdSQL;
    while($values=$result->fetch_assoc())
         {$trackerCmdId=$values['gpsMfrCmdId'];} 
    //echo $trackerCmdId;
    return $trackerCmdId;
    }
    
    function userPass($conn,$email)
    {
    $userSql="SELECT `password` FROM `User` WHERE `email`=?";
    $userQry=$conn->prepare($userSql);
    $userQry->bind_param("s",$email);
    $userQry->execute();
    $result=$userQry->get_result();
    //echo $trackerCmdSQL;
    while($values=$result->fetch_assoc())
         {$password=$values['password'];} 
    //echo $trackerCmdId;
    return $password;
    
    }
    
    function CmdId($conn,$cmdName)
        {
    $CmdSQL="SELECT `comId` FROM `Commands` WHERE `comName`=?";
    echo $CmdSQL;
    
    $CmdQuery=$conn->prepare($CmdSQL);
    $CmdQuery->bind_param("s",$cmdName);
    $CmdQuery->execute();
    $result=$CmdQuery->get_result();
    
    while($values=$result->fetch_assoc())
         {$cmdId=$values['comId'];} 
    echo $cmdId;
    return $cmdId;   
    }
    
    function userAuth($conn,$email,$password)
    {
    $userSql="SELECT `email`,`password` FROM `User` WHERE `email`=? AND `password`=?";
    $userQry=$conn->prepare($userSql);
    $userQry->bind_param("ss",$email,$password);
    $userQry->execute();
    $result=$userQry->get_result();
    return $result;
    }
    
    function trackerDateDB($conn)
    {
    $trackerIdSQL="SELECT * FROM `TrackerCarUserIdsDateView`";
    $trackerIdquery=$conn->prepare($trackerIdSQL);
    $trackerIdquery->execute();
    $result=$trackerIdquery->get_result();
   // $trackerIdquery=$conn->query($trackerIdSQL);
    return $result;
    //return $trackerIdquery;
    }
    
    function carDB($conn)
    {
    $carSQL="SELECT * FROM `Cars`";
    $carQuery=$conn->prepare($carSQL);
    $carQuery->execute();
    $result=$carQuery->get_result();
    
    return $result;
    }
    
    function InvoiceDB($conn,$email)
    {
    $SqlInvoice="SELECT `email`,Sum(amountOwed)AS 'amount' FROM `Invoice`,`User` WHERE "
            . "Invoice.userId=User.userId AND User.email=? GROUP BY `email`";
    $queryInvoice=$conn->prepare($SqlInvoice);
    $queryInvoice->bind_param("s",$email);
    $queryInvoice->execute();
    $result=$queryInvoice->get_result();
    
    return $result;
    }
    
    
    function PaymentDB($conn,$email)
    {
    $SqlPayment="SELECT `email`,Sum(amountPaid) AS 'amount' FROM `Payment`,`User` WHERE "
            . "Payment.userId=User.userId AND User.email=? GROUP BY `email`";
    $queryPayment=$conn->prepare($SqlPayment);
    $queryPayment->bind_param("s",$email);
    $queryPayment->execute();
    $result=$queryPayment->get_result();
    return $result;
    }
    
    function cmdMfrDB($conn)
    {
    $cmdMfrSQL="SELECT * FROM `CmdMfrView`";
    
    $cmdMfrQuery=$conn->prepare($cmdMfrSQL);
    $cmdMfrQuery->execute();
    $result=$cmdMfrQuery->get_result();
    
    return $result;
    }
    
    function positionTrackerDB($conn,$userId)
    {
    $positionTrackerSQL="SELECT * FROM `UserCarsTrackerPositionView` "
            . "WHERE userId = ? ORDER BY `date` DESC LIMIT 0, 100";
    //echo $userId;
    $positionTrackerQry=$conn->prepare($positionTrackerSQL);
    $positionTrackerQry->bind_param("s",$userId);
    $positionTrackerQry->execute();
    $result=$positionTrackerQry->get_result();
    return $result;
    
    }
    
    function trackerCarDB($conn)
    {
    $trackerCarSQL="SELECT TrackerCarUserIdsDateView.carMfr,TrackerCarUserIdsDateView.carMdl, "
            . "TrackerCarUserIdsDateView.carColor, TrackerCarUserIdsDateView.carPlate, "
            . "TrackerCarUserIdsDateView.carType, TrackerMfrView.phone, "
            . "TrackerMfrView.password, TrackerMfrView.mfr, TrackerMfrView.mdl "
            . "FROM TrackerMfrView INNER JOIN TrackerCarUserIdsDateView "
            . "ON TrackerCarUserIdsDateView.trackerId=TrackerMfrView.trackerId";
    $trackerCarQuery=$conn->prepare($trackerCarSQL);
    $trackerCarQuery->execute();
    $result=$trackerCarQuery->get_result();
    return $result;
    }
    
    function userDB($conn)
    {
    $userSQL="SELECT * FROM `User`";
    $userQuery=$conn->prepare($userSQL);
    $userQuery->execute();
    $result=$userQuery->get_result();
    
    return $result;
    }
    
    function userCarDB($conn,$userId)
    {
    $userCarSQL="SELECT * FROM `UserIdCarIdView` WHERE UserID='$userId'";
    $userCarQuery=$conn->prepare($userCarSQL);
    $userCarQuery->bind_param("s",$userId);
    $userCarQuery->execute();
    $result=$userCarQuery->get_result();
    return $result;
    }
    
    function userPaymentDB($conn,$email)
    {
    $userPaymentSQL="SELECT * FROM `UserInvoicesView` WHERE `email`='$email'";
    $userPaymentQry=$conn->prepare($userPaymentSQL);
    $userPaymentQry->bind_param("s",$email);
    $userPaymentQry->execute();
    $result=$userPaymentQry->get_result();
    return $result;
    }
    
    function userCarAllDB($conn)
    {
    $userCarSQL="SELECT * FROM `UserIdCarIdView`";
    $userCarQuery=$conn->prepare($userCarSQL);
    $userCarQuery->execute();
    $result=$userCarQuery->get_result();
    return $result;
    }
    
     function cmdDB($conn)
    { 
    $cmdSQL="SELECT * FROM `Commands` ";
    $cmdQuery=$conn->prepare($cmdSQL);
    $cmdQuery->execute();
    $result=$cmdQuery->get_result();
    return $result;
    }

     function trackerMfrMdlDB($conn)
    { 
    $trackerMfrMdlSQL="SELECT * FROM `GpsMfr` ";
    $trackerMfrMdlQuery=$conn->prepare($trackerMfrMdlSQL);
    $trackerMfrMdlQuery->execute();
    $result=$trackerMfrMdlQuery->get_result();
    return $result;
    }
    
    function cmdHistDB($conn)
    { 
    $cmdHistSQL="SELECT * FROM `TrackerHistCommandView` WHERE `status`=0";
    $cmdHistQuery=$conn->prepare($cmdHistSQL);
    $cmdHistQuery->execute();
    $result=$cmdHistQuery->get_result();
    return $result;
    }

    function cmdHistAdmDB($conn)
    { 
    $cmdHistSQL="SELECT `comName`,`carMfr`,`carMdl`,`carColor`,`carPlate`, "
            . "`carType`,`date`,`time`,`status` FROM `CommandHist` LEFT OUTER JOIN"
            . " `UserCarTrackerCmdView` "
            . "ON `CommandHist`.`trackerId`=`UserCarTrackerCmdView`.trackerId "
            . "and `UserCarTrackerCmdView`.`cmdId`=CommandHist.cmdId "
            . "ORDER BY `date` DESC LIMIT 0, 20";
    $cmdHistQuery=$conn->prepare($cmdHistSQL);
    $cmdHistQuery->execute();
    $result=$cmdHistQuery->get_result();
    return $result;
    }

        function repeatedTracker($conn,$phone)
    {
        $trackerSQL="SELECT * FROM `GpsTracker` WHERE `phone`=?";
        $repeatedTrackerQry=$conn->prepare($trackerSQL);
        $repeatedTrackerQry->bind_param("s",$phone);
        $repeatedTrackerQry->execute();
        $result=$repeatedTrackerQry->get_result();
        return $result->num_rows>0;
    }
   
         function repeatedInvoice($conn,$date,$carid)
    {
        $trackerSQL="SELECT * FROM `Invoice` WHERE `carId`=?";
        $repeatedTrackerQry=$conn->prepare($trackerSQL);
        $repeatedTrackerQry->bind_param("s",$carid);
        $repeatedTrackerQry->execute();
        $result=$repeatedTrackerQry->get_result();
        $condition=FALSE;
        while($values=$result->fetch_assoc())
            {
            $invoiceDate=$values['invoiceDate'];
            $invDated=explode("-",$invoiceDate);
            $curDated=explode("-",$date);
            $condition=$condition||($curDated[0]===$invDated[0]&&$curDated[1]===$invDated[1]);
            }
        return $condition; 
    }
    
      function repeatedPayment($conn,$confirmationNumber)
    {
        $repeatedPaymentSQL="SELECT * FROM `Payment` WHERE `confirmationNumber`=?";
        $repeatedPaymentQry=$conn->prepare($repeatedPaymentSQL);
        $repeatedPaymentQry->bind_param("s",$confirmationNumber);
        $repeatedPaymentQry->execute();
        $result=$repeatedPaymentQry->get_result();
        return $result->num_rows>0; 
    }
    
    
    function repeatedPosition($conn,$trackerIddata,$date,$time)
    {
       $trackerIdDateTime="SELECT * FROM `TrackerPosition` WHERE `trackerId`=? "
                    . "AND date=? AND time=?";
        //echo $trackerIdDateTime;
        $repeatedPositionQry=$conn->prepare($trackerIdDateTime);
        $repeatedPositionQry->bind_param("sss",$trackerIddata,$date,$time);
        $repeatedPositionQry->execute();
        $result=$repeatedPositionQry->get_result();
        return $result->num_rows>0;    
    }
     function repeatedCommand($conn,$cmdName)
    {
        $commandSQL="SELECT * FROM `Commands` WHERE `comName`=?";
        $repeatedCommandQry=$conn->prepare($commandSQL);
        $repeatedCommandQry->bind_param("s",$cmdName);
        $repeatedCommandQry->execute();
        $result=$repeatedCommandQry->get_result();
        return $result->num_rows>0;     
    }
   
       function repeatedUser($conn,$email)
    {
        $UserSQL="SELECT * FROM `User` WHERE `email`=?";
        $repeatedUserQry=$conn->prepare($UserSQL);
        $repeatedUserQry->bind_param("s",$email);
        $repeatedUserQry->execute();
        $result=$repeatedUserQry->get_result();
        return $result->num_rows>0;     
    }
 
    function repeatedCar($conn,$carMfr,$carMdl,$carColor,$carPlate,$carType)
    {
        $carSQL="SELECT `carId` FROM `Cars` WHERE `carType`=? AND `carMfr`=? AND "
        . "`carMdl`=? AND `carColor`=? AND `carPlate`=?";
        $repeatedCarQry=$conn->prepare($carSQL);
        $repeatedCarQry->bind_param("sssss",$carMfr,$carMdl,$carColor,$carPlate,$carType);
        $repeatedCarQry->execute();
        $result=$repeatedCarQry->get_result();
        echo $result->num_rows>0;
        return $result->num_rows>0;     
    }
    
     function repeatedUserCar($conn,$carId)
    {
        $userCarSQL="SELECT `carId` FROM `UserCars` WHERE `carId`=?";
        $repeateduserCarQry=$conn->prepare($userCarSQL);
        $repeateduserCarQry->bind_param("s",$carId);
        $repeateduserCarQry->execute();
        $result=$repeateduserCarQry->get_result();
        return $result->num_rows>0;         
    }
   
     function repeatedMfrMdl($conn,$trackerMfr,$trackerMdl)
    {
        $MfrMdlSQL="SELECT * FROM `GpsMfr` "
               . "WHERE `mfr`=? AND `mdl`=?";
        $repeatedMfrMdlQry=$conn->prepare($MfrMdlSQL);
        $repeatedMfrMdlQry->bind_param("ss",$trackerMfr,$trackerMdl);
        $repeatedMfrMdlQry->execute();
        $result=$repeatedMfrMdlQry->get_result();
        return $result->num_rows>0;         
    }
   
    function repeatedMfrMdlCmd($conn,$trackerMfrMdl,$commands)
    {
        $MfrMdlSQL="SELECT * FROM `GpsMfrCmd` WHERE `cmdId`=? "
               . "AND `gpsMfrId`=?";
        $repeatedMfrMdlQry=$conn->prepare($MfrMdlSQL);
        $repeatedMfrMdlQry->bind_param("ss",$commands,$trackerMfrMdl);
        $repeatedMfrMdlQry->execute();
        $result=$repeatedMfrMdlQry->get_result();
        return $result->num_rows>0;         
    }
    
     function repeatedTrackerCar($conn,$carId,$trackerId)
    {
        $trackerCarSQL="SELECT * FROM `GpsTrackerCar` "
               . "WHERE `carId`=? AND trackerId=?";
        $repeatedtrackerCarQry=$conn->prepare($trackerCarSQL);
        $repeatedtrackerCarQry->bind_param("ss",$carId,$trackerId);
        $repeatedtrackerCarQry->execute();
        $result=$repeatedtrackerCarQry->get_result();
        return $result->num_rows>0;         
    }
    
    function fetchPosition($conn,$phone,$latitude,$longitude,$date,$time,$speed,$direction)
    {
    $trackerIddata=  trackerId($conn,$phone);        
    //echo $trackerIddata;
    //echo repeatedPosition($conn, $trackerIddata, $date, $time);
    if(!repeatedPosition($conn,$trackerIddata,$date,$time)) 
    {
    $InsertPosition="INSERT INTO `TrackerPosition`(`trackerId`, `latitude`, "
            . "`longitude`, `date`, `time`,`speed`,`direction`)"
            ."VALUES(?,?,?,?,?,?,?)";
    //echo $InsertPosition;
    $InsertPositionQry=$conn->prepare($InsertPosition);
    $InsertPositionQry->bind_param("sssssss",$trackerIddata,$latitude,$longitude,
                                    $date,$time,$speed,$direction);
    return($InsertPositionQry->execute());        
    }
    else{return FALSE;}
    }
    
    function fetchTracker($conn,$phone,$mfrid,$pass,$date)
    {
    if(!repeatedTracker($conn,$phone)) 
    {
    $InsertTrackerSQL="INSERT INTO `GpsTracker`(`phone`, `gpsMfrId`, "
    . "`password`,`date` )"
    ."VALUES(?,?,?,?)";
    $InsertTrackerQry=$conn->prepare($InsertTrackerSQL);
    $InsertTrackerQry->bind_param("ssss",$phone,$mfrid,$pass,$date);
    return($InsertTrackerQry->execute());        
    }
    else return FALSE;
    }
    
    function fetchInvoice($conn,$date,$userid,$amountOwed,$carid)
    {
            if(!repeatedInvoice($conn,$date,$carid)) 
                {
                $InsertInvoiceSQL="INSERT INTO `Invoice`(`invoiceDate`, `userId`, "
                    . "`amountOwed`,`carId`) "
                ."VALUES(?,?,?,?)";
              //  echo "$InsertInvoiceSQL";   
                $InsertInvoiceQry=$conn->prepare($InsertInvoiceSQL);
                $InsertInvoiceQry->bind_param("ssss",$date,$userid,$amountOwed,$carid);
                return($InsertInvoiceQry->execute());        
                }
            else return FALSE;        
    }
    
    function fetchPayment($conn,$date,$amountPaid,$paymentMethod,
            $confirmationNumber,$bank,$email)
    {
            $userId=userId($conn, $email);
            if(!repeatedPayment($conn,$confirmationNumber)) 
                {
                $InsertPaymentSQL="INSERT INTO `Payment`(`paymentDate`, "
                        . "`amountPaid`, `paymentMethod`, "
                    . "`confirmationNumber`, `bank`,`userId`)"
                ."VALUES(?,?,?,?,?,?)";
            //  echo "$InsertPaymentSQL";   
                $InsertPaymentQry=$conn->prepare($InsertPaymentSQL);
                $InsertPaymentQry->bind_param("ssssss",$date,$amountPaid,
                        $paymentMethod,$confirmationNumber,$bank,$userId);
                return($InsertPaymentQry->execute());        
                }
            else return FALSE;        
    }
    
    function fetchTrackerCommand($conn,$trackerId,$cmdId,$date,$time,$status)
    {
      
                $InsertTrackerCommandSQL="INSERT INTO `CommandHist`(`trackerId`, `cmdId`, "
                    . "`date`,`time`,`status`) "
                ."VALUES(?,?,?,?,?)";
              //  echo $InsertTrackerCommandSQL;
                $InsertTrackerCommandQry=$conn->prepare($InsertTrackerCommandSQL);
                $InsertTrackerCommandQry->bind_param("sssss",$trackerId,$cmdId,$date,$time,$status);
                return($InsertTrackerCommandQry->execute());        
    }

     function fetchCommand($conn,$cmdName)
    {
            if(!repeatedCommand($conn,$cmdName)) 
            {  
                $InsertCommandSQL="INSERT INTO `Commands`(`comName`) "
                ."VALUES(?)";
                //echo $InsertCommandSQL;
                $InsertCommandQry=$conn->prepare($InsertCommandSQL);
                $InsertCommandQry->bind_param("s",$cmdName);
                return($InsertCommandQry->execute());            
            } 
            else return FALSE;
    }
 
     function fetchUser($conn,$name,$lastname,$email,$birthday,$idcard,$phone,$password1)
    {
            if(!repeatedUser($conn,$email)) 
            {  
             $InsertUserSQL="INSERT INTO `User`(`name`, `lastName`, `email`, "
                     . "`birthday`, `IDcard`, `phone`, `password`)"
                     ." VALUES(?,?,?,?,?,?,?)";

                //echo $InsertUserSQL;
                $InsertUserQry=$conn->prepare($InsertUserSQL);
                $InsertUserQry->bind_param("sssssss",$name,$lastname,$email,$birthday,
                        $idcard,$phone,$password1);
                return($InsertUserQry->execute());            
            } 
            else return FALSE;
    }
    
         function fetchCar($conn,$carMfr,$carMdl,$carColor,$carPlate,$carType)
    {
            if(!repeatedCar($conn,$carMfr,$carMdl,$carColor,$carPlate,$carType)) 
            {  
             $InsertCarSql="INSERT INTO `Cars`(`carMfr`, `carMdl`, `carColor`, `carPlate`, `carType`)"
            ."VALUES(?,?,?,?,?)";
          //  echo $InsertCarSql;
            $InsertCarQry=$conn->prepare($InsertCarSql);
            $InsertCarQry->bind_param("sssss",$carMfr,$carMdl,$carColor,
                    $carPlate,$carType);
            return($InsertCarQry->execute());            
            } 
            else return FALSE;       
    }
        
    function fetchUserCar($conn,$carId,$userId,$date)
    {
            if(!repeatedUserCar($conn,$carId)) 
            {  
            $InsertUserCarSql="INSERT INTO `UserCars`(`carId`, `userId`,`date`)"
            ." VALUES(?,?,?)";
            //echo $InsertUserCarSql;
            $InsertUserCarQry=$conn->prepare($InsertUserCarSql);
            $InsertUserCarQry->bind_param("sss",$carId,$userId,$date);
            return($InsertUserCarQry->execute());            
            } 
            else return FALSE;
    }
    
     function fetchMfrMdl($conn,$trackerMfr,$trackerMdl)
    {
            if(!repeatedMfrMdl($conn,$trackerMfr,$trackerMdl)) 
            {  
            $InsertMfrMdlSQL="INSERT INTO `GpsMfr`(`mfr`,`mdl`)"
                ."VALUES(?,?)";

            //echo $InsertMfrMdlSQL;
            $InsertMfrMdlQry=$conn->prepare($InsertMfrMdlSQL);
            $InsertMfrMdlQry->bind_param("ss",$trackerMfr,$trackerMdl);
            return($InsertMfrMdlQry->execute());            
            } 
            else return FALSE;       
    }
    
    function fetchMfrMdlCmd($conn,$trackerMfrMdl,$commands,$desc)
    {
            if(!repeatedMfrMdlCmd($conn,$trackerMfrMdl,$commands)) 
            {  
            $InsertMfrMdlCmdSQL="INSERT INTO `GpsMfrCmd`(`cmdId`,`trackerCmdDesc`"
                        . ",`gpsMfrId`)"
                ."VALUES(?,?,?)";
            $InsertMfrMdlQry=$conn->prepare($InsertMfrMdlCmdSQL);
            $InsertMfrMdlQry->bind_param("sss",$commands,$desc,$trackerMfrMdl);
            return($InsertMfrMdlQry->execute());            
            } 
            else return FALSE;           
    }

    function fetchTrackerCar($conn,$carId,$trackerid)
    {
               if(!repeatedTrackerCar($conn,$carId,$trackerid)) 
                {
                $InsertTrackerCarSQL="INSERT INTO `GpsTrackerCar`(`carId`, `trackerId`)"
                ."VALUES(?,?)";
             //   echo $InsertTrackerCarSQL;
                $InsertTrackerCarQry=$conn->prepare($InsertTrackerCarSQL);
                $InsertTrackerCarQry->bind_param("ss",$carId,$trackerid);
                return($InsertTrackerCarQry->execute());            
                } 
                else return FALSE;
    }
    
            function updateTracker($conn,$phone,$mfrid,$pass)
    {
                $id=  trackerId($conn, $phone);       
                $updateTrackerSQL="UPDATE `GpsTracker`"
                        . "SET `phone`=?, `gpsMfrId`=?, "
                    . "`password`=? WHERE `trackerId`=?";

                //echo $updateTrackerSQL;
                $updateTrackerQry=$conn->prepare($updateTrackerSQL);
                $updateTrackerQry->bind_param("ssss",$phone,$mfrid,$pass,$id);
                return($updateTrackerQry->execute());            
    } 
    
    function updateUser($conn,$userId,$name,$lastname,$email,$birthday,$idcard,$phone,$password1)
    {
             $UpdateUserSQL="UPDATE `User`"
                     . " SET `name`=?, `lastName`=?, `email`=?,"
                     . " `birthday`=?, `IDcard`=?, "
                     . "`phone`=?, `password`=?"
                     . " WHERE `UserID`=?";

               // echo $UpdateUserSQL;
                $UpdateUserQry=$conn->prepare($UpdateUserSQL);
                $UpdateUserQry->bind_param("ssssssss",$name,$lastname,$email,
                        $birthday,$idcard,$phone,$password1,$userId);
                return($UpdateUserQry->execute());   
    }
    
    function updateUserCar($conn,$carId,$userId)
    {
                $id=userCarId($conn,$carId);
                //echo $id;
                $UpdateUserCarSql="UPDATE `UserCars` "
                     . "SET `carId`=?, `userId`=?"
                     . " WHERE `userCarId`=?";
                //echo $UpdateUserCarSql;
                $UpdateUserCarQry=$conn->prepare($UpdateUserCarSql);
                $UpdateUserCarQry->bind_param("sss",$carId,$userId,$id);
                return($UpdateUserCarQry->execute());   
    }       
    
    function updateCar($conn,$carId, $carMfr, $carMdl, $carColor, $carPlate, $carType)
    {
            $UpdateCarSql="UPDATE `Cars` "
                     . "SET `carMfr`=?, `carMdl`=?, "
                    . " `carColor`=?, `carPlate`=?, "
                    . "`carType`=?  "
                     . " WHERE `carId`=?";
               // echo $UpdateCarSql;
                $UpdateCarQry=$conn->prepare($UpdateCarSql);
                $UpdateCarQry->bind_param("ssssss",$carMfr, $carMdl, $carColor, 
                        $carPlate, $carType,$carId);
                return($UpdateCarQry->execute());
    }
    
        function UpdateComHist($conn,$id)
    {
                $UpdateCmdHistSQL="UPDATE `CommandHist` "
                        . "SET `status`=1 "
                        . "WHERE `cmdHistId`=?";
                //echo $UpdateCmdHistSQL;
                $UpdateCmdHistQry=$conn->prepare($UpdateCmdHistSQL);
                $UpdateCmdHistQry->bind_param("s",$id);
                return($UpdateCmdHistQry->execute());    
    }
    
    function UpdateTrackerCom($conn, $trackerMfrMdl,$commands,$desc)
    {
                $id=trackerCmdId($conn, $trackerMfrMdl,$commands);
                //echo $id;
                $UpdateTrackerCmdSQL="UPDATE `GpsMfrCmd`" 
                    ."SET `trackerCmdDesc`=?" 
                    ." WHERE `gpsMfrCmdId`=?";
              //  echo $UpdateTrackerCmdSQL;
                $UpdateTrackerCmdQry=$conn->prepare($UpdateTrackerCmdSQL);
                $UpdateTrackerCmdQry->bind_param("ss",$desc,$id);
                return($UpdateTrackerCmdQry->execute());    
    }
    
        function DeleteTrackerCom($conn, $trackerMfrMdl,$commands,$desc)
    {
                $id=trackerCmdId($conn, $trackerMfrMdl,$commands);
                //echo $id;
                $DeleteTrackerCmdSQL="DELETE FROM `GpsMfrCmd`" 
                    ." WHERE `gpsMfrCmdId`=?";

               // echo $DeleteTrackerCmdSQL;
                $DeleteTrackerCmdQry=$conn->prepare($DeleteTrackerCmdSQL);
                $DeleteTrackerCmdQry->bind_param("s",$id);
                return($DeleteTrackerCmdQry->execute());    
    }
    
        function DeleteCom($conn, $cmdName)
    {
                $id=CmdId($conn,$cmdName);
              //  echo $id;
                $DeleteCmdSQL="DELETE FROM `Commands`" 
                    ." WHERE `comId`=?";
                //echo $DeleteCmdSQL;
                $DeleteCmdQry=$conn->prepare($DeleteCmdSQL);
                $DeleteCmdQry->bind_param("s",$id);
                return($DeleteCmdQry->execute());            
    }
    
        function DeleteTrackerMfrMdl($conn,$trackerMfr,$trackerMdl)
    {
                $id=mfrId($conn, $trackerMfr, $trackerMdl);
              //  echo $id;
                $DeleteTrackerMfrMdlSQL="DELETE FROM `GpsMfr`" 
                    ." WHERE `gpsMfrId`=?";
               // echo $DeleteTrackerMfrMdlSQL;
                $DeleteTrackerMfrMdlQry=$conn->prepare($DeleteTrackerMfrMdlSQL);
                $DeleteTrackerMfrMdlQry->bind_param("s",$id);
                return($DeleteTrackerMfrMdlQry->execute());     
    }
    
