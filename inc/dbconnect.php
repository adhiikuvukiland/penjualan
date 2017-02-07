<?php
	$db_server="localhost";
	$port= '5432';
	$db_user="dashboard";
	$db_pwd="dashboardteam"; 
	$db_name="dashboard"; 	
	//$conn=pg_connect("host=localhost port=5432 dbname=postgres user=royen password=royen");
	//$link_db=pg_connect($db_server $port $db_name $db_user $db_pwd); 
 	
        $link_db=pg_connect("host=localhost port=5432 dbname=$db_name user=$db_user password=$db_pwd");
 
  	if (!($link_db)) 
	{
	
		die("There's an error connecting to pg_sql server!.");
	}
        else
        {
            // echo "berhasil !! ";	
         }
?>
