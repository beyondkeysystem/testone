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
function BalnkToDateLoop(val)
{
	
	for(i=0;i<=parseInt(val);i++)
	{
		BalnkToDate(i,document.getElementById("seeker_emp_leaving_"+i));
	}
}
function BalnkToDate(val,val1)
{
	if(val1.value=="Current employment")
	{
		document.form1.seeker_employer_to_month[val].selectedIndex=0;
		document.form1.seeker_employer_to_year[val].selectedIndex=0;
		//document.form1.seeker_employer_to_month[val].disabled=true;
		//document.form1.seeker_employer_to_year[val].disabled=true;
	}
	else
	{
		//document.form1.seeker_employer_to_month[val].disabled=false;
		//document.form1.seeker_employer_to_year[val].disabled=false;
	}
}


function checkBlankDate()
{
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}
}

function fillCell()
{
	document.getElementById("cell").innerHTML=document.form1.seeker_mobile.value;
}
function fillId()
{
	document.getElementById("identity").innerHTML=document.form1.seeker_indentity_no.value;
}



function vacancy_type(form) {
	if(form.value == "Bursary application Position") {
		window.location.href = "job_search_bursary.php?vacancy="+form.value ;	
	} else {
		window.location.href = "?vacancy="+form.value ;	
	}			
	return true ;
}


function leadershipOther()
{
	if(document.form1.seeker_secondaryleadership.value=="---- Other ----")
	{
		document.getElementById("leadership_other").style.display="";
		document.getElementById("seeker_leadership").value="";
	}
	else
	{
		document.getElementById("leadership_other").style.display="none";
	}
}
function cityOther()
{
	
	if(document.form1.postal_city.value=="--- Other ---")
	{
		document.getElementById("othercity_div").style.display="";
		document.getElementById("othercity").value="";
	}
	else
	{
		document.getElementById("othercity_div").style.display="none";
	}
}
function fieldOther()
{
	if(document.form1.seeker_bursary_study.value=="---- Other ----")
	{
		document.getElementById("seeker_bursary_study_other").style.display="";
		document.getElementById("seeker_bursary_study_othertext").value="";
	}
	else
	{
		document.getElementById("seeker_bursary_study_other").style.display="none";
		document.getElementById("seeker_bursary_study_othertext").value="";
	}
}
function fieldOtherAlertQual()
{
	if(document.form1.seeker_bursary_alert_qualification.value=="---- Other ----")
	{
		document.getElementById("seeker_bursary_alert_qualification_other").style.display="";
		document.getElementById("seeker_bursary_alert_qualification_othertext").value="";
	}
	else
	{
		document.getElementById("seeker_bursary_alert_qualification_other").style.display="none";
		document.getElementById("seeker_bursary_alert_qualification_othertext").value="";
	}
}
function fieldOtherForBoth()
{
	if(document.form1.seeker_bursary_study.value=="---- Other ----")
	{
		document.getElementById("seeker_bursary_study_other").style.display="";
		//document.getElementById("seeker_bursary_study_othertext").value="";
	}
	else
	{
		document.getElementById("seeker_bursary_study_other").style.display="none";
		document.getElementById("seeker_bursary_study_othertext").value="";
	}
	if(document.form1.seeker_bursary_alert_qualification.value=="---- Other ----")
	{
		document.getElementById("seeker_bursary_alert_qualification_other").style.display="";
		//document.getElementById("seeker_bursary_alert_qualification_othertext").value="";
	}
	else
	{
		document.getElementById("seeker_bursary_alert_qualification_other").style.display="none";
		//document.getElementById("seeker_bursary_alert_qualification_othertext").value="";
	}
}




function addCvOption()
{
	/*if(document.form1.seeker_addcv.checked)
	{
		document.form1.seeker_per_emp.checked=true;
		document.form1.seeker_temp_emp.checked=true;
	}
	else
	{
		document.form1.seeker_per_emp.checked=false;
		document.form1.seeker_temp_emp.checked=false;
	}*/
}
function hideSeekerEntityScholar()
{
	if(document.form1.seeker_entity.checked)
	{
		document.form1.seeker_email_alert.checked=false;
		document.form1.seeker_email_alert.disabled=true;
	}
	else
	{
		document.form1.seeker_email_alert.disabled=false;
	}
}
function hideSeekerEntity()
{
	if(document.form1.seeker_entity.checked)
	{
		document.form1.seeker_all_employer.checked=false;
		document.form1.seeker_head_hunter.checked=false;
		document.form1.seeker_recruitment.checked=false;
		
		document.form1.seeker_per_emp.checked=false;
		document.form1.seeker_temp_emp.checked=false;
		document.form1.seeker_addcv.checked=false;
		document.form1.seeker_email_alert.checked=false;
		//for disabled
		document.form1.seeker_all_employer.disabled=true;
		document.form1.seeker_head_hunter.disabled=true;
		document.form1.seeker_recruitment.disabled=true;
		
		document.form1.seeker_per_emp.disabled=true;
		document.form1.seeker_temp_emp.disabled=true;
		document.form1.seeker_addcv.disabled=true;
		document.form1.seeker_email_alert.disabled=true;
	}
	else
	{
		//for disabled
		document.form1.seeker_all_employer.disabled=false;
		document.form1.seeker_head_hunter.disabled=false;
		document.form1.seeker_recruitment.disabled=false;
		
		document.form1.seeker_per_emp.disabled=false;
		document.form1.seeker_temp_emp.disabled=false;
		document.form1.seeker_addcv.disabled=false;
		document.form1.seeker_email_alert.disabled=false;
	}
}

function neverYear()
{
	if(document.form1.seeker_license_year.value=="Never")
	{
		document.form1.seeker_license_month.style.display="none";
		document.form1.seeker_license_date.style.display="none";
	}
	else
	{
		document.form1.seeker_license_month.style.display="";
		document.form1.seeker_license_date.style.display="";
	}
}
function ImmediatelyYear()
{
	if(document.form1.seeker_parttime_available_year.value=="Immediately")
	{
		document.form1.seeker_parttime_available_month.style.display="none";
		document.form1.seeker_parttime_available_date.style.display="none";
	}
	else
	{
		document.form1.seeker_parttime_available_month.style.display="";
		document.form1.seeker_parttime_available_date.style.display="";
	}
}

function dateValue(mon,dd)
{
	
	if(mon.value!="")
	{
		dd.value=1;
	}
	else
	{
		dd.value="";
	}
}
function dateValueTo(mon,dd)
{
	
	if(mon.value!="" && mon.value!=2)
	{
		dd.value=30;
	}
	else if(mon.value!="" && mon.value==2)
	{
		dd.value=28;
	}
	else
	{
		dd.value="";
	}
}

function openPopup()
 {
 	aaa=window.open('cat_pop.php','cat','scrollbars=1,menubar=0,toolbar=0,location=0,status=0,width=670,height=420');	   
 }
 
function check_rpassward(msg,obj1,obj2)
{
    var len1,len2;
	var passward = new Array();
	var rpassward = new Array();
	
	n1=obj1.value;
	lenpass=n1.length;
	passward = n1;
	
	n2=obj2.value;
	lenrpass=n2.length;
	rpassward=n2;
	if(lenrpass != lenpass)
		{
		obj2.focus();
		alert(msg);
		return false;
		}
	var i=0;
	while(i<lenpass)
		{//myRange1.isEqual(myRange2
		if(passward[i]!=rpassward[i])
			{
			obj2.focus();
			alert(msg);
			return false;
			}
	   i=i+1;
	   }
}



function checkBlank(mes,ob)
{
	if(ob.value=="")
	{	
		alert(mes);
		ob.focus();
		return false ;
	}
	return true ;
}

function getAbsolutePosition(element){
	var ret = new Point();
    for(; 
        element && element != document.body;
        ret.translate(element.offsetLeft, element.offsetTop), element = element.offsetParent
        );
    return ret;
}

function Point(x,y){
        this.x = x || 0;
        this.y = y || 0;
        this.toString = function(){
            return '('+this.x+', '+this.y+')';
        };
        this.translate = function(dx, dy){
            this.x += dx || 0;
            this.y += dy || 0;
        };
        this.getX = function(){ return this.x; }
        this.getY = function(){ return this.y; }
        this.equals = function(anotherpoint){
            return anotherpoint.x == this.x && anotherpoint.y == this.y;
        };
}

