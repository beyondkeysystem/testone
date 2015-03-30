// JavaScript Document
function othercity()
{
	//alert("hi");
	if(document.form1.postal_city.value=="--- Other ---")
	{
		document.getElementById("span_postal_city").style.display="";
		//document.getElementById("other_postal_city").value="";
	}
	else
	{
		document.getElementById("span_postal_city").style.display="none";
	}
}
function otherreccity()
{
	//alert("hi");
	if(document.form1.rec_city.value=="--- Other ---")
	{
		document.getElementById("span_other_city").style.display="";
		document.getElementById("other_rec_city").value="";
	}
	else
	{
		document.getElementById("span_other_city").style.display="none";
	}
}
function getPrint(url)
{
	window.open(url);
}
function DisplayWorktype()
{
	if( document.form1.seeker_work_type[0].checked==true)
	{
	 	document.getElementById("vacation").style.display="";
		document.getElementById("attach").style.display="none";
	}
	else if(document.form1.seeker_work_type[1].checked==true)
	{
		document.getElementById("attach").style.display="";
		document.getElementById("vacation").style.display="none";
	}
}

function check_parent_select(form) {
		if(form.checked == true) {
			if(document.getElementById("bursary_con_granting[12]").checked	== false) {
				document.getElementById("bursary_con_granting[12]").checked = true ;	
			}		
		} 
} 
function check_child_select(form) {
		if(form.checked == false) {
			if(document.getElementById("bursary_con_granting[13]").checked	== true) {
				document.getElementById("bursary_con_granting[13]").checked = false ;	
			}		
			if(document.getElementById("bursary_con_granting[14]").checked	== true) {
				document.getElementById("bursary_con_granting[14]").checked = false ;	
			}		
			if(document.getElementById("bursary_con_granting[15]").checked	== true) {
				document.getElementById("bursary_con_granting[15]").checked = false ;	
			}		
		} 
} 
function other_basedcity()
{
	if(document.form1.based_in_town.value == "--- Other ---")
	{
		document.getElementById("span_based_city").style.display = "";
		//document.getElementById("other_business_city").value="";
	}
	else
	{
		document.getElementById("span_based_city").style.display = "none";		
	}
}


