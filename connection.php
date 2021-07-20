  
<?php
	$dbhost='localhost';
	$dbusr='root';
	$dbpass='';
	$dbname='customers';
	$tablename='customers';
	$columnname='cname';'currentbalance';
	$con=new mysqli($dbhost,$dbusr,$dbpass,$dbname)or die("Connection Failed..:" .mysqli_connect_error());?>