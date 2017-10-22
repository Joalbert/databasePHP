<?php
function balance($conn,$email)
{
    $queryInvoice=InvoiceDB($conn,$email);
    $rTotal=0;
    while($values=$queryInvoice->fetch_assoc())
    {
        $rTotal=$rTotal+ floatval($values['amount']);
    }
    $queryPayment=PaymentDB($conn,$email);
    //echo $queryPayment->num_rows;
    
    while($val=$queryPayment->fetch_assoc())        
     {
        $rTotal=$rTotal-floatval($val['amount']);
     }
return $rTotal;    
}