function validCheque()
{
	flag=checkBlank("Please enter the Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	if(document.form1.pay_amount.value !=document.form1.totpay.value)
	{
		alert("Please enter the total payment i.e."+document.form1.totpay.value);
		document.form1.pay_amount.focus();
		return false;
	}
	flag=checkBlank("Please enter the cheque no.",document.form1.cheque_number);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in cheque number.",document.form1.cheque_number);
	if(flag==false) { return false; }			
	
	flag=checkDate("Please select the proper cheque date.","cheque",1);
	if(flag==false) { return false; }		
	
	flag=checkBlank("Please enter the bank name.",document.form1.bank);
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please enter the branch.",document.form1.branch);
	if(flag==false) { return false; }			
	
	return true;
}
function validEFT()
{
	flag=checkBlank("Please enter the Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	if(document.form1.pay_amount.value !=document.form1.totpay.value)
	{
		alert("Please enter the total payment i.e."+document.form1.totpay.value);
		document.form1.pay_amount.focus();
		return false;
	}
	flag=checkBlank("Please enter the Bank Account no.",document.form1.account_number);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please enter the bank name.",document.form1.bank);
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please enter the branch.",document.form1.branch);
	if(flag==false) { return false; }			
	
	return true;
}

function validChequePartial()
{
	flag=checkBlank("Please enter the Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	/*if(document.form1.pay_amount.value !=document.form1.totpay.value)
	{
		alert("Please enter the total payment i.e."+document.form1.totpay.value);
		document.form1.pay_amount.focus();
		return false;
	}*/
	flag=checkBlank("Please enter the cheque no.",document.form1.cheque_number);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in cheque number.",document.form1.cheque_number);
	if(flag==false) { return false; }			
	
	flag=checkDate("Please select the proper cheque date.","cheque",1);
	if(flag==false) { return false; }		
	
	flag=checkBlank("Please enter the bank name.",document.form1.bank);
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please enter the branch.",document.form1.branch);
	if(flag==false) { return false; }			
	
	return true;
}
function validEFTPartial()
{
	flag=checkBlank("Please enter the Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in Pay Ammount.",document.form1.pay_amount);
	if(flag==false) { return false; }	
	
	/*if(document.form1.pay_amount.value !=document.form1.totpay.value)
	{
		alert("Please enter the total payment i.e."+document.form1.totpay.value);
		document.form1.pay_amount.focus();
		return false;
	}*/
	flag=checkBlank("Please enter the Bank Account no.",document.form1.account_number);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please enter the bank name.",document.form1.bank);
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please enter the branch.",document.form1.branch);
	if(flag==false) { return false; }			
	
	return true;
}



function seeker_type(form,fromTemp) {
	if(form.value == "Bursary application Position") {
		window.location.href = "search_bursary.php?change_vacancy&vacancy="+form.value + fromTemp;	
	} else if(form.value == "Job attachment Position"){
		window.location.href = "search_vacation.php?change_vacancy&vacancy="+form.value +fromTemp ;	
	}	
	else if(form.value == "Skilled/Unskilled Position"){
		window.location.href = "search_jobseekers.php?change_vacancy&vacancy="+form.value +fromTemp ;	
	}	
	return true ;
}
function vacancy_type(form,fromTemp,type) {
	
	if(form.value == "Bursary application Position") {
		window.location.href = "job_add_bursary.php?change_vacancy&vacancy="+form.value + fromTemp;	
	} else {
		if(type=="1")
		{
			window.location.href = "job_add_1.php?change_vacancy&vacancy="+form.value +fromTemp ;	
		}
		else if(type=="3")
		{
			window.location.href = "job_add_3.php?change_vacancy&vacancy="+form.value +fromTemp ;	
		}
		else if(type=="4")
		{
			window.location.href = "job_add_4.php?change_vacancy&vacancy="+form.value +fromTemp ;	
		}
		
	}			
	return true ;
}

function vacancy_type_edit(form) {
	if(form.value == "Bursary application Position") {
		window.location.href = "job_edit_bursary.php?change_vacancy&vacancy="+form.value ;	
	} else {
		window.location.href = "job_edit.php?change_vacancy&vacancy="+form.value ;	
	}			
	return true ;
}


function checkPay(pay_by)
{
	if(pay_by == "Cheque")
	{
		/*document.getElementById("divCheque_accno").style.display = "none";
		document.getElementById("divCheque1").style.display = "";
		document.getElementById("divCheque2").style.display = "";
		//document.getElementById("divCheque5").style.display = "";
		//document.getElementById("divCheque6").style.display = "";*/
		document.getElementById("pay_cheque").style.display = "";
		document.getElementById("pay_eft").style.display = "none";
	}
	else
	{
		/*document.getElementById("divCheque_accno").style.display = "";
		document.getElementById("divCheque1").style.display = "none";	
		document.getElementById("divCheque2").style.display = "none";	
		//document.getElementById("divCheque5").style.display = "none";
		//document.getElementById("divCheque6").style.display = "none";*/
		document.getElementById("pay_eft").style.display = "";
		document.getElementById("pay_cheque").style.display = "none";
		
	}
}	

function other_city()
{
	if(document.form1.business_city.value == "--- Other ---")
	{
		document.getElementById("span_business_city").style.display = "";
		//document.getElementById("other_business_city").value="";
	}
	else
	{
		document.getElementById("span_business_city").style.display = "none";		
	}
}

function validateRecruiterStep3(form,edit)
{
   if(edit == 1)
	{
		if((form.rec_oldpassword.value != "" || form.rec_password.value != "")  && form.rec_oldpassword.value != form.getOldPassword.value)
		{
			alert("Please enter correct old password.");
			form.rec_oldpassword.focus();
			return false;
		}		
	}
	if((edit == 1 && form.rec_oldpassword.value != "") || edit == 0)
	{
	if(edit == 0) {	
		flag=checkBlank("Please enter the password.",form.rec_password);
		if(flag==false) { return false; }
	}
	if((edit == 1 && form.rec_password.value != "") || edit == 0) {
		flag = check_length("password should be between 4 to 15 characters long.",form.rec_password);
		if(flag==false) { return false; }
		
		flag=checkBlank("Please enter the confirm password.",form.rec_confirmpassword);
		if(flag==false) { return false; }
	
		flag = checkPassword("Please enter correct password.",form.rec_password,form.rec_confirmpassword);
		if(flag==false) { return false; }
	}
	}
	
	if(edit == 0)
	{
		
		if(form.comp_type[1].checked)
		{
			
			flag = form.rec_terms2.checked;
			if(flag == false) { alert("You must agree to the terms and conditions of Good Code of Practice."); return false; }
		}
		
		flag = form.terms.checked;
		if(flag == false) { alert("You must agree to the terms and conditions."); return false; }
	}
	return true;
	
}






function validateRecruiterStep2(form,edit)
{	
	if(!edit)
		edit = 0;
	
	flag=checkBlank("Please enter the phone.",form.rec_phone);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the email.",form.rec_email);
	if(flag==false) { return false; }
	
	flag=checkEmail("Please enter the  valid email.",form.rec_email);
	if(flag==false) { return false; }
	
		return true;
}

function validateRecruiter(form,edit)
{	
	if(!edit)
		edit = 0;
		
	flag=checkBlank("Please enter the contact name.",form.rec_name);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the company name.",form.comp_name);
	if(flag==false) { return false; }	

	//alert(form.business_street_num)
	if(form.business_street_num!=""){
		flag=checkNumber("Please enter the Number.",form.business_street_num);
		if(flag==false) { return false; }
	}
	
	/*flag=checkBlank("Please enter the address.",form.rec_address);
	if(flag==false) { return false; }
	
	/*flag=checkBlank("Please enter the postal code.",form.rec_postalcode);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the city.",form.rec_city);
	if(flag==false) { return false; }*/
	
	/*if(form.rec_city.value == "--- Other ---")
	{
		flag=checkBlank("Please enter the city.",form.other_rec_city);
		if(flag==false) { return false; }
		
		flag=isAlpha("Please enter the alphabets only in city.",form.other_rec_city);
		if(flag==false) { return false; }
	}*/
	
	/*
	flag=checkBlank("Please select the country.",form.rec_country);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please enter the state.",form.rec_state);
	if(flag==false) { return false; }	
	*/
	if(form.business_city.value == "--- Other ---")
	{
		flag=checkBlank("Please enter the city.",form.other_business_city);
		if(flag==false) { return false; }
		
		flag=isAlpha("Please enter the alphabets only in city.",form.other_business_city);
		if(flag==false) { return false; }
	}
	
	flag=checkBlank("Please enter the country.",form.business_country);
	if(flag==false) { return false; }	

	//flag=checkBlank("Please enter city.",form.postal_city);
	//if(flag==false) { return false; }
	
	if(form.postal_city.value == "--- Other ---")
	{
		flag=checkBlank("Please enter the city.",form.other_postal_city);
		if(flag==false) { return false; }
		
		flag=isAlpha("Please enter the alphabets only in city.",form.other_postal_city);
		if(flag==false) { return false; }
	}
	
	flag=checkBlank("Please enter country.",form.postal_country);
	if(flag==false) { return false; }
	
	if(form.postal_country.value==146)
	{
		
		flag=checkBlank("Please enter region.",form.postal_region);
		if(flag==false) { return false; }
	}
	else
	{
		
		flag=checkBlank("Please enter region.",form.postal_region1);
		if(flag==false) { return false; }
	}
	//alert("test");
	/*var oth_region = document.getElementById('span_other_region');
	if(oth_region.style.display !='none'){
	flag=checkBlank("Please enter other region",form.other_region)
	if(flag==false) { return false; }
	}*/
	//alert("test");
	//flag=checkBlank("Please enter the vat registration number.",form.rec_vat_regno);
	//if(flag==false) { return false; }

	
	
	
	return true;
}

function setHiddenStateValue(obj){

	document.form1.rec_state.value=obj;
	}

function validate_job_ad(form,action)
{
	flag=checkBlank("Please enter the company name.",form.company_name);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the vacancy.",form.vacancy);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the position name.",form.position_name);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please enter the skills.",form.job_skills);
	if(flag==false) { return false; }		
	
	if((form.date_of_taking_year.value != "" || form.date_of_taking_date.value != "" ||  form.date_of_taking_month.value != "") && action=="add" ) {
		flag=checkDate("Please select the proper from date of taking up service.","date_of_taking",1);
		if(flag==false) { return false; }	

		flag=compareDateWithCureentDate("Please select future date in date of taking up service.","date_of_taking") 
		if(flag==false) { return false ;}
	}

	flag=checkDate("Please select the proper from date for ad running time.","adFrom",1);
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper to date for ad running time.","adTo",1);
	if(flag==false) { return false; }		
	
	flag=compareDate("To date should be greater than From date in ad running time2","adFrom","adTo");
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please select the level.",form.level);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please enter the from value in salary.",form.salary_from);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the to value in salary.",form.salary_to);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in salary offered.",form.salary_from);
	if(flag==false) { return false; }		
	
	flag=checkNumber("Please enter numbers only in salary offered.",form.salary_to);
	if(flag==false) { return false; }			
	
	flag=checkBlank("Please enter the town.",form.based_in_town);
	if(flag==false) { return false; }		
	
	flag=isAlpha("Please enter alphabets only in town.",form.based_in_town);
	if(flag==false) { return false; }	
	
	flag=checkNumber("Please enter numbers only in experience.",form.experience);
	if(flag==false) { return false; }		
	
	return true;
}
function save_job_ad(form)
{
	if(validate_job_ad(form,"add"))
	{
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }		
		form.target = '';
		form.action = "job_add_action.php";
		form.submit();		
	}
}
function save_job_ad_1(form)
{
	
	if(validate_job_ad_1(form,"add"))
	{
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }		
		
		form.target = '';
		form.action = "job_add_action.php?job_type=1";
		form.submit();		
	}
}

