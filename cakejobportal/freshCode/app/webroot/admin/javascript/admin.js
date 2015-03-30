function GetXmlHttpObject()	{

	var xmlHttp=null;
	try	  {
	  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	 }
	catch (e)  {
		// Internet Explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	 }
	return xmlHttp;
}

function setStatus(alertname,id_head,id,status_head,status,table){
	var params = "alertname=" + alertname + "&id_head=" + id_head + "&id=" + id + "&status_head=" + status_head + "&status=" + status + "&table=" + table;	
	var strStatus = '';
	if(status == 1)
		strStatus = 'activate';
	else if(status == 0)
		strStatus = 'disable';
		
 	if(!confirm("Are you sure to " + strStatus + " this " + alertname + "?"))
	{
		return false;
	}
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 


	xmlHttp.onreadystatechange=function fun() { 
		if (xmlHttp.readyState==4){ 
			document.getElementById('status_' + id).innerHTML=xmlHttp.responseText;
		}
	};
	
	url = "../change_status.php?alertname=" + alertname + "&id_head=" + id_head + "&id=" + id + "&status_head=" + status_head + "&status=" + status + "&table=" + table ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(params);
}

function validateLetter()
{	
	flag=checkBlank("Please enter the letter title.",document.form1.title);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the letter message.",document.form1.msg);
	if(flag==false) { return false; }	
	
	return true;
}