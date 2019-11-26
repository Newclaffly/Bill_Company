<?php
	session_start();
	error_reporting(0);
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bill_format";

	$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$strSQL = "SELECT * FROM bill_data WHERE Username = '".mysqli_real_escape_string($objCon,$_POST['txtusername'])."' 
	and Password = '".mysqli_real_escape_string($objCon,$_POST['txtpassword'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["permis"] = $objResult["permis"];
			// echo '<pre>';
			// print_r($_SESSION);
			// echo '</pre>';

			session_write_close();
			
			if($objResult["permis"] == "Admin")
			{
				header("location:../Table_data/history_member.php");
			}
			else
			{
				header("location:../Table_data/history.php");
			}
	}
	mysqli_close($objCon);
?>
