// JavaScript Document



function trim(str, chars) {
return ltrim(rtrim(str, chars), chars);
}

function ltrim(str, chars) {
chars = chars || "\\s";
return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
chars = chars || "\\s";
return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function checkBlank(mes,ob)
{
	if(ob.value=="")
	{
		ob.focus();
		alert(mes);
		return false;
	}
}

function checkDate(msg,ob,required)
{	
	if(!required)
	{
		required=0;
	}
	
	var _date = document.getElementById(ob + "_date" ).value;
	var _month = document.getElementById(ob + "_month" ).value;
	var _year = document.getElementById(ob + "_year" ).value;

	if((_date=="" || _month=="" || _year=="") && required==1)
	{
		alert(msg);
		document.getElementById(ob + "_date" ).focus();
		return false;
	}
	
	if(_date!="" || _month!="" || _year!="")
	{
		if(_date=="" || _month=="" || _year=="")
		{
			alert(msg);
			document.getElementById(ob + "_date" ).focus();
			return false;			
		}
	}
	
	if ((_month==4 || _month==6 || _month==9 || _month==11  ) && _date==31) 
	{
		alert("Please enter the valid month.");
		document.getElementById(ob + "_month" ).focus();
		return false;
	}	
	
	if (_month == 02)
	{ // check for february 29th
		var isleap = (_year % 4 == 0 );
		if (_date>29 || (_date==29 && !isleap))
		{
			alert("February " + _year + " doesn't have " + _date + " days.");
			document.getElementById(ob + "_month" ).focus();			
			return false;
		}
	}	
}

function checkDateArray(msg,obdate,obmonth,obyear,required)
{
	if(!required)
	{
		required=0;
	}

	for(var i=0;i<obdate.length;i++)
	{
		var _date = obdate[i].value;
		var _month =obmonth[i].value;
		var _year = obyear[i].value;
		j=i+1;
		
		if((_date=="" || _month=="" || _year=="") && required==1)
		{
			alert(msg+""+j);
			obdate[i].focus();
			
			return false;
		}
		
		if(_date!="" || _month!="" || _year!="")
		{
			if(_date=="" || _month=="" || _year=="")
			{
				alert(msg+""+j);
				obdate[i].focus();
				
				return false;			
			}
		}
		
		if ((_month==4 || _month==6 || _month==9 || _month==11  ) && _date==31) 
		{
			alert("Please enter the valid month.");
			obmonth[i].focus();
			
			return false;
		}	
		
		if (_month == 02)
		{ // check for february 29th
			var isleap = (_year % 4 == 0 );
			if (_date>29 || (_date==29 && !isleap))
			{
				alert("February " + _year + " doesn't have " + _date + " days.");
				obmonth[i].focus();
				
				return false;
			}
		}	
	}
}

function compareDateArray(msg,obfromdate,obfrommonth,obfromyear, obtodate, obtomonth, obtoyear)
{
	for(var i=0;i<obfromdate.length;i++)
	{
		j=i+1;
		var _dateFrom = obfromdate[i].value;
		var _monthFrom =obfrommonth[i].value;
		var _yearFrom = obfromyear[i].value;
		var _fulldateFrom = new Date(_yearFrom,_monthFrom,_dateFrom);
		
	
		var _dateTo = obtodate[i].value;
		var _monthTo =obtomonth[i].value;
		var _yearTo = obtoyear[i].value;
		var _fulldateTo = new Date(_yearTo,_monthTo,_dateTo);
	
		if(_fulldateFrom >= _fulldateTo && _dateTo != "")
		{
			alert(msg+""+j);
			obfromdate[i].focus();
			return false;
		}
	}
}
function y2k(number) { return (number < 1000) ? number + 1900 : number; }
function isLessThanFrom(date1,date2)
{			
	
	str = date1.split("/");		
	a_day = parseInt(str[0]); 
	a_month = parseInt(str[1]); 
	a_year = parseInt(str[2]);		
	arrD = new Date(a_year,a_month - 1,a_day);
	var arrTime = new Date(arrD.getTime() + 24*60*60*1000)	
	var arrivalTime = Date.UTC(y2k(arrTime.getYear()),arrTime.getMonth(),arrTime.getDate(),0,0,0);
	
	str = date2.split("/");		
	d_day = parseInt(str[0]); 
	d_month = parseInt(str[1]); 
	d_year = parseInt(str[2]);	
	depD = new Date(d_year,d_month - 1,d_day);
	var depTime = new Date(depD.getTime() + 24*60*60*1000)	
	var departureTime = Date.UTC(y2k(depTime.getYear()),depTime.getMonth(),depTime.getDate(),0,0,0);
	
	//alert(arrivalTime + " | " + departureTime);	  
	if(arrivalTime > departureTime) return false;
	return true; 
	
}
function days_between(date1,date2) {
	//alert(date1 + " | " + date2);	  
	str = date1.split("/");		
	a_day = parseInt(str[0]); 
	a_month = parseInt(str[1]); 
	a_year = parseInt(str[2]);	
	arrD = new Date(a_year,a_month - 1,a_day);
	var arrTime = new Date(arrD.getTime() + 24*60*60*1000)	
	var a = Date.UTC(y2k(arrTime.getYear()),arrTime.getMonth(),arrTime.getDate(),0,0,0);

	str = date2.split("/");		
	d_day = parseInt(str[0]); 
	d_month = parseInt(str[1]); 
	d_year = parseInt(str[2]);	
	depD = new Date(d_year,d_month - 1,d_day);
	var depTime = new Date(depD.getTime() + 24*60*60*1000)	
	var b = Date.UTC(y2k(depTime.getYear()),depTime.getMonth(),depTime.getDate(),0,0,0);

    var difference = a - b;
   //alert(Math.abs(difference/1000/60/60/24) + 1)
	return Math.abs(difference/1000/60/60/24) + 1;
}
function DateExpiry(msg,obTo,edit)
{
	var _dateFrom = document.getElementById("adFrom_date").value;
	var _monthFrom = document.getElementById("adFrom_month").value;
	var _yearFrom = document.getElementById("adFrom_year").value;
	var myDate = new Date(_yearFrom,_monthFrom-1,_dateFrom);
	//myDate=new Date()
	var currentTime;
	if(edit=="add")
	{
		var currentTime = new Date(myDate.getTime() + 21*24*60*60*1000)
		var month = currentTime.getMonth()
		var day = currentTime.getDate()
		var year = currentTime.getFullYear()
		var _endDate = new Date(year,month,day);
	}
	else if(edit=="edit")
	{
		var postdate=document.getElementById("post_date").value.split("-");
		var nextDate=new Date(postdate[0],postdate[1]-1,postdate[2]);
		var _endDate=new Date(nextDate.getTime() + 21*24*60*60*1000);
	}
	//alert(myDate + "---"+_endDate+"---"+edit+"@@@");
	var _dateTo = document.getElementById(obTo + "_date").value;
	var _monthTo = document.getElementById(obTo + "_month").value;
	var _yearTo = document.getElementById(obTo + "_year").value;
	//alert(_yearFrom +"|"+ _yearTo)
	//alert(_monthFrom +"|"+ _monthTo)
	//alert(parseInt(_yearFrom) <= parseInt(_yearTo) && parseInt(_monthFrom) <= parseInt(_monthTo))	;
	//if(_monthTo == 13)
		//_monthTo = 1;
	if(parseInt(_yearFrom) <= parseInt(_yearTo) && parseInt(_monthFrom) <= parseInt(_monthTo)) {
		//alert("ho")
			if(_monthTo == 13)
				_monthTo = 1;
				
				if(parseInt(_yearFrom) < parseInt(_yearTo) && parseInt(_monthFrom) < parseInt(_monthTo)) {
					var _fulldateTo = new  Date(_yearTo-1,_monthTo-1,_dateTo);
				} else {
					var _fulldateTo = new  Date(_yearTo,_monthTo-1,_dateTo);
				}

	} else {
		var _fulldateTo = new  Date(_yearTo-1,_monthTo-1,_dateTo);
	}
	/////////////////
	var newfromday = myDate.getDate();
	var newfrommonth = myDate.getMonth()+1;
	var newfromyear = myDate.getFullYear();
	var newtoday = _fulldateTo.getDate();
	var newtomonth = _fulldateTo.getMonth()+1;
	var newtoyear = _fulldateTo.getFullYear();
	//////////////////
	var newfromDate = newfromday+"/"+newfrommonth +"/"+newfromyear;
	var newtoDate = newtoday+"/"+newtomonth +"/"+newtoyear;
	//alert(newfromDate+"---"+newtoDate+"----"+_fulldateTo)
	if(!isLessThanFrom(newfromDate,newtoDate)){
		alert("To date should be greater than From date in ad running time");
		document.getElementById(obTo + "_date").focus();
		return false;
	}
	if(_fulldateTo > _endDate && _dateTo != "")
	{
		alert(msg);
		document.getElementById(obTo + "_date").focus();
		return false;
	}
}
function compareDate(msg,obFrom,obTo)
{
	var _dateFrom = document.getElementById(obFrom + "_date").value;
	var _monthFrom = document.getElementById(obFrom + "_month").value;
	var _yearFrom = document.getElementById(obFrom + "_year").value;
	var obFromdate = _monthFrom+"/"+_dateFrom+"/"+_yearFrom;
	var _fulldateFrom = new Date(obFromdate);
	//alert(_dateFrom +"|"+ _monthFrom +"|"+ _yearFrom+"!"+_fulldateFrom)
	var _dateTo = document.getElementById(obTo + "_date").value;
	var _monthTo = document.getElementById(obTo + "_month").value;
	var _yearTo = document.getElementById(obTo + "_year").value;
	var obTodate = _monthTo+"/"+_dateTo+"/"+_yearTo;
	var _fulldateTo = new Date(obTodate);
	//alert(_dateTo +"|"+ _monthTo +"|"+ _yearTo +"!"+_fulldateTo)
	if(_fulldateTo < _fulldateFrom && _dateTo != "")
	{
		alert(msg);
		document.getElementById(obTo + "_date").focus();
		return false;
	}
	return true;
}

function compareDateWithCureentDate(msg,obDate)
{
	var _dateFrom = document.getElementById(obDate + "_date").value;
	var _monthFrom = document.getElementById(obDate + "_month").value;
	var _yearFrom = document.getElementById(obDate + "_year").value;
	var _fulldateFrom = new Date(_yearFrom,_monthFrom,_dateFrom);

	var cur_dat=new Date();
	var _Currentfulldate = new Date(cur_dat.getFullYear(),cur_dat.getMonth() + 1,cur_dat.getDate());

	if(_fulldateFrom < _Currentfulldate && _dateFrom != "")
	{
		alert(msg);
		document.getElementById(obDate + "_date").focus();
		return false;
	}
}


function checkChecked(mes,ob)
{
	if(ob.checked!=true)
	{
		ob.focus();
		alert(mes);
		return false;
	}
}

function checkEmail(mes,ob)
{
	if ((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ob.value)) == false)
	{
				ob.focus();
				alert(mes);
				return false;
	}
}