function save_job_ad_3(form)
{
	if(validate_job_ad_3(form,"add"))
	{
		flag=checkDate("Please select the proper from date for Holiday work / job attachment employment availability.","date_of_taking");
		if(flag==false) { return false; }	
		
		flag=checkDate("Please select the proper to date for Holiday work / job attachment employment availability.","date_of_takingTo");
		if(flag==false) { return false; }		
		
		flag=compareDate("To date should be greater than From date in Holiday work / job attachment employment availability","date_of_taking","date_of_takingTo");
		if(flag==false) { return false; }	
		
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }		
		form.target = '';
		form.action = "job_add_action.php?job_type=3";
		form.submit();		
	}
}
function save_job_ad_4(form)
{
	if(validate_job_ad_1(form,"add"))
	{
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }	
		form.method = "post";
		form.target = '';
		form.action = "job_add_action.php?job_type=4";
		form.submit();		
	}
}
function save_job_ad_5(form)
{
	
	if(validate_job_ad_5(form,"add"))
	{
		
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }		
		
		form.target = '';
		form.action = "job_add_action.php?job_type=5";
		form.submit();		
	}
}
function save_job_ad_bursary(form)
{	

	if(validate_job_ad_bursary(form))
	{	
		
		
		
		flag=checkDate("Please select the proper from date for ad running time.","adFrom",1);
		if(flag==false) { return false; }	
		
		flag=checkDate("Please select the proper to date for ad running time.","adTo",1);
		if(flag==false) { return false; }		
		
		flag=compareDate("To date should be greater than From date in ad running time","adFrom","adTo");
		if(flag==false) { return false; }			
		
		flag=DateExpiry("Please enter ad running to date within 3 week of posting date.","adTo","add");
		if(flag==false) { return false; }
		
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }		
		flag = document.form1.terms_bursary.checked;
		if(flag == false) { alert("You must agree to the terms and conditions of bursary."); return false; }
		
		form.target = '';
		form.action = "job_add_bursary_action.php";
		form.submit();		
	}
}

