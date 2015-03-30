<?php
class db
{

		function Connection()
		{
			/*$cn = mysql_connect("localhost","root","");
			mysql_select_db("namrecru_jobportal");
			*/
                //$cn = mysql_connect("localhost","namrecru_demo", 'demo');
		//		mysql_select_db("namrecru_demo",$cn);
                   $cn = mysql_connect("localhost","root", '');
				mysql_select_db("cakejobportal",$cn);
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
			$this->Connection(); // Establish Connection
			$result = mysql_query($sql) or $this->handle_mysql_error($sql,mysql_error(),mysql_errno());
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

		function Update($table_name,$variable,$where_variable){
			$field_name = "";
			$field_value = "";
			$where = "";
			$sql = "Update ". $table_name ." set ";
			while(list($key,$value) = each($variable)){
				$field_name .= $key ."='". $value ."',";
			}
			while(list($key,$value) = each($where_variable)){
				$where .= $key ."='". $value ."' and ";
			}
			$field_name = substr($field_name,0,strlen($field_name)-1);
			$where = substr($where,0,strlen($where)-4);
			$sql .= $field_name." Where ".$where;
			$this->Connection();
			//print($sql);  exit;
			mysql_query($sql) or die("Do you to some internal error please contact to system administrator");
		}

		function SingleFileUpload($images,$image_upload_path){
			//print($images);
			//print($image_upload_path);
			if(isset($_FILES[$images])){
				$file_name = $_FILES[$images]['name'];

				//print(filesize($_FILES[$images]['tmp_name']));
				copy($_FILES[$images]['tmp_name'],$image_upload_path.$file_name);

				//print($image_upload_path.$file_name);
				return $file_name;
				}
		}

		function reDirect( $url ) {
		   header('location:' . $url . '');
		}	

		function Closecon()
		{
			mysql_close();
		}
}


?>