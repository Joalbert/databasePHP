<?php
    // Constantes globales
    require '../Utility/dbConnect.php';
    require '../Utility/validation.php';
    session_start();
    validateSession();
    date_default_timezone_set('UTC-4.5');
    
    $unsucessAuth="authError.php";
    $sucessAuth="Menu.php";
    $email=  filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
    $password=filter_input(INPUT_POST,'password');
    
    $conn=  dbOpen();
    
    //$result=userAuth($conn,$email,$password);
    //echo $result->num_rows;
    if(password_verify($password,userPass($conn, $email)))
    //if($result->num_rows>0) 
    {
    $_SESSION['Auth']=1;    
    $_SESSION['email']=$email;
    $_SESSION['AuthTime']=date('Y-m-d');
    $_SESSION['counterAccess']=0;
    $_SESSION['ip']=  getenv("REMOTE_ADDR");
    echo $_SESSION['Auth'];    
    echo $_SESSION['email'];
    echo $_SESSION['AuthTime'];
    echo $_SESSION['counterAccess'];
    echo $_SESSION['ip'];
    dbClose($conn);
    url_locator($sucessAuth);
    //header("Location:".$sucessAuth);
    }
    else 
    {
    $_SESSION['Auth']=0;    
    $_SESSION['counterAccess']=$_SESSION['counterAccess']+1;
    //echo $_SESSION['counterAccess'];
    dbClose($conn);
    url_locator($unsucessAuth); 
    //header("Location:".$unsucessAuth);
    }
    