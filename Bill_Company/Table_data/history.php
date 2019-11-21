<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>

<?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "password";
   $dbName = "bill_format";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM bill_data";
	$query = mysqli_query($conn,$sql);

	$num_rows = mysqli_num_rows($query);

	$per_page = 20;   // Per Page
	$page  = 1;
	
	if(isset($_GET["Page"]))
	{
		$page = $_GET["Page"];
	}

	$prev_page = $page-1;
	$next_page = $page+1;

	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{
		$num_pages =1;
	}
	else if(($num_rows % $per_page)==0)
	{
		$num_pages =($num_rows/$per_page) ;
	}
	else
	{
		$num_pages =($num_rows/$per_page)+1;
		$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{
		$row_end = $num_rows;
	}


	$sql .= " ORDER BY id ASC LIMIT $row_start ,$row_end ";
	$query = mysqli_query($conn,$sql);

?>


<h2>History</h2>

<table>
  <tr>
    <th width="91"> <div align="center">ลำดับ </div></th>
    <th width="98"> <div align="center">วันที่ / เวลา </div></th>
    <th width="198"> <div align="center">หน่วยงาน</div></th>
    <th width="97"> <div align="center">สถานะ </div></th>
    <th width="59"> <div align="center">เครื่องมือ </div></th>

    
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["id"];?></div></td>
    <td><?php echo $result["created_at"];?></td>
    <td><?php echo $result["username"];?></td>
    <td><div align="center"><?php echo $result["process"];?></div></td>
    <td></td>
  
  </tr>
<?php
}
?>
</table>
<br>
Total <?php echo $num_rows;?> Record : <?php echo $num_pages;?> Page :
<?php
if($prev_page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page'><< Back</a> ";
}

for($i=1; $i<=$num_pages; $i++){
	if($i != $page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($page!=$num_pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page'>Next>></a> ";
}
$conn = null;
?>

</body>

</html> 