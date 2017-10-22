function printContent(divName)
{// 
     var printContents = document.getElementById("logo").innerHTML+"<br />"+document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
 }
 
 