function checkDate(msg,ob,required)
{
	//alert(ob);
	if(!required)
	{
		required=0;
	}
	var _year = document.getElementById(ob + "_year" ).value;
	
	if(_year!="Never")
	{
		var _date = document.getElementById(ob + "_date" ).value;
		var _month = document.getElementById(ob + "_month" ).value;
	

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
	return true;
}



function checkDateArray(msg,obdate,obmonth,obyear,required)
{
	
	if(!required)
	{
		required=0;
	}
	
	
	
	
	for(var i=0;i<obmonth.length;i++)
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
	return true;
}
function checkDateMonthYearArray(msg,obdate,obmonth,obyear,required)
{

	if(!required)
	{
		required=0;
	}
	
	for(var i=0;i<obmonth.length;i++)
	{
		//var _date = obdate[i].value;
		var _month =obmonth[i].value;
		var _year = obyear[i].value;
		j=i+1;
		
	if(( _month=="" || _year=="") && required==1)
	{
		
		alert(msg+""+j);
		obdate[i].focus();
		
		return false;
	}
	
	if( _month!="" || _year!="")
	{
		if( _month=="" || _year=="")
		{
			alert(msg+""+j);
			obdate[i].focus();
			
			return false;			
		}
	}
	
	/*if ((_month==4 || _month==6 || _month==9 || _month==11  ) && _date==31) 
	{
		alert("Please enter the valid month.");
		obmonth[i].focus();
		
		return false;
	}*/	
	
	/*if (_month == 02)
	{ // check for february 29th
		var isleap = (_year % 4 == 0 );
		if (_date>29 || (_date==29 && !isleap))
		{
			alert("February " + _year + " doesn't have " + _date + " days.");
			obmonth[i].focus();
			
			return false;
		}
	}*/	
	}
}






function compareDate(msg,obFrom, obTo)
{
	var _dateFrom = document.getElementById(obFrom + "_date").value;
	var _monthFrom = document.getElementById(obFrom + "_month").value;
	var _yearFrom = document.getElementById(obFrom + "_year").value;
	var _fulldateFrom = new Date(_yearFrom,_monthFrom,_dateFrom);
	
	var _dateTo = document.getElementById(obTo + "_date").value;
	var _monthTo = document.getElementById(obTo + "_month").value;
	var _yearTo = document.getElementById(obTo + "_year").value;
	var _fulldateTo = new Date(_yearTo,_monthTo,_dateTo);
	
	if(_fulldateFrom >= _fulldateTo && _dateTo != "")
	{
		alert(msg);
		document.getElementById(obFrom + "_date").focus();
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

function checkBlankacc(mes,ob)
{
	if(ob.value=="0")
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

function NewWindow(mypage,myname,w,h,scroll,pos)
{
	if(pos=="random")
	{
	LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;
	TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;
	}
	if(pos=="center")
	{
	LeftPosition=(screen.width)?(screen.width-w)/2:100;
	TopPosition=(screen.height)?(screen.height-h)/2:100;
	}
	else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
	settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable=no';
	win=window.open(mypage,myname,settings);
	
}


function NewWindow1()
{
	un=document.frm1.member_username.value;
	NewWindow('member_pop.php?un='+un,'mywin','300','100','yes','center');
}

function isAlpha(msg,obj)
{
	var string1="qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBYHNUJMIKOLP"+" ";
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
	return true;
}
function isnumber_dot(msg,obj)
{
	var string1="0123456789";
	var val=obj.value;
	var op=new String();

	op.value=val;
	
	 if(val!="")
	 {
		  if(val<=0)
		 {
			alert("Please enter a value greater than 0 in the 'number of job ads' field.");
			obj.focus();
			return false; 
		 }
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
}

function checkWave(mes,ob)
{
	var i=0;
	var n=ob.value;
	var len=n.length;
	
	var j;
	var flag;
	i=0;
	while(i<len)
	{
			flag=0;
			for(j=0;j<10;j++)
			{
				if(n.charAt(i)==j || n.charAt(i)=="-")
				{
					flag=1;
				}
			}
			if(flag==0)
			{
				ob.focus();
				alert(mes);
				return false;
			}
			i=i+1;
	}
}


function checkRange(mes,ob)
{
	var i=0;
	var n=ob.value;
	var len=n.length;
	
	var j;
	var flag;
	i=0;
	while(i<len)
	{
			flag=0;
			for(j=0;j<10;j++)
			{
				if(n.charAt(i)==j || n.charAt(i)=="-" || n.charAt(i)=="'")
				{
					flag=1;
				}
			}
			if(flag==0)
			{
				ob.focus();
				alert(mes);
				return false;
			}
			i=i+1;
	}
}

function checkPassword(mes,ob1,ob2)
{
		if(ob1.value!=ob2.value)
		{
			alert(mes);
			ob2.focus();
			return false;
		}
}
function ParseDate(S) { // Permit ISO DateSeps
return new Date( S.replace(/-/g, "/") ) 
}

function DiffDays(S1, S2) { // ISO date strings
var X = ReadISO8601date(S1) ; if (X<0) return 'Date 1 bad'
var Y = ReadISO8601date(S2) ; if (Y<0) return 'Date 2 bad'
var Dx = Date.UTC(X[0], X[1]-1, X[2])
var Dy = Date.UTC(Y[0], Y[1]-1, Y[2])
return (Dx-Dy)/864e5 
}


function DaysDiff(D1, D2) 
{ // Date Objects, with similar times
return Math.round((D1-D2)/864e5) 
}

function imgFilter(mes,ob)
{
	var file=ob.value;
	var mytool_array=file.split(".");	
	if(file!="")
	{
		if ((mytool_array[mytool_array.length-1].toLowerCase()!="jpg") && (mytool_array[mytool_array.length-1].toLowerCase()!="gif") && (mytool_array[mytool_array.length-1].toLowerCase()!="png"))
		{			
			alert(mes);
			ob.focus();
			return false;
		}
	}
}

	

function checkSize(mes,ob)
{
		if(ob.value.length<6)
		{
				ob.focus();
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


//ajax for mail

function checkMail(response_id){
	var params = "seeker_email=" + document.form1.seeker_email.value;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="ajax_check_mail.php";
	xmlHttp.onreadystatechange=function () { 
		if (xmlHttp.readyState==4){ 
			document.getElementById('email_exists').innerHTML=xmlHttp.responseText
		}
	};
	xmlHttp.open("POST",url,false);
	
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");	
	
	xmlHttp.send(params);
}

function checkPlan(response_id){
	var params = "plan_name=" + document.form1.plan_name.value;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="ajax_check_plan.php";
	xmlHttp.onreadystatechange=function () { 
		if (xmlHttp.readyState==4){ 
			document.getElementById(response_id).innerHTML=xmlHttp.responseText
		}
	};
	xmlHttp.open("POST",url,false);
	
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");	
	
	xmlHttp.send(params);
}



//ajax for states
function getStates(response_id){
	var params = "seeker_country=" + document.form1.seeker_country.value;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="ajax_getStates.php?sel_state=<?=$seeker_state?>";
	xmlHttp.onreadystatechange=function stateChanged_Country() { 
		if (xmlHttp.readyState==4){ 
			document.getElementById(response_id).innerHTML=xmlHttp.responseText
		}
	};
	xmlHttp.open("POST",url,true);
	
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");	
	
	xmlHttp.send(params);
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




function validateregistration()
{	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in the 'name' field.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in the 'surname' field.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	

	
	/*flag=checkBlank("Please enter the address.",document.form1.seeker_address);
	if(flag==false) { return false; }
	*/
	flag=checkBlank("Please enter your postal code.",document.form1.postal_post_code);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your city.",document.form1.seeker_city);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter letters only in the 'city' field.",document.form1.seeker_city);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please select a country for your postal address.",document.form1.postal_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your province.",document.form1.seeker_state);
	if(flag==false) { return false; }
	
	if(document.form1.seeker_phone.value==""  && document.form1.seeker_mobile.value=="")
	{
		alert("Please enter either your telephone or cell number.");
		document.form1.seeker_phone.focus();
		return false;
	}
	if(document.form1.seeker_phone.value!="" )
	{
		if(document.form1.seeker_phone_code.value=="" )
		{
			alert("Please enter your telephone area code.");
			document.form1.seeker_phone_code.focus();
		    return false;
		}
	}
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	
	
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please enter a password.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	
	/*flag=checkBlank("Please select the language",document.form1.seeker_language);
	if(flag==false) { return false; }*/
	
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter a number only in the 'experience' field.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please enter a valid 'from' date in the Highest Tertiary Qualification field.","seeker_highest_from");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please enter a valid 'to' date in the Highest Tertiary Qualification field.","seeker_highest_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Highest Tertiary Qualification field.","seeker_highest_from","seeker_highest_to");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please enter a valid 'from' date in the Second Highest Tertiary Qualification field.","seeker_second_from");
	if(flag==false) { return false; }	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Second Highest Tertiary Qualification field.","seeker_second_from","seeker_highest_to");
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please enter a valid 'to' date in the Second Highest Tertiary Qualification field.","seeker_second_to");
	if(flag==false) { return false; }	
	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Second Highest Tertiary Qualification field.","seeker_second_from","seeker_second_to");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please enter a valid 'from' date in the Third Highest Tertiary Qualification field.","seeker_third_from");
	if(flag==false) { return false; }	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Third Highest Tertiary Qualification field.","seeker_third_from","seeker_second_to");
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please enter a valid 'to' date in the Third Highest Tertiary Qualification field.","seeker_third_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Third Highest Tertiary Qualification field.","seeker_third_from","seeker_third_to");
	if(flag==false) { return false; }	
	
	
	
	flag=checkDate("Please enter a valid 'from' date in the Second Highest Tertiary Qualification field.","seeker_secondary_from");
	if(flag==false) { return false; }
	
	flag=compareDate("The 'to' date of the Third Highest Tertiary Qualification should be greater than the 'from' date of the Second Highest Tertiary Qualification.","seeker_secondary_from","seeker_third_to");
	if(flag==false) { return false; }
	
	flag=checkDate("Please enter a valid 'to' date in the Second Highest Tertiary Qualification field.","seeker_secondary_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("The 'to' date should be greater than the 'from' date in the Second Highest Tertiary Qualification fieled.","seeker_secondary_from","seeker_secondary_to");
	if(flag==false) { return false; }
	
	
	
	flag=checkDateArray("Please enter a valid 'from' date in the employment history field.",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please enter a valid 'to' date in the employment history field.",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	flag=compareDateArray("The 'to' date must always be greater than the 'from' date in the employment history field.",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please enter a valid 'from' date for the duration of 'no formal employment' field.",document.form1.seeker_period_from_date,document.form1.seeker_period_from_month,document.form1.seeker_period_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please enter a valid 'to' date for the duration of 'no formal employment' field.",document.form1.seeker_period_to_date,document.form1.seeker_period_to_month,document.form1.seeker_period_to_year);
	if(flag==false) { return false; }	
		
	flag=compareDateArray("The 'to' date must always be greater than the 'from' date in the duration of 'no formal employment' field.",document.form1.seeker_period_from_date,document.form1.seeker_period_from_month,document.form1.seeker_period_from_year,document.form1.seeker_period_to_date,document.form1.seeker_period_to_month,document.form1.seeker_period_to_year);
	if(flag==false) { return false; }	
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the Terms and Conditions."); return false; }

	return true;}

//for scholar register
function validatescholar()
{	
	//alert("hi");
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in the 'surname' field.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in the 'name' field.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid proper date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	flag=checkBlank("Please enter your Identity Number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	flag=checkDate("Please enter a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }	
	
	/* This is for tertiary highest degree */
	//if(document.form1.seeker_highestdegree.value !="") {
//	flag=checkDate("Please enter a valid 'from' date in the Highest Tertiary Qualification field.","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please enter a valid 'to' date in the Highest Tertiary Qualification field.","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("The 'to' date should be greater than the 'from' date in the Highest Tertiary Qualification field.","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	} // till here
//	
//	/* This is for secondary highest degree */
//	if(document.form1.seeker_secondarydegree.value !="") {
//	flag=checkDate("Please enter a valid 'from' date in the Second Highest Tertiary Qualification field.","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please enter a valid 'to' date in the Second Highest Tertiary Qualification field.","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("The 'to' date should be greater than the 'from' date in the Second Highest Tertiary Qualification field.","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} // till here 

	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter a number in the 'experience' field.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
    /*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
	if(flag==false) { return false; }*/
	
	/* This is for tertiary highest degree */
	//if(document.form1.seeker_highestdegree.value !="") {
//	
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	} // till here 
//	
//	/* This is for proper secondary degree */
//	if(document.form1.seeker_secondarydegree.value !="") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} // till here  
	
	/*flag_1=false;
	for(i=0;i<=3;i++)
	{
		if(document.form1.seeker_post_type[i].checked)
		{
			flag_1=true;
			break;
		}
	}
	if(flag_1==false)
	{
		alert("Please select the current status.");
	    document.form1.seeker_post_type[1].focus();
		return false;
	}*/
	
	//var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please select a position.");
		 return false;
	} */
	
	flag=checkBlank("Please select an industry.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter a password",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the terms and conditions."); return false; }

	return true;}
function validatescholaredit()
{
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	
	flag=checkBlank("Please enter your identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }

	
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
	if(flag==false) { return false; }*/
	
	/* This is for tertiary highest degree */
	//if(document.form1.seeker_highestdegree.value !="") {
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	} //till here 
//	
//	/* This is for secondary degree */
//	if(document.form1.seeker_secondarydegree.value !="") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} //till here 
	
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/*flag_1=false;
	for(i=0;i<=3;i++)
	{
		if(document.form1.seeker_post_type[i].checked)
		{
			flag_1=true;
			break;
		}
	}
	if(flag_1==false)
	{
		alert("Please select the current status.");
		document.form1.seeker_post_type[1].focus();
		return false;
	}*/
	
	//var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please enter a position you would like to find employment in.");
		 return false;
	}*/
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	
	if(document.form1.seeker_oldpassword.value!="")
	{
			flag = checkPassword("Please enter correct old password!",document.form1.seeker_oldpassword,document.form1.seeker_dbpass);
			if(flag==false) { return false; }
			
			flag=checkBlank("Please enter a password.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			
			flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
			
			flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
	}
	
	
	return true;
}

//end bursary

function validatebursary()
{	
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	flag=checkBlank("Please enter your identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	

	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/* This is the validation for tertiary highest degrees from date */	
	/*
	if(document.form1.seeker_highestdegree.value !="") {
		//alert(document.form1.seeker_highestdegree.value);
	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
	if(flag==false) { return false; }
	
	}
	/* till here */
	
	/* This is the validation for tertiary secondary degrees from date */
	/*if(document.form1.seeker_secondarydegree.value !="") {
	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
	if(flag==false) { return false; }
	
	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
	if(flag==false) { return false; }	
	/* till here */
	/*flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
	if(flag==false) { return false; }
	
	} // till here */
	
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter a password.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the terms and conditions."); return false; }
	
	flag = document.form1.terms_bursary.checked;
	if(flag == false) { alert("You must agree to the terms and conditions of bursary."); return false; }

	return true;}

function validatebursaryedit()
{	
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only character in name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	flag=checkBlank("Please enter your identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	

	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/* These validation are newly edited on date - 23 Feb 2010 */
	/* This is the validation for tertiary highest degrees from date */	
	 //if(document.form1.seeker_highestdegree.value !="") {
//		
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	} // till here 
	
	/* These validation are newly edited on date - 23 Feb 2010 */
	/* This is the validation for secondary degrees from date */	
	//if(document.form1.seeker_secondarydegree.value !="") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} // till here 
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	if(document.form1.seeker_oldpassword.value!="")
	{
			flag = checkPassword("Please enter correct old password!",document.form1.seeker_oldpassword,document.form1.seeker_dbpass);
			if(flag==false) { return false; }
			
			flag=checkBlank("Please enter a password.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			
			flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
			
			flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
	}
	
	return true;}


//end scholar

//unskilled
function validateunskilled()
{
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	
	flag=checkBlank("Please enter the identity number it is used as your password.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }

	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	if(document.form1.seeker_mobile.value=="")
	{
		alert("Please enter cell number");
		document.form1.seeker_mobile.focus();
		return false;
	}
	
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
	if(flag==false) { return false; }
	*/
	/* This is tertiary highest degree */
	//if(document.form1.seeker_highestdegree.value != "") {
//		
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	}
	/* till here */
	/* This is proper secondary degree's */
	//if(document.form1.seeker_seconddegree.value != "") {
//	//flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	//if(flag==false) { return false; }
//	
//	//flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	//if(flag==false) { return false; }	
//	
//	//flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	//if(flag==false) { return false; }
//	
//	
//	flag=checkDate("Please select the proper tertiary second degree's from date","seeker_second_from");
//	if(flag==false) { return false; }	
//	
//	/*flag=compareDate("To date of tertiary highest degree  should be greater than From date of  tertiary second degree's ","seeker_second_from","seeker_highest_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary second degree's to date","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	
//	flag=compareDate("To date should be greater than From date in tertiary second degree's ","seeker_second_from","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	} // till here 
//	
//	/* This is proper third degree's */
//	if(document.form1.seeker_thirddegree.value != "") {
//		
//	flag=checkDate("Please select the proper tertiary third degree's from date","seeker_third_from");
//	if(flag==false) { return false; }	
//	
//	/*flag=compareDate("Please check that your qualifications are listed from highest to lowest","seeker_third_from","seeker_second_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary third degree's to date","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary third degree's ","seeker_third_from","seeker_third_to");
//	if(flag==false) { return false; }	
//	} // till here 
//	
//	/* For secondary degree */
//	if(document.form1.seeker_secondarydegree.value != "") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=compareDate("To date of tertiary third degree  should be greater than From date of secondary degree's   ","seeker_secondary_from","seeker_third_to");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} // till here 
	
	flag=checkDateMonthYearArray("Please select proper from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateMonthYearArray("Please select proper to date for employer",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	/*flag=compareDateArray("To date is always greater than from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	*/
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	//var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please enter a position you would like to find employment in.");
		 return false;
	} */
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the terms and conditions."); return false; }

	return true;
}

function validateunskillededit()
{
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	
	flag=checkBlank("Please enter the identity number it is used as your password.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	

	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	if(document.form1.seeker_mobile.value=="")
	{
		alert("Please enter cell number");
		document.form1.seeker_mobile.focus();
		return false;
	}
	
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
	if(flag==false) { return false; }*/
	
	/* This is tertiary highest degree */
	//if(document.form1.seeker_highestdegree.value != "") {		
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	} // till here 
//	/* This is tertiary second degree */
//	if(document.form1.seeker_seconddegree.value != "") {
//	flag=checkDate("Please select the proper tertiary second degree's from date","seeker_second_from");
//	if(flag==false) { return false; }	
//	/*
//	flag=compareDate("To date of tertiary highest degree  should be greater than From date of  tertiary second degree's ","seeker_second_from","seeker_highest_to");
//	if(flag==false) { return false; }	*/
//	
//	flag=checkDate("Please select the proper tertiary second degree's to date","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary second degree's ","seeker_second_from","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	} // till here
//	
//	/* This is tertiary third degree */
//	if(document.form1.seeker_thirddegree.value != "") {
//	flag=checkDate("Please select the proper tertiary third degree's from date","seeker_third_from");
//	if(flag==false) { return false; }	
//	
//	/*flag=compareDate("Please check that your qualifications are listed from highest to lowest","seeker_third_from","seeker_second_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary third degree's to date","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary third degree's ","seeker_third_from","seeker_third_to");
//	if(flag==false) { return false; }	
//	} // till here 
//	
//	/* This is Secondary degree */
//	if(document.form1.seeker_secondarydegree.value != "") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=compareDate("To date of tertiary third degree  should be greater than From date of secondary degree's   ","seeker_secondary_from","seeker_third_to");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	} // till here 
	
	flag=checkDateMonthYearArray("Please select proper from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateMonthYearArray("Please select proper to date for employer",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	/*flag=compareDateArray("To date is always greater than from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	*/
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	//var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please enter a position you would like to find employment in.");
		 return false;
	}*/
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	

	return true;
}

function validateskilledstep1() {

	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }

	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}
	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}
	
	flag=checkBlank("Please enter your identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	//flag=checkDate("Please select a valid License expiry date.","seeker_license");
	//if(flag==false) { return false; }
	
	
	return true;
}


function validateskilledstep3() {
	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	return true;
}

function validateskilledstep6() {
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	return true;
}


function validateskilledstep7() { 
	flag=checkBlank("Please enter a password.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
	if(flag==false) { return false; }
	alert("hi");
	
	flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the terms and conditions."); return false; }
	
	return true;
}

//end unskilled
//skilled
function validateskilled()
{
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	flag=checkBlank("Please enter your identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }

	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
	if(flag==false) { return false; }
	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
	if(flag==false) { return false; }*/	
		
	/* This is tertiary highest degree's */
	//if(document.form1.seeker_highestdegree.value != "") {
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	} //till here 
//	
//	/* This is tertiary second degree's */
//	if(document.form1.seeker_seconddegree.value != "") {
//	
//	flag=checkDate("Please select the proper tertiary second degree's to date","seeker_second_to");
//	if(flag==false) { return false; }
//	
//	flag=compareDate("To date should be greater than From date in tertiary second degree's ","seeker_second_from","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	} // till here 
//	/* This is tertiary third degree's */
//	if(document.form1.seeker_thirddegree.value != "") {
//	flag=checkDate("Please select the proper tertiary third degree's from date","seeker_third_from");
//	if(flag==false) { return false; }	
//	
//	/*flag=compareDate("Please check that your qualifications are listed from highest to lowest","seeker_third_from","seeker_second_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary third degree's to date","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary third degree's ","seeker_third_from","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	} // till here 
//	
//	/* This is secondary highest degree's */
//	if(document.form1.seeker_secondarydegree.value != "") {
//		
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=compareDate("To date of tertiary third degree  should be greater than From date of secondary degree's   ","seeker_secondary_from","seeker_third_to");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	
//	} // till here
	
	flag=checkDateMonthYearArray("Please select proper from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateMonthYearArray("Please select proper to date for employer",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	/*flag=compareDateArray("To date is always greater than from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	*/
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	//var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please enter a position you would like to find employment in.");
		 return false;
	} */
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
		
	flag=checkBlank("Please enter a password.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
	if(flag==false) { return false; }
	
	flag = document.form1.terms.checked;
	if(flag == false) { alert("You must agree to the terms and conditions."); return false; }

	return true;
	
}
function validateskillededit()
{
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	
	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	
	
	flag=checkBlank("Please enter the identity number.",document.form1.seeker_indentity_no);
	if(flag==false) { return false; }
	
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select your country of current permanent residence.",document.form1.business_country);
	if(flag==false) { return false; }

	flag=checkBlank("Please select a city.",document.form1.postal_city);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	///*flag=checkBlank("Please enter the tertiary highest qualification",document.form1.seeker_highestdegree);
//	if(flag==false) { return false; }
//	flag=checkBlank("Please enter the tertiary field of study",document.form1.seeker_higheststudy);
//	if(flag==false) { return false; }
//	
//	flag=checkBlank("Please enter the tertiary  institution",document.form1.seeker_highestinstitution);
//	if(flag==false) { return false; }*/
//	
//	/* This is for Tertiary highest degrees */
//	if ( document.form1.seeker_highestdegree.value != "") {
//	//	alert(document.form1.seeker_highestdegree.value);
//	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
//	if(flag==false) { return false; }	
//	
//	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
//	if(flag==false) { return false; }	
//	
//	}
//	/* Till here */
//	
//	/* This is for Tertiary second degrees */
//	if ( document.form1.seeker_seconddegree.value != "") {
//		
//	flag=checkDate("Please select the proper tertiary second degree's from date","seeker_second_from");
//	if(flag==false) { return false; }	
//	
///*	flag=compareDate("To date of tertiary highest degree  should be greater than From date of  tertiary second degree's ","seeker_second_from","seeker_highest_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary second degree's to date","seeker_second_to");
//	if(flag==false) { return false; }	
//	
//	
//	flag=compareDate("To date should be greater than From date in tertiary second degree's ","seeker_second_from","seeker_second_to");
//	if(flag==false) { return false; }	
//	}
//	/* Till here */
//
//	/* This is for Tertiary second degrees */
//	if ( document.form1.seeker_thirddegree.value != "") {
//		
//	flag=checkDate("Please select the proper tertiary third degree's from date","seeker_third_from");
//	if(flag==false) { return false; }	
//	
//	/*flag=compareDate("Please check that your qualifications are listed from highest to lowest","seeker_third_from","seeker_second_to");
//	if(flag==false) { return false; }*/
//	
//	
//	flag=checkDate("Please select the proper tertiary third degree's to date","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in tertiary third degree's ","seeker_third_from","seeker_third_to");
//	if(flag==false) { return false; }	
//	
//	} // till here 
//	
//	// This is for secondary degree's
//	if ( document.form1.seeker_thirddegree.value != "") {
//	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
//	if(flag==false) { return false; }
//	
//	flag=compareDate("To date of tertiary third degree  should be greater than From date of secondary degree's   ","seeker_secondary_from","seeker_third_to");
//	if(flag==false) { return false; }
//	
//	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
//	if(flag==false) { return false; }	
//	
//	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
//	if(flag==false) { return false; }
//	
//	}
//	/* Till here */	
	
	flag=checkDateMonthYearArray("Please select proper from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateMonthYearArray("Please select proper to date for employer",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	/*flag=compareDateArray("To date is always greater than from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	*/
	flag=checkBlank("Please create a name for your CV in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }
	
	
	flag=checkBlank("Please select a category for your CV.",document.form1.seeker_category);
	if(flag==false) { return false; }
	//alert(trim(document.form1.seeker_skills.value," "));
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		//alert("HI");
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	// var mutli_education = document.form1.elements["seeker_work_cat[]"];
	
	/*if(mutli_education.selectedIndex=="-1" )
	{
		alert("Please enter a position you would like to find employment in.");
		 return false;
	} */
	/*alert(mutli_education.selectedIndex);
	for(i=0;i<mutli_education.length;i++)
	{
	 alert(mutli_education[i].value);
	}
	//alert(document.form1.seeker_work_cat[1].value);
	/*flag=checkBlank("Please enter a position you would like to find employment in..",document.form1.seeker_work_cat);
	if(flag==false) { return false; }*/
	
	flag=checkBlank("Please select the industry you would like to work in.",document.form1.seeker_work_subcat);
	if(flag==false) { return false; }
	
	if(document.form1.seeker_oldpassword.value!="")
	{
			flag = checkPassword("Please enter correct old password!",document.form1.seeker_oldpassword,document.form1.seeker_dbpass);
			if(flag==false) { return false; }
			
			flag=checkBlank("Please enter a password.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			
			flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
			
			flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
	}
	
	return true;
	
}

//end unskilled



function validateedit()
{	
	flag=checkBlank("Please enter your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your surname.",document.form1.seeker_surname);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter only letters in your name.",document.form1.seeker_name);
	if(flag==false) { return false; }
	
	var month=document.form1.seeker_month.value;
	var year=document.form1.seeker_year.value;
	var day=document.form1.seeker_date.value;
	
	if((year==0)||(month== 0)||(day==0))
	{
		alert("Please select your date of birth.");
		return false;
	}

	if ((month==4 || month==6 || month==9 || month==11) && day==31) 
	{
		alert("Please enter a valid date.");
		return false;
	}	
	if (month == 2)
	{ // check for february 29th
		var isleap = (year % 4 == 0 );
		if (day>29 || (day==29 && !isleap))
		{
			alert("February " + year + " doesn't have " + day + " days!");
			return false;
		}
	}	

	
	/*flag=checkBlank("Please enter the address.",document.form1.seeker_address);
	if(flag==false) { return false; }
	*/
	flag=checkBlank("Please enter the postal code",document.form1.seeker_postalcode);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the city",document.form1.seeker_city);
	if(flag==false) { return false; }
	
	flag=isAlpha("Please enter the alphabets only in city",document.form1.seeker_city);
	if(flag==false) { return false; }	
	
	
	flag=checkBlank("Please select the postal country",document.form1.postal_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the region.",document.form1.seeker_state);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the phone",document.form1.seeker_phone);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.seeker_email);
	if(flag==false) { return false; }
	
	
	if(document.form1.seeker_oldpassword.value!="")
	{
			flag = checkPassword("Please enter correct old password!",document.form1.seeker_oldpassword,document.form1.seeker_dbpass);
			if(flag==false) { return false; }
			
			flag=checkBlank("Please enter a password.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			flag = check_length("Your password should be between 4 and 15 characters long and must consist of letters and/or numbers.",document.form1.seeker_password);
			if(flag==false) { return false; }
			
			
			flag=checkBlank("Please confirm the password you entered.",document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
			
			flag = checkPassword("Please enter the correct password.",document.form1.seeker_password,document.form1.seeker_confirmpassword);
			if(flag==false) { return false; }
	}
		
	/*flag=checkBlank("Please select the language",document.form1.seeker_language);
	if(flag==false) { return false; }*/
	
	flag=checkBlank("Please create a name for your cv in the 'Summary' field.",document.form1.seeker_summary);
	if(flag==false) { return false; }	
	
	if(trim(document.form1.seeker_skills.value," ") == "")
	{
		alert("Please enter your skills.");
		document.form1.seeker_skills.focus();
		return false;
	}
	
	
	flag=checkNumber("Please enter experience in number only.",document.form1.seeker_experience);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select a valid License expiry date.","seeker_license");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper tertiary highest degree's from date","seeker_highest_from");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper tertiary highest degree's to date","seeker_highest_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("To date should be greater than From date in tertiary highest degree's ","seeker_highest_from","seeker_highest_to");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper tertiary second degree's from date","seeker_second_from");
	if(flag==false) { return false; }	
	
/*	flag=compareDate("To date of tertiary highest degree  should be greater than From date of  tertiary second degree's ","seeker_second_from","seeker_highest_to");
	if(flag==false) { return false; }
	*/
	
	flag=checkDate("Please select the proper tertiary second degree's to date","seeker_second_to");
	if(flag==false) { return false; }	
	
	
	flag=compareDate("To date should be greater than From date in tertiary second degree's ","seeker_second_from","seeker_second_to");
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper tertiary third degree's from date","seeker_third_from");
	if(flag==false) { return false; }	
	
	/*flag=compareDate("Please check that your qualifications are listed from highest to lowest","seeker_third_from","seeker_second_to");
	if(flag==false) { return false; }*/
	
	
	flag=checkDate("Please select the proper tertiary third degree's to date","seeker_third_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("To date should be greater than From date in tertiary third degree's ","seeker_third_from","seeker_third_to");
	if(flag==false) { return false; }	
	
	
	
	flag=checkDate("Please select the proper secondary degree's from date","seeker_secondary_from");
	if(flag==false) { return false; }
	
	/*flag=compareDate("To date of tertiary third degree  should be greater than From date of secondary degree's   ","seeker_secondary_from","seeker_third_to");
	if(flag==false) { return false; }*/
	
	flag=checkDate("Please select the proper secondary degree's to date","seeker_secondary_to");
	if(flag==false) { return false; }	
	
	flag=compareDate("To date should be greater than From date in  secondary degree's ","seeker_secondary_from","seeker_secondary_to");
	if(flag==false) { return false; }
	
	
	
	flag=checkDateArray("Please select proper from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please select proper to date for employer",document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
		
	flag=compareDateArray("To  date is always greater than from date for employer",document.form1.seeker_employer_from_date,document.form1.seeker_employer_from_month,document.form1.seeker_employer_from_year,document.form1.seeker_employer_to_date,document.form1.seeker_employer_to_month,document.form1.seeker_employer_to_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please select proper from date for period",document.form1.seeker_period_from_date,document.form1.seeker_period_from_month,document.form1.seeker_period_from_year);
	if(flag==false) { return false; }	
	
	flag=checkDateArray("Please select proper to date for period",document.form1.seeker_period_to_date,document.form1.seeker_period_to_month,document.form1.seeker_period_to_year);
	if(flag==false) { return false; }	
		
	flag=compareDateArray("To  date is always greater than from date for period",document.form1.seeker_period_from_date,document.form1.seeker_period_from_month,document.form1.seeker_period_from_year,document.form1.seeker_period_to_date,document.form1.seeker_period_to_month,document.form1.seeker_period_to_year);
	if(flag==false) { return false; }	
		

	return true;
}

function validatejobdetails()
{
	//alert(document.form1.send_mail_another.value)
	/*
	if(document.form1.flagvalue.value==1)
	{
		alert("Sorry you are not fullfilling all the criteria for applying this job.");
	 	return false;
	}
	*/
	/*if(document.form1.flagvalue.value==2)
	{
		return("login");
	}*/
	var len=0;
	var len = document.form1.elements.length;	
	var total=0;
	
	for(var j = 0; j <=len-1; j++) 
	{
		
		if(document.form1.elements[j].type == "textarea")
		{		
			if(document.form1.elements[j].value =="" &&  document.form1.elements[j].name !="cover_letter")
			{
				
				alert("Please enter answer of Question");
				document.form1.elements[j].focus();
				return false;
			}
		}
	}
	return true;
}
function DisplayWorktype()
{
	if( document.form1.seeker_work_type[0].checked==true)
	{
	 	document.getElementById("vacation").style.display="";
		document.getElementById("available_label").style.display="";
		document.getElementById("available_date").style.display="";
		document.getElementById("attach").style.display="none";
		document.getElementById("parttime").style.display="none";
		for(i=1;i<=8;i++)
		{
			var id1="available_follow"+i;
			document.getElementById(id1).style.display="none";
		}
	}
	else if(document.form1.seeker_work_type[1].checked==true)
	{
		document.getElementById("attach").style.display="";
		document.getElementById("available_label").style.display="";
		document.getElementById("available_date").style.display="";
		document.getElementById("vacation").style.display="none";
		document.getElementById("parttime").style.display="none";
		
		for(i=1;i<=8;i++)
		{
			var id1="available_follow"+i;
			document.getElementById(id1).style.display="none";
		}
	}
	else if(document.form1.seeker_work_type[2].checked==true)
	{
		document.getElementById("parttime").style.display="";
		document.getElementById("attach").style.display="none";
		document.getElementById("vacation").style.display="none";
		document.getElementById("available_label").style.display="none";
		document.getElementById("available_date").style.display="none";
		
		for(i=1;i<=8;i++)
		{
			var id1="available_follow"+i;
			document.getElementById(id1).style.display="";
		}
	}
}


function DisplayCheck(val)
 {
 	
	//alert("hi");
	if(val=="scholar" && document.form1.seeker_post_type[0].checked==true)
	{
	 	//alert("hi");
		//alert("ll"+document.form1.seeker_alert_from_school_date.value);
		document.getElementById("scholar").style.display="";
		document.getElementById("school").style.display="none";
		document.getElementById("full").style.display="none";
		document.getElementById("graduate").style.display="none";
		document.getElementById("currently").style.display="none";
		//for check
		document.getElementById("seeker_first_time_school").checked=false;
		document.getElementById("seeker_bursary_work_school").checked=false;
		document.getElementById("seeker_vacation_work_full").checked=false;
		document.getElementById("seeker_parttime_work_full").checked=false;
		document.getElementById("seeker_practical").checked=false;
		document.getElementById("seeker_bursary_work_full").checked=false;
		document.getElementById("seeker_first_time_graduate").checked=false;
		document.getElementById("seeker_bursary_work_graduate").checked=false;
		document.getElementById("seeker_parttime_work_currently").checked=false;
		document.getElementById("seeker_practical_currently").checked=false;
		document.getElementById("seeker_practical_full").checked=false;
		document.getElementById("seeker_practical_graduate").checked=false;
		/*document.form1.seeker_alert_from_school_date.value="";
		document.getElementById("seeker_alert_from_school_month").value="";
		document.getElementById("seeker_alert_from_school_year").value="";
		document.getElementById("seeker_alert_to_school_date").value="";
		document.getElementById("seeker_alert_to_school_month").value="";
		document.getElementById("seeker_alert_to_school_year").value="";
		document.getElementById("seeker_alert_date1_school_date").value="";
		document.getElementById("seeker_alert_date1_school_month").value="";
		document.getElementById("seeker_alert_date1_school_year").value="";
		document.getElementById("seeker_alert_date2_school_date").value="";
		document.getElementById("seeker_alert_date2_school_month").value="";
		document.getElementById("seeker_alert_date2_school_year").value="";
		*/
		
	}
	else if(val=="school" && document.form1.seeker_post_type[1].checked==true )
	{
	 	document.getElementById("scholar").style.display="none";
		document.getElementById("school").style.display="";
		document.getElementById("full").style.display="none";
		document.getElementById("graduate").style.display="none";
		document.getElementById("currently").style.display="none";
		
		//for check
		document.getElementById("seeker_vacation_work_scholar").checked=false;
		document.getElementById("seeker_parttime_work_scholar").checked=false;
		document.getElementById("seeker_bursary_work_scholar").checked=false;
		document.getElementById("seeker_vacation_work_full").checked=false;
		document.getElementById("seeker_parttime_work_full").checked=false;
		document.getElementById("seeker_practical").checked=false;
		document.getElementById("seeker_bursary_work_full").checked=false;
		document.getElementById("seeker_first_time_graduate").checked=false;
		document.getElementById("seeker_bursary_work_graduate").checked=false;
		document.getElementById("seeker_parttime_work_currently").checked=false;
		document.getElementById("seeker_practical_currently").checked=false;
		document.getElementById("seeker_practical_full").checked=false;
		document.getElementById("seeker_practical_graduate").checked=false;

	}
	else if(val=="full" && document.form1.seeker_post_type[2].checked==true )
	{
	 	
		document.getElementById("scholar").style.display="none";
		document.getElementById("school").style.display="none";
		document.getElementById("full").style.display="";
		document.getElementById("graduate").style.display="none";
		document.getElementById("currently").style.display="none";
		
		//for check
		document.getElementById("seeker_vacation_work_scholar").checked=false;
		document.getElementById("seeker_parttime_work_scholar").checked=false;
		document.getElementById("seeker_bursary_work_scholar").checked=false;
		document.getElementById("seeker_first_time_school").checked=false;
		document.getElementById("seeker_bursary_work_school").checked=false;
		document.getElementById("seeker_practical").checked=false;
	    document.getElementById("seeker_first_time_graduate").checked=false;
		document.getElementById("seeker_bursary_work_graduate").checked=false;
		document.getElementById("seeker_parttime_work_currently").checked=false;
		document.getElementById("seeker_practical_currently").checked=false;
		document.getElementById("seeker_practical_graduate").checked=false;
	}
	else if(val=="graduate" && document.form1.seeker_post_type[3].checked==true )
	{
	 	document.getElementById("scholar").style.display="none";
		document.getElementById("school").style.display="none";
		document.getElementById("full").style.display="none";
		document.getElementById("graduate").style.display="";
		document.getElementById("currently").style.display="none";
		
		//for check
		document.getElementById("seeker_vacation_work_scholar").checked=false;
		document.getElementById("seeker_parttime_work_scholar").checked=false;
		document.getElementById("seeker_bursary_work_scholar").checked=false;
		document.getElementById("seeker_first_time_school").checked=false;
		document.getElementById("seeker_bursary_work_school").checked=false;
		document.getElementById("seeker_vacation_work_full").checked=false;
		document.getElementById("seeker_parttime_work_full").checked=false;
		document.getElementById("seeker_practical").checked=false;
		document.getElementById("seeker_bursary_work_full").checked=false;
		document.getElementById("seeker_parttime_work_currently").checked=false;
		document.getElementById("seeker_practical_currently").checked=false;
		document.getElementById("seeker_practical_full").checked=false;
		
	}
	
	else if(val=="currently" && document.form1.seeker_post_type[4].checked==true )
	{
	 	document.getElementById("scholar").style.display="none";
		document.getElementById("school").style.display="none";
		document.getElementById("full").style.display="none";
		document.getElementById("graduate").style.display="none";
		document.getElementById("currently").style.display="";
		
		//for check
		document.getElementById("seeker_vacation_work_scholar").checked=false;
		document.getElementById("seeker_parttime_work_scholar").checked=false;
		document.getElementById("seeker_bursary_work_scholar").checked=false;
		document.getElementById("seeker_first_time_school").checked=false;
		document.getElementById("seeker_bursary_work_school").checked=false;
		document.getElementById("seeker_vacation_work_full").checked=false;
		document.getElementById("seeker_parttime_work_full").checked=false;
		document.getElementById("seeker_practical").checked=false;
		document.getElementById("seeker_bursary_work_full").checked=false;
		document.getElementById("seeker_practical_full").checked=false;
		document.getElementById("seeker_practical_graduate").checked=false;
		
	}
	
 }
  function DisplayPart(val)
 {
 	if(val=="scholar" && document.form1.seeker_parttime_work_scholar.checked==true)
	{
	 	document.getElementById("scholar_part").style.display="";
		document.getElementById("school_part").style.display="none";
		document.getElementById("full_part").style.display="none";
		document.getElementById("graduate_part").style.display="none";
		document.getElementById("currently_part").style.display="none";
		
	}else if(val=="school" && document.form1.seeker_bursary_work_school.checked==true)
	{
		document.getElementById("school_part").style.display="";
		document.getElementById("scholar_part").style.display="none";
		document.getElementById("full_part").style.display="none";
		document.getElementById("graduate_part").style.display="none";
		document.getElementById("currently_part").style.display="none";
	}
	else if(val=="full" && document.form1.seeker_parttime_work_full.checked==true)
	{
		document.getElementById("full_part").style.display="";
		document.getElementById("school_part").style.display="none";
		document.getElementById("scholar_part").style.display="none";
		document.getElementById("graduate_part").style.display="none";
		document.getElementById("currently_part").style.display="none";
	}
	else if(val=="graduate" && document.form1.seeker_bursary_work_graduate.checked==true)
	{
		document.getElementById("full_part").style.display="none";
		document.getElementById("school_part").style.display="none";
		document.getElementById("scholar_part").style.display="none";
		document.getElementById("graduate_part").style.display="";
		document.getElementById("currently_part").style.display="none";
	}
	else if(val=="currently" && document.form1.seeker_parttime_work_currently.checked==true)
	{
		document.getElementById("full_part").style.display="none";
		document.getElementById("school_part").style.display="none";
		document.getElementById("scholar_part").style.display="none";
		document.getElementById("graduate_part").style.display="none";
		document.getElementById("currently_part").style.display="";
	}
	else
	{
		document.getElementById("school_part").style.display="none";
		document.getElementById("scholar_part").style.display="none";
		document.getElementById("full_part").style.display="none";
		document.getElementById("graduate_part").style.display="none";
		document.getElementById("currently_part").style.display="none";
	}
 }
 
 function DisplayPractical(val)
 {
 	//alert(val);
	if(val=="full" && document.form1.seeker_practical_full.checked==true)
	{
		document.getElementById("full_practical").style.display="";
		document.getElementById("graduate_practical").style.display="none";
	}
	else if(val=="graduate" && document.form1.seeker_practical_graduate.checked==true)
	{
		document.getElementById("graduate_practical").style.display="";
		document.getElementById("full_practical").style.display="none";
	}
	else
	{
		document.getElementById("full_practical").style.display="none";
		document.getElementById("graduate_practical").style.display="none";
	}
}
 
 
 function DisplayVacation(val)
 {
 	if(val=="scholar" && document.form1.seeker_vacation_work_scholar.checked==true)
	{
	 	document.getElementById("scholar_vacation").style.display="";
		document.getElementById("school_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="none";
		document.getElementById("graduate_vacation").style.display="none";
		document.getElementById("currently_practical").style.display="none";
	}else if(val=="school" && document.form1.seeker_first_time_school.checked==true)
	{
		document.getElementById("school_vacation").style.display="";
		document.getElementById("scholar_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="none";
		document.getElementById("graduate_vacation").style.display="none";
		document.getElementById("currently_practical").style.display="none";
	}
	else if(val=="full" && document.form1.seeker_vacation_work_full.checked==true)
	{
		document.getElementById("school_vacation").style.display="none";
		document.getElementById("scholar_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="";
		document.getElementById("graduate_vacation").style.display="none";
		document.getElementById("currently_practical").style.display="none";
	} 
	else if(val=="graduate" && document.form1.seeker_first_time_graduate.checked==true)
	{
		document.getElementById("school_vacation").style.display="none";
		document.getElementById("scholar_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="none";
		document.getElementById("graduate_vacation").style.display="";
		document.getElementById("currently_practical").style.display="none";
	} 
	else if(val=="currently" && document.form1.seeker_practical_currently.checked==true)
	{
		document.getElementById("school_vacation").style.display="none";
		document.getElementById("scholar_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="none";
		document.getElementById("graduate_vacation").style.display="none";
		document.getElementById("currently_practical").style.display="";
	} 
	else {
		document.getElementById("school_vacation").style.display="none";
		document.getElementById("scholar_vacation").style.display="none";
		document.getElementById("full_vacation").style.display="none";
		document.getElementById("graduate_vacation").style.display="none";
		document.getElementById("currently_practical").style.display="none";
	}
	
	
 }
 
 

function showBursaryType(val)
 {
 	if(val=="leaver" && document.form1.seeker_bursary_type[0].checked==true )
	{
	 	document.getElementById("leaver").style.display="";
		document.getElementById("full_time_student").style.display="none";
		//document.getElementById("leaver_seeker_addsubject").style.display="none";
		//document.getElementById("leaver_seeker_addsubject1").style.display="none";
	}
	else if(val=="full_time_student" && document.form1.seeker_bursary_type[1].checked==true )
	{
		document.getElementById("leaver").style.display="none";
		document.getElementById("full_time_student").style.display="";
		//document.getElementById("full_seeker_addsubject").style.display="none";
		//document.getElementById("full_seeker_addsubject1").style.display="none";
	}
 }
 


//*******************************for admin side*******************************

//for add job options

function validateOption()
{	
	flag=checkBlank("Please select a category.",document.form1.category_id);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the option name.",document.form1.option_name);
	if(flag==false) { return false; }
	 
	return true;
}


function validatePlan()
{	
	
	flag=checkBlank("Please enter the plan name.",document.form1.plan_name);
	if(flag==false) { return false; }
	
	flag=isnumber_dot("Insert Number of job ads accepts number only.",document.form1.number_job);
	if(flag==false) { return false; }
	
	if(document.form1.number_job.value=="" &&  document.form1.unlimited_job_ads.checked==false)
	{
		alert("Please select either 'Post unlimited number of job ads' or insert number of job ads.");	
		document.form1.unlimited_job_ads.focus();
		return false;
	}
	
	for (i = 0; i <2; i++) 
	{
		if (document.form1.subscription[i].checked) 
		{
			if(document.form1.subscription[i].value=="paid")
			{
				flag=checkBlank("Please enter the cost of the subscription.",document.form1.rate);
				if(flag==false) { return false; }
				
				if(document.form1.rate.value==0)
				{
					alert("Please enter a value greater than zero for the cost of the subscription.");
					document.form1.rate.focus();
					return false;
				}
				
				flag=checkNumber("Please enter a number only for the cost of the subscription.",document.form1.rate);
				if(flag==false) { return false; }
				
				/*flag=checkBlank("Please enter the positions of subscription.",document.form1.positions);
				if(flag==false) { return false; }
				
				if(document.form1.positions.value==0)
				{
					alert("Please enter positions of subscription  greater than zero.");
					document.form1.positions.focus();
					return false;
				}
				
				flag=checkNumber("Please enter the positions of subscription in number only.",document.form1.positions);
				if(flag==false) { return false; }*/
			}
		}
	}
	
	if(document.getElementById("number_job").value!="")
	{
	
		flag=checkBlank("Please enter the cost of additional job ads.",document.form1.rate_per_position);
		if(flag==false) { return false; }
		
		flag=checkNumber("Please enter a number only for the cost of additional job ads.",document.form1.rate_per_position);
		if(flag==false) { return false; }
	}
		 
	return true;
}

function validatePlanRec()
{	
	
	flag=checkBlank("Please enter a name for the subscription.",document.form1.plan_name);
	if(flag==false) { return false; }
	
	flag=isnumber_dot("Please insert a number for the number of job ads.",document.form1.number_job);
	if(flag==false) { return false; }
	
	if(document.form1.number_job.value=="" &&  document.form1.unlimited_job_ads.checked==false)
	{
		alert("Please select either 'Post unlimited number of job ads' or insert number of job ads.");	
		document.form1.unlimited_job_ads.focus();
		return false;
	}
	
	
	flag=checkBlank("Please enter the cost of the subscription.",document.form1.rate);
	if(flag==false) { return false; }
	
	if(document.form1.rate.value==0)
	{
		alert("Please enter a value greater than zero for the cost of the subscription.");
		document.form1.rate.focus();
		return false;
	}
	
	flag=checkNumber("Please enter a number only for the cost of the subscription.",document.form1.rate);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the positions of subscription.",document.form1.positions);
	if(flag==false) { return false; }
	
	if(document.form1.positions.value==0)
	{
		alert("Please enter positions of subscription  greater than zero.");
		document.form1.positions.focus();
		return false;
	}
	
	flag=checkNumber("Please enter the positions of subscription in number only.",document.form1.positions);
	if(flag==false) { return false; }
	*/

	if(document.getElementById("number_job").value!="")
	{
		flag=checkBlank("Please enter the cost of additional job ads.",document.form1.rate_per_position);
		if(flag==false) { return false; }
		
		flag=checkNumber("Please enter the cost of additional job ads in numbers only.",document.form1.rate_per_position);
		if(flag==false) { return false; }
	}
	 
	return true;
}





function validateAdminUser()
{	
	flag=checkBlank("Please enter the user name.",document.form1.user_name);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the first name.",document.form1.user_first_name);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the last name.",document.form1.user_last_name);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter your email address. address.",document.form1.user_email);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.user_email);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the telephone number.",document.form1.user_phone);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the copyright.",document.form1.user_copyright);
	if(flag==false) { return false; }
	 
	 
	return true;
}


function validatePassword()
{
    var flag; 
	flag = checkBlank("Please enter a new password.",document.form1.newp);
	if(flag==false) { return false; }
	flag = checkBlank("Please re-enter the new password.",document.form1.con_new);
	if(flag==false) { return false; }
	flag = check_rpassward("Please enter the correct password.",document.form1.newp,document.form1.con_new);
	if(flag==false) { return false; }
	
	return true;
}
function validateVat()
{
    var flag; 
	flag = checkBlank("Please enter VAT.",document.form1.vat);
	if(flag==false) { return false; }
	flag = checkNumber("Please enter a number only in the VAT field.",document.form1.vat);
	if(flag==false) { return false; }
	if(document.form1.vat.value<=0)
	{
		alert("Please enter a value greater than zero in the VAT field.");
		document.form1.vat.focus();
		return false;
	}
	flag = checkBlank("Please select VAT status.",document.form1.vat_status);
	if(flag==false) { return false; }
	return true;
}


function validateAdverts()
{	
	flag=checkBlank("Please enter the advert title.",document.form1.title);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the advert URL.",document.form1.url);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the advert description.",document.form1.desc1);
	if(flag==false) { return false; }
	
	return true;
}
function validatePartners()
{
	flag=checkBlank("Please enter the company name.",document.form1.company_name);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the company description.",document.form1.company_desc);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter an email address.",document.form1.email_address);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter a valid email address.",document.form1.email_address);
	if(flag==false) { return false; }
	
	return true;
}
function validateTutorials()
{
	flag=checkBlank("Please enter the tutorial name.",document.form1.vt_name);
	if(flag==false) { return false; }

	return true;
}
function validateBanner()
{	
	flag=checkBlank("Please enter the banner title.",document.form1.title);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the banner URL.",document.form1.url);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the banner image.",document.form1.banner_image);
	if(flag==false) { return false; }

	flag=imgFilter("Please enter the banner image with extension .jpg, .gif or .png",document.form1.banner_image);
	if(flag==false) { return false; }
	
	return true;
}
function validateBannerEdit()
{	
	flag=checkBlank("Please enter the banner title.",document.form1.title);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the banner URL.",document.form1.url);
	if(flag==false) { return false; }
	
	if(document.form1.banner_image!=""){
		flag=imgFilter("Please enter the banner image with extension .jpg, .gif or .png",document.form1.banner_image);
		if(flag==false) { return false; }
	}
	return true;
}

function validateJob()
{	
	flag=checkDate("Please enter a valid registration 'from' date.","reg_date_from");
	if(flag==false) { return false; }
	
	flag=checkDate("Please enter a valid registration 'to' date.","reg_date_to");
	if(flag==false) { return false; }
	
	return true;
}

function validateGradeLevel()
{	
	flag=checkBlank("Please enter title.",document.form1.field_value);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter row value.",document.form1.row);
	if(flag==false) { return false; }
	flag=checkNumber("Please enter row value in numbers only.",document.form1.row);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter column value.",document.form1.column);
	if(flag==false) { return false; }
	
	flag=checkNumber("Please enter column value in numbers only.",document.form1.column);
	if(flag==false) { return false; }
	
	return true;
}

/*
function funSubmit(val)
	{
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
		
		theSelFrom=document.form1.postal_country;
		var id=theSelFrom.options[theSelFrom.selectedIndex].value
		
		//==================================================================================
		//make Appointee list blank 
		//==================================================================================
		theSelFrom1=document.form1.seeker_state;
		selLength = theSelFrom.length;
		selectedValues = new Array();
		selectedCount = 0;
		for(i=selLength-1; i>=0; i--)
			{				
			theSelFrom1.remove(theSelFrom1.options[i])
			}

		//==================================================================================
		//copy all respective Appointee into Appointee list box
		//================================================================================== 
		theSelFrom=document.form1.seeker_state1;
		selLength = theSelFrom.length;
		selectedValues = new Array();
		selectedCount = 0;
		for(i=selLength-1; i>=0; i--)
			{
			var emailid=theSelFrom.options[i].value	
			var name=emailid.split("^")
				if(name[1]==id)
				{
					var oOption = document.createElement("OPTION"); 
					oOption.text=theSelFrom.options[i].text; 
					oOption.value=name[0]; 
					
					theSelFrom1.options.add(oOption); 
					//theSelFrom1.options[theSelFrom1.selectedIndex].value=val;
				}
			}
			document.getElementById("seeker_state").value=val;
		//=========================================================================
	}*/
	
	
	
	
	
function displaySubject(subject)
{
	//alert(subject);
	if(subject=="leaver")
	{
		//alert("hhh");
		document.getElementById("leaver_seeker_addsubject").style.display="";
		//document.getElementById("leaver_img").style.display="none";
		//document.getElementById("full_img").style.display="";
		//document.getElementById("leaver_seeker_addsubject1").style.display="";
	}
	else if(subject=="full")
	{
		
		document.getElementById("full_seeker_addsubject").style.display="";
		//document.getElementById("full_img").style.display="none";
		//document.getElementById("leaver_img").style.display="";
		
		//document.getElementById("full_seeker_addsubject1").style.display="";
	}
}

function authorityDisplay()
{
	
	if(document.form1.seeker_professional_endorsements.value=="")
	{
		
		document.getElementById("au1").style.display="none";
		document.getElementById("au2").style.display="none";
		document.getElementById("au3").style.display="none";
	}
	else if(document.form1.seeker_professional_endorsements.value=="Yes")
	{
		
		document.getElementById("au1").style.display="";
		document.getElementById("au2").style.display="";
		document.getElementById("au3").style.display="";
	}
}

// This is newly added function to compare date with current date
function compareDateArrayToday(msg,obfromdate,obfrommonth,obfromyear)
{	
	var _dateFrom = obfromdate.value;
	var _monthFrom =obfrommonth.value - 1; // This is to subtract because it takes month + 1 value
	var _yearFrom = obfromyear.value;
	var _fulldateFrom = new Date(_yearFrom,_monthFrom,_dateFrom);
	var _fulldateTo = new Date( );	
	if(_fulldateFrom <= _fulldateTo )
	{
		alert(msg);
		obfromdate.focus();
		return false;
	}
	return true;
}