function validate_job_ad_bursary(form)
{  
	flag=checkBlank("Please enter the company name.",form.company_name);
	if(flag==false) { return false; }	

	/*flag=checkBlank("Please enter the vacancy.",form.vacancy);
	if(flag==false) { return false; }*/	

	flag=checkBlank("Please select bursary name.",form.bursary_name);
	if(flag==false) { return false; }	
	
	
	
	
	if(form.fileField.value!="")
	{
		var file=form.fileField.value;
		var mytool_array=file.split(".");	
		if(file!="")
		{
			if (mytool_array[mytool_array.length-1].toLowerCase()!="pdf" && mytool_array[mytool_array.length-1].toLowerCase()!="doc")
			{			
				alert("Please enter pdf or word document only.");
				form.fileField.focus();
				return false;
			}
		}
	}
	return true ;
}

function edit_job_ad(form)
{
	if(validate_job_ad(form,"edit"))
	{
		form.action = "job_edit_action.php";
		form.submit();		
	}
}
function edit_job_ad_1(form)
{
	if(validate_job_ad_1(form,"edit"))
	{
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		form.target = '';
		form.action = "job_edit_action.php?job_type=1";
		form.submit();		
	}
}
function edit_job_ad_3(form)
{
	if(validate_job_ad_3(form,"edit"))
	{
		flag=checkDate("Please select the proper from date for Holiday work / job attachment employment availability.","date_of_taking");
		if(flag==false) { return false; }	
		
		flag=checkDate("Please select the proper to date for Holiday work / job attachment employment availability.","date_of_takingTo");
		if(flag==false) { return false; }		
		
		flag=compareDate("To date should be greater than From date in Holiday work / job attachment employment availability","date_of_taking","date_of_takingTo");
		if(flag==false) { return false; }	
		
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		form.target = '';
		form.action = "job_edit_action.php?job_type=3";
		form.submit();		
	}
}
function edit_job_ad_4(form)
{
	if(validate_job_ad_1(form,"edit"))
	{
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		
		form.target = '';
		form.action = "job_edit_action.php?job_type=4";
		form.submit();		
	}
}
function edit_job_ad_5(form)
{
	if(validate_job_ad_1(form,"edit"))
	{
		flag=checkChecked("You must agree to the terms and conditions.",form.chkConfirm);
		if(flag==false) { return false; }	
		
		form.target = '';
		form.action = "job_edit_action.php?job_type=5";
		form.submit();		
	}
}

function edit_job_ad_bursary(form)
{
	if(validate_job_ad_bursary(form))
	{
		if(document.form1.send_mail_another.checked==true)
		{
			
			if(document.form1.another_email_id.value =="" )
			{
				alert("Please enter the email address to which you have to send cv.");
				document.form1.another_email_id.focus();
				return false;
			}
			if(checkEmail("Please enter the valid email address.",document.form1.another_email_id)==false)
			{
				return false;
			}
		}
		
		
		form.target = '';
		form.action = "job_edit_bursary_action.php";
		form.submit();		
	}
}


