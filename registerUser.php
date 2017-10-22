    <?php
        require '../Utility/dbConnect.php';
        require '../Utility/validation.php';
        
        ob_start();
        session_start();
        
        $name=  validateName(filter_input(INPUT_POST,'RegName'));
        $lastname= validateName(filter_input(INPUT_POST,'RegLastName'));
        $email= filter_input(INPUT_POST,'RegEmail',FILTER_VALIDATE_EMAIL);
        $birthday= validateDate(filter_input(INPUT_POST,'RegBirthday'));
        $idcard= validateNumber(filter_input(INPUT_POST,'RegIdCard',FILTER_VALIDATE_INT));
        $phone= validateNumber(filter_input(INPUT_POST,'RegPhone'));
        
        $password1=filter_input(INPUT_POST,'RegUserpassword1');
        $password2=filter_input(INPUT_POST,'RegUserpassword2');
        $sucessReg="auth.php";
        $unsucessReg="regError.php";        
       
        echo $name;
        echo $lastname;
        echo $email;
        echo $birthday;
        echo $idcard;
        echo $phone;
        echo $password1;
        
        if($name!==FALSE && $lastname!==FALSE && $email!==FALSE && 
                $birthday!==FALSE && $idcard!==FALSE && $phone!==FALSE)
        {
            $conn=  dbOpen();
     
     
            if($password1 === $password2)
                {
                    $password1=  password_hash($password1, PASSWORD_DEFAULT);
                    if(fetchUser($conn,$name,$lastname,$email,$birthday,$idcard,$phone,$password1)) 
                    {
     //               echo "Insertion";
                    dbClose($conn);
                    $_SESSION['errorReg']=0;
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$password1;
                    header("Location:".$sucessReg);
                    } 
                    else 
                    {
                    echo "Error: " . $sql . "<br>" . $conn->error;   
                    dbClose($conn);
                    }
                }
            else
            {
            dbClose($conn);
            $_SESSION['errorReg']=1;
            header("Location:".$unsucessReg);   
            }
        }   
        
        else
            {
            $_SESSION['errorReg']=1;
           // header("Location:".$unsucessReg);   
            } 
         
            
        
