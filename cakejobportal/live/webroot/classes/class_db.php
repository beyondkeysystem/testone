<?
global $cn;
class db
{		
		
		
		function Connection()
		{
			
			// local
				/*$cn = mysql_connect("localhost","namrecru","aAu&uz9UBuny");			
				mysql_select_db("namrecru_jobportal");	
				*/// local
				global $cn;
				// $cn = mysql_connect("localhost","namrecru_demo", 'demo');
				//mysql_select_db("namrecru_demo",$cn);
                                
                                $cn = mysql_connect("localhost","root", '');
				mysql_select_db("cakejobportal",$cn);
				
			// somanshealth
			//$cn=mysql_connect ("p41mysql147.secureserver.net", "somanhealth", "Soman%123") or die ('I cannot connect to the database because: ' . mysql_error());
			//mysql_select_db ("somanhealth"); 		
							
			// alpha			
			//$cn = mysql_connect("localhost","surfboard","surf123");			
			//mysql_select_db("surf_board");		
						
			//$cn=mysql_connect ("p41mysql115.secureserver.net", "alpha_web", "Web1234") or die ('I cannot connect to the database because: ' . mysql_error());
			//mysql_select_db ("alpha_web"); 		
		}
		
		
		/*
			***************** Display error *************
			$sql : sql statement
			$err : mysql_error()
			$errno: myslq_errno()
		*/
		function handle_mysql_error($sql,$err,$errno)
		{
			echo($sql . "<br>" . $err . "       on   " . $errno);
			exit();
		}		
		/*
			************* Execute Sql Statement ****************
			
		*/
		function ExecuteQuery($sql)
		{
			$result = @mysql_query($sql) or $this->handle_mysql_error($sql,mysql_error(),mysql_errno());

			return $result;
		}
		
		function ExecuteQueryImport($sql)
		{
			global $cn;
			$result = mysql_query($sql,$cn);
			return $result;
		}
		
		/*
			****This function insert the data into table***
			$arrFieldNameValue : It is array of table fieldName and fieldValue
			tblName : Name of table
		*/
		function InsertData($tblName,$arrFieldNameValue)
		{
			$sqlFirst ="Insert into " . $tblName . "(";
			$sqlSecond =" values(";
			while(list($key,$value) = each($arrFieldNameValue))
			{
				
				$sqlFirst = $sqlFirst . $key . ",";
				$sqlSecond = $sqlSecond . "'" . $value . "'" . ",";
				
			}
			
			//print($sqlFirst . "<br>");
			//print($sqlSecond);
			
			$sqlFirst = substr($sqlFirst,0,strlen($sqlFirst)-1) . ") ";
			$sqlSecond = substr($sqlSecond,0,strlen($sqlSecond)-1) .")";
			$sql = $sqlFirst . $sqlSecond;
			//print($sql."<br>");
			$result = $this->ExecuteQuery($sql); //Execute sql statement
			
			return $result;
			//echo($sql);
			
		}
		/*
			**************** delete record ***************
			$tblName: Name of table
			$FieldName : Field name of where condition
			$value : value of field
		*/
		function DeleteData($tblName,$FieldName,$value)
		{
			$sql = "delete from " .$tblName . " where " . $FieldName . "=" . "'".$value."'";
			//echo($sql);
			$result = $this->ExecuteQuery($sql); //Execute sql statement
		}
		/*
			************ Update recods********************
			$tblName : Name of table
			$arrFieldValue : Array of fields and values which values will be updated
			
			$FieldName : Field name of where condition
			$value : value of field
		*/
		function UpdateData($tblName,$arrFieldValue,$FieldName,$Fieldvalue)
		{
			
			$sql = "Update " . $tblName . " set ";
			while(list($key,$value) = each($arrFieldValue))
			{
				$sql = $sql  . $key . "=" . "'" .$value . "'"  . ", ";
			}
			$sql = substr($sql,0,strlen($sql)-2) . " where " . $FieldName . "=" . "'" . $Fieldvalue. "'";			
			//print($sql);			
			$result = $this->ExecuteQuery($sql); //Execute sql statement
			
		}
		

		//Close current connectiom
		
		function Closecon()
		{
			global $cn;
			mysql_close($cn);
		}
		

}

$objDb = new db();	  			
?>