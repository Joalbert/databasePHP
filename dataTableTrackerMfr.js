document.onreadystatechange=function(){
    if (document.readyState == "interactive") {
        init();
    }

    }
function init()
{
	tableClick("trackerMfrs","trackerMfr");
        tableClick("commandTable","command");
        
}


