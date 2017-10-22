function tableClick(tableName,formName){
var tr=[];
var inputs=[];
var tableSource;
var formTarget;
var tables=[];
var table=[];

formTarget=document.getElementsByName(formName);
tableSource=document.getElementsByName(tableName);
for(var j=0,final=tableSource.length;j<final;j++)
{
tr[0]=tableSource[j].getElementsByTagName("tr");
if(tr[0].length>2) j=final;
}

inputs=formTarget[0].getElementsByTagName("input");

for(var i=1,final=tr[0].length;i<final;i++)
{
tr[0][i].addEventListener('click',function(e)
{
	for(var j=0,fin=e.currentTarget.cells.length;j<fin;j++)
	{
        inputs[j].value=e.currentTarget.cells[j].textContent;
		
	}
},false);
	
	}
}