function checkMail(response_id){
	var params = "rec_email=" + document.form1.rec_email.value;
	if(document.form1.hid_rec_id != null)
		params = params + "&rec_id=" + document.form1.hid_rec_id.value;
		
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="ajax_check_mail.php";
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

function getStates(response_id,sel_state){
	document.form1.rec_state.value = '';
	var params = "rec_country=" + document.form1.business_country.value;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="ajax_getStates.php?sel_state=" + sel_state;
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

function validatePayment(val)
{
	flag=checkBlank("Please enter the Invoice ID.",document.form1.invoice_id);
	if(flag==false) { return false; }
	
	flag=checkNumber("Please enter the number only in  Invoice ID.",document.form1.invoice_id);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the payment amount.",document.form1.pay_amount);
	if(flag==false) { return false; }
	
	flag=checkNumber("Please enter the number only in payment amount.",document.form1.pay_amount);
	if(flag==false) { return false; }
	
	if(document.form1.pay_amount.value<=0)
	{
		alert("Please enter valid payment amount.");
		document.form1.pay_amount.focus();
		return false;
	}
	if(document.form1.pay_amount.value>val)
	{
		alert("Payment amount should not be greater than remaining amount.");
		document.form1.pay_amount.focus();
		return false;
	}
	flag=checkBlank("Please select the type of payment.",document.form1.pay_by);
	if(flag==false) { return false; }
	
	if(document.form1.pay_by.value == "Cheque")
	{
		if(validCheque())
		{
			document.form1.submit();	
		}
		else
		{
			return false;
		}
	}
	else if(document.form1.pay_by.value == "Credit Card")
	{
		document.form1.submit();		
		return true;
	}
	else if(document.form1.pay_by.value == "Cash")
	{
		document.form1.submit();		
		return true;
	}	
}

//for new recruiter

function validatePaymentNew(val)
{
	flag=checkBlank("Please enter the payment amount.",document.form1.pay_amount);
	if(flag==false) { return false; }
	
	flag=checkNumber("Please enter the number only in payment amount.",document.form1.pay_amount);
	if(flag==false) { return false; }
	
	if(document.form1.pay_amount.value<=0)
	{
		alert("Please enter valid payment amount.");
		document.form1.pay_amount.focus();
		return false;
	}
	if(document.form1.pay_amount.value>val)
	{
		alert("Payment amount should not be greater than amount.");
		document.form1.pay_amount.focus();
		return false;
	}
	
	
	
	
	flag=checkBlank("Please select the type of payment.",document.form1.pay_by);
	if(flag==false) { return false; }
	
	if(document.form1.pay_by.value == "Cheque")
	{
		if(validCheque())
		{
			document.form1.submit();	
		}
		else
		{
			return false;
		}
	}
	else if(document.form1.pay_by.value == "Credit Card")
	{
		document.form1.submit();		
		return true;
	}
}

function setHiddenValue(value){
//alert(value);	
var val = parseInt(value);
if(val == 16){
document.getElementById('span_other_region').style.display ='';
}
else{
document.getElementById('span_other_region').style.display ='none';
document.form1.other_region.value = "";
}
}


/*function funSubmit(val)
{
		//alert("kk");
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
			//alert("ll");
			//document.getElementById("postal_region1").value="";
			//alert(document.form1.postal_country.value);
			theSelFrom=document.form1.postal_country;
			var id=theSelFrom.options[theSelFrom.selectedIndex].value
			
			//==================================================================================
			//make Appointee list blank 
			//==================================================================================
			theSelFrom1=document.form1.postal_region;
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
				}
			}
		if(document.form1.postal_country.value==146)
		{
			document.getElementById("postal_region").style.display="";
			document.getElementById("postal_region").value=val;
			document.getElementById("postal_region1").value=document.getElementById("postal_region1").value;
			document.getElementById("postal_region1").style.display="none";
			
		}
		else
		{
			document.getElementById("postal_region").style.display="none";
			//document.getElementById("span_other_region").style.display="none";
			document.getElementById("postal_region1").style.display="";
			document.getElementById("postal_region1").value=document.getElementById("postal_region1").value;
		}
		
		//=========================================================================
}
function funSubmit1(val)
{
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
			//alert("ll");
			//document.getElementById("postal_region1").value="";
			//alert(document.form1.postal_country.value);
			theSelFrom=document.form1.postal_country;
			var id=theSelFrom.options[theSelFrom.selectedIndex].value
			
			//==================================================================================
			//make Appointee list blank 
			//==================================================================================
			theSelFrom1=document.form1.postal_region;
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
				}
			}
		if(document.form1.postal_country.value==146)
		{
			document.getElementById("postal_region").style.display="";
			document.getElementById("postal_region").value=val;
			document.getElementById("postal_region1").style.display="none";
			//document.getElementById("postal_region1").value="";
		}
		else
		{
			document.getElementById("postal_region").style.display="none";
			document.getElementById("span_other_region").style.display="none";
			document.getElementById("postal_region1").style.display="";
			//document.getElementById("postal_region1").value="";
		}
		//=========================================================================
}*/
function funSubmit(val)
{
		//alert(val)
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
			//alert("ll");
			//document.getElementById("postal_region1").value="";
			//alert(document.form1.postal_country.value);
			theSelFrom=document.form1.postal_country;
			var id=theSelFrom.options[theSelFrom.selectedIndex].value
			
			//==================================================================================
			//make Appointee list blank 
			//==================================================================================
			theSelFrom1=document.form1.postal_region;
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
				}
			}
			
		if(document.form1.postal_country.value==146)
		{
			document.getElementById("postal_region").style.display="";
			document.getElementById("postal_region").value=val;
			document.getElementById("postal_region1").value=document.getElementById("postal_region1").value;
			document.getElementById("postal_region1").style.display="none";
			
		}
		else
		{
			document.getElementById("postal_region").style.display="none";
			//document.getElementById("span_other_region").style.display="none";
			document.getElementById("postal_region1").style.display="";
			document.getElementById("postal_region1").value=document.getElementById("postal_region1").value;
		}
		
		//=========================================================================
}
function checkOtherRegion(val)
{
		
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
		if(document.form1.postal_region.value==16)
		{
			document.getElementById("span_other_region").style.display="";
			
			
		}
		else
		{
			document.form1.other_region.value = '';
			document.getElementById("span_other_region").style.display="none";
		}
		
		//=========================================================================
}
function funSubmit1(val)
{
		//alert(val)
		//==================================================================================
		//get selected value of dept from dept list box
		//==================================================================================
			//alert("ll");
			//document.getElementById("postal_region1").value="";
			//alert(document.form1.postal_country.value);
			theSelFrom=document.form1.postal_country;
			var id=theSelFrom.options[theSelFrom.selectedIndex].value
			
			//==================================================================================
			//make Appointee list blank 
			//==================================================================================
			theSelFrom1=document.form1.postal_region;
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
				}
			}
		if(document.form1.postal_country.value==146)
		{
			document.getElementById("postal_region").style.display="";
			document.getElementById("postal_region").value=val;
			document.getElementById("postal_region1").style.display="none";
			//document.getElementById("postal_region1").value="";
		}
		else
		{
			document.getElementById("postal_region").style.display="none";
			document.getElementById("span_other_region").style.display="none";
			document.getElementById("postal_region1").style.display="";
			//document.getElementById("postal_region1").value="";
		}
		//=========================================================================
}