function checkUsername(msg,obj)
{
		var string1="qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBYHNUJMIKOLP" + "1234567890";
		var val=obj.value;
		var op=new String();

	    op.value=val;

	    for(var i=0;i<op.value.length;i++)
	    {
			 if(string1.indexOf(op.value.charAt(i))==-1)
			 {
			   			alert(msg);
						obj.focus();
						return false;
			 }
		}
}

function isAlpha(msg,obj)
{
	var string1="qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBYHNUJMIKOLP";
	var val=obj.value;
	var op=new String();

	op.value=val;

	 for(var i=0;i<op.value.length;i++)
	 {
		 if(string1.indexOf(op.value.charAt(i))==-1)
 		 {
				alert(msg);
				obj.focus();
				return false;
		 }
	 }
}

function checkNumber(mes,ob)
{
	if(isNaN(ob.value))
	{
		alert(mes);
		ob.focus();
		return false;
	}
}

function checkPassword(mes,ob1,ob2)
{
		if(ob1.value!=ob2.value)
		{
			ob2.focus();
			alert(mes);
			return false;
		}
}

function check_length(msg ,obj)
{
	var len;
	n=obj.value;
	len=n.length;
	if(!(len>=4&&len<=15))
		{
			obj.focus();
			alert(msg);
			return false;
		}
}

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