////New Add ons
function validate_job_ad_1(form,action)
{
	flag=checkBlank("Please enter the company name.",form.company_name);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the type of position.",form.vacancy);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the position name.",form.position_name);
	if(flag==false) { return false; }	
	if(action=="add"){
	flag=checkDate("Please select the proper from date for ad running time.","adFrom",1);
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper to date for ad running time.","adTo",1);
	if(flag==false) { return false; }		
	
	flag=compareDate("To date should be greater than From date in ad running time3","adFrom","adTo");
	if(flag==false) { return false; }			
	
	flag=DateExpiry("Please enter ad running to date within 3 week of posting date.","adTo",action);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select the proper to date for ad running time.","date_of_taking");
	if(flag==false) { return false; }	
	flag=compareDate("Assumptions of duties  date should be greater than From date of ad running time","adFrom","date_of_taking");
	if(flag==false) { return false; }	}
	
	flag=checkBlank("Please select the level.",form.level);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select the country .",form.ad_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the town.",form.based_in_town);
	if(flag==false) { return false; }		
	
	
	
	/*flag=isAlpha("Please enter alphabets only in town.",form.based_in_town);
	if(flag==false) { return false; }	
	*/
	if(form.fileField.value!="")
	{
		var file=form.fileField.value;
		var mytool_array=file.split(".");	
		if(file!="")
		{
			if (mytool_array[mytool_array.length-1].toLowerCase()!="pdf" && mytool_array[mytool_array.length-1].toLowerCase()!="doc")
			{			
				alert("Please enter pdf or word document only.");
				form.fileField.focus();
				return false;
			}
		}
	}
	return true;
}

function validate_job_ad_3(form,action)
{
	flag=checkBlank("Please enter the company name.",form.company_name);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the type of position.",form.vacancy);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the position name.",form.position_name);
	if(flag==false) { return false; }	
	if(action=="add"){
	flag=checkDate("Please select the proper from date for ad running time.","adFrom",1);
	if(flag==false) { return false; }	
	
	flag=checkDate("Please select the proper to date for ad running time.","adTo",1);
	if(flag==false) { return false; }		
	
	flag=compareDate("To date should be greater than From date in ad running time","adFrom","adTo");
	if(flag==false) { return false; }			
	
	flag=DateExpiry("Please enter ad running to date within 3 week of posting date.","adTo",action);
	if(flag==false) { return false; }
	
	flag=checkDate("Please select the proper to date for ad running time.","date_of_taking");
	if(flag==false) { return false; }	
		}
	
	flag=checkBlank("Please select the level.",form.level);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select the country .",form.ad_country);
	if(flag==false) { return false; }
	
	flag=checkBlank("Please enter the town.",form.based_in_town);
	if(flag==false) { return false; }		
	
	
	
	/*flag=isAlpha("Please enter alphabets only in town.",form.based_in_town);
	if(flag==false) { return false; }	
	*/
	if(form.fileField.value!="")
	{
		var file=form.fileField.value;
		var mytool_array=file.split(".");	
		if(file!="")
		{
			if (mytool_array[mytool_array.length-1].toLowerCase()!="pdf" && mytool_array[mytool_array.length-1].toLowerCase()!="doc")
			{			
				alert("Please enter pdf or word document only.");
				form.fileField.focus();
				return false;
			}
		}
	}
	return true;
}
function validate_job_ad_5(form,action)
{
	flag=checkBlank("Please enter the company name.",form.company_name);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the type of position.",form.vacancy);
	if(flag==false) { return false; }	

	flag=checkBlank("Please enter the position name.",form.position_name);
	if(flag==false) { return false; }	
	
	flag=checkBlank("Please select the level.",form.level);
	if(flag==false) { return false; }	
	
	if(action=="add"){
		flag=checkDate("Please select the proper from date for ad running time.","adFrom",1);
		if(flag==false) { return false; }	
		
		flag=checkDate("Please select the proper to date for ad running time.","adTo",1);
		if(flag==false) { return false; }		
		
		flag=compareDate("To date should be greater than From date in ad running time3","adFrom","adTo");
		if(flag==false) { return false; }			
		
		flag=DateExpiry("Please enter ad running to date within 3 week of posting date.","adTo",action);
		if(flag==false) { return false; }
	}
	
	
	flag=checkBlank("Please enter the town.",form.based_in_town);
	if(flag==false) { return false; }		
	
	
	
	/*flag=isAlpha("Please enter alphabets only in town.",form.based_in_town);
	if(flag==false) { return false; }	
	*/
	return true;
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
	return Math.abs(difference/1000/60/60/24) ;
}

function fillToDate()
{
	
	document.form1.adTo_date.disabled=true;
	document.form1.adTo_month.disabled=true;
	document.form1.adTo_year.disabled=true;
	document.form1.adTo_date.value="";
	document.form1.adTo_month.value="";
	document.form1.adTo_year.value="";
	if(document.form1.adFrom_date.value!="" && document.form1.adFrom_month.value!="" && document.form1.adFrom_year.value!="")
	{
		var _dateTo  = document.form1.adFrom_date.value;
		var _monthTo = document.form1.adFrom_month.value;
		var _yearTo  =  document.form1.adFrom_year.value;
		var nextDate = new Date(_yearTo,_monthTo-1,_dateTo);
		var _endDate=new Date(nextDate.getTime() + 21*24*60*60*1000);
		
		
		myDate=new Date()
		var currentTime;
		var currentTime = new Date(myDate.getTime() + 21*24*60*60*1000)
		var month = currentTime.getMonth()+1
		var day = currentTime.getDate()
		var year = currentTime.getFullYear()
		
		var _day21 = new Date(year,month,day);
		
		var nextDateday = nextDate.getDate();
		var nextDatemonth = nextDate.getMonth()+1;
		var nextDateyear = nextDate.getFullYear();
		var myDateday = myDate.getDate();
		var myDatemonth = myDate.getMonth()+1;
		var myDateyear = myDate.getFullYear();
		
		var newnextDate = nextDateday+"/"+nextDatemonth+"/"+nextDateyear;
		var newmyDate = myDateday+"/"+myDatemonth+"/"+myDateyear;
		
		//alert(newnextDate+"---"+newmyDate)
		//alert(days_between(newnextDate,newmyDate))
		if(!isLessThanFrom(newnextDate,newmyDate)){
			 alert("Please enter from date of ad running time greater than current date");
		} else if(days_between(newnextDate,newmyDate) > 21 ){
			alert("Please enter from date of ad running time within 21 days from current date");
		}
		else
		{
		
		
		var arrmonth= new Array("January","February","March","April","May","June","July","August","September","October","November","December");
		
		document.form1.adTo_date.disabled=false;
		document.form1.adTo_month.disabled=false;
		document.form1.adTo_year.disabled=false;
		
		//alert(_endDate.getFullYear());
		_mm=_endDate.getMonth()+1;
		_dd=_endDate.getDate();
		_yy =_endDate.getFullYear();
		var j=document.form1.adFrom_date.value;
		val=parseInt(document.form1.adFrom_date.value)+21;
		for(i=document.form1.adFrom_date.value;i<=val;i++)
		{
			document.form1.adTo_date.options[i]= null;
		}
		document.form1.adTo_date.length = 0;
		for(i=document.form1.adFrom_date.value;i<=val;i++)
		{
			
			if(j==32) j=1;
			document.form1.adTo_date.options[document.form1.adTo_date.options.length] = new Option(j,j);
			j++;
		}
		for(i=parseInt(document.form1.adFrom_month.value);i<=parseInt(_mm);i++)
		{
			document.form1.adTo_month.options[i]= null;
		}
		document.form1.adTo_month.length = 0;
		if(parseInt(document.form1.adFrom_month.value)==12 && parseInt(_mm)==1) { _mm=13; }
		for(i=parseInt(document.form1.adFrom_month.value);i<=parseInt(_mm);i++)
		{
			if(i==13)
			{
				document.form1.adTo_month.options[document.form1.adTo_month.options.length] = new Option(arrmonth[0],i);
			}else{
			document.form1.adTo_month.options[document.form1.adTo_month.options.length] = new Option(arrmonth[i-1],i);}
		}
		for(i=parseInt(document.form1.adFrom_year.value);i<=parseInt(_yy);i++)
		{
			document.form1.adTo_year.options[i]= null;
		}
		document.form1.adTo_year.length = 0;
		//alert(parseInt(document.form1.adFrom_year.value));
		//alert(parseInt(_yy));
		for(i=parseInt(document.form1.adFrom_year.value);i<=parseInt(_yy);i++)
		{
			document.form1.adTo_year.options[document.form1.adTo_year.options.length] = new Option(i,i);
                       // alert(document.form1.adTo_year.options[document.form1.adTo_year.options.length]);
                }
		}
	}
}
function diff()
{
		myDate=new Date()
		var currentTime;
		var currentTime = new Date(myDate.getTime() + 5*24*60*60*1000)
		//var myDate = new Date(myDate.getTime() + 1*24*60*60*1000)
		alert(currentTime)
		var diffdate = new Date(currentTime.getTime()-myDate.getTime())
		
		var month = diffdate.getMonth()-1
		var day = diffdate.getDate()
		var year = diffdate.getFullYear()
		var _endDate = new Date(year,month,day);
		alert(Math.round(diffdate/1000/60/60/24));
}
function send_mail_to_another(chk)
 {
   
  
   if(chk.checked)
    {
        document.getElementById("another_email").style.display="";
    }
    else 
    {
        document.getElementById("another_email").style.display="none";
      
       
    }
}
function send_mail_to_another_load(chk)
 {
 
 
  if(chk==1)
    {
        document.getElementById("another_email").style.display="";
    }
    else 
    {
        document.getElementById("another_email").style.display="none";
      
       
    }
}
//end new add ons

// This is newly added function to add to talentwarehouse  and shortlist
function addSingleSeeker(opt,id){	
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url = "ajax_addSingleSeeker.php?addOpt=" + opt + "&seekerId=" + id;	
	xmlHttp.onreadystatechange = function(){
		//alert(document.getElementById("talentWarehouse"));	
		//document.getElementById("talentWarehouse").innerHTML = '';	
		//alert(xmlHttp.responseText);
		if (xmlHttp.readyState==4) {
			//alert(xmlHttp.responseText);
		if ( xmlHttp.responseText == "1" ) {
			
			document.getElementById("talentWarehouse").innerHTML ="";
			document.getElementById("talentWarehouse").innerHTML = "<span class = 'comment_big'>CV added successfully.</span>";
			//document.getElementById("talentWarehouse").innerHTML = " ";
			} else if( xmlHttp.responseText == "2" ){				
			document.getElementById("shortlistDiv").innerHTML = "";
			document.getElementById("shortlistDiv").innerHTML = "<span class = 'comment_big'>CV shortlisted.</span>";
			//checkThisTS(opt);
			} else { alert("Sorry ! unable to perform this operation"); return false; }
		}
	};
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
	
}


function add_comment_to( sid ){
	var showOn = "";
	if( document.frmComment.showOn[0].checked == false && document.frmComment.showOn[1].checked == false){ 
	alert("Please check at least one checkbox");
	document.frmComment.showOn[0].focus();
	return false; }
	else {
	
		if( document.frmComment.showOn[0].checked == true && document.frmComment.showOn[1].checked == false ){
		showOn = "short";
		}
		else if( document.frmComment.showOn[0].checked == false && document.frmComment.showOn[1].checked == true ){
		showOn = "talent";
		} else {
		showOn = "both";
		}
	}
	if(document.frmComment.emp_comment.value == "" ){  
		alert("Please enter comment"); 
		document.frmComment.emp_comment.focus();
		return false; 
	}	
var params = "seeker_comments=" + document.frmComment.emp_comment.value;
xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url="emp_comment_action.php?seeker_id=" + sid+"&showOn="+showOn;
	xmlHttp.onreadystatechange=function stateChanged_Country() { 
		if (xmlHttp.readyState==4){
			if( xmlHttp.responseText == '1') {
				document.getElementById("cMsg").innerHTML= '';
				document.getElementById("cMsg").innerHTML = "Your comment successfully updated";
				//location.href = '<?=$page_url?>';
			}
		}
	};
	xmlHttp.open("POST",url,true);
	
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", params.length);
	xmlHttp.setRequestHeader("Connection", "close");	
	
	xmlHttp.send(params);
}


/*************************************  Nav HandOver DynamicCssClass Start ***********************************************************/
$(function() {
    var $mainNav = $('#main-nav'),
    navWidth = $mainNav.width();
    
    $mainNav.children('.main-nav-item').hover(function(ev) {
        var $this = $(this),
        $dd = $this.find('.main-nav-dd');
        
        // get the left position of this tab
        var leftPos = $this.find('.main-nav-tab').position().left;
        
        // get the width of the dropdown
        var ddWidth = $dd.width(),
        leftMax = navWidth - ddWidth;
        
        // position the dropdown
        $dd.css('left', Math.min(leftPos, leftMax) );
        
        // show the dropdown
        $this.addClass('main-nav-item-active');
    }, function(ev) {

        // hide the dropdown
        $(this).removeClass('main-nav-item-active');
    });
	
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
	
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});
});



