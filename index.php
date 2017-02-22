<?php
	
	require_once('./config.php');

	/**** CONNECTING DATABASE ****/

	/*Defining DB configuration*/
	$connection_parameters = "host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password." options=".$options;

	/*Starting DB connection*/
	$postgres_connection = pg_connect($connection_parameters);

	/****************************/

	/* Setting query to search all available tables to request */
	$query_table = pg_query($postgres_connection, "SELECT table_name FROM information_schema.tables WHERE table_schema = '" .  $schema . "'");

	/* Search all available tables to request */
	$result_table = pg_fetch_all($query_table);

	/* Validate if the table's name was defined on get parameter */
	if(isset($_GET['t'])) {

		/* Try to find if the selected table exists */
		$get_table = $_GET['t'];
		$table_consult = null;
		foreach($result_table as $table_name) {
			if ($table_name['table_name'] == $get_table){
				$table_consult = $table_name['table_name'];
				break;
			}
		}
		
		/* Validate if table name exists on schema */
		if($table_consult != null) {
			/* Table found */

			/* Generic query to be executed */
			$select_query = "select * from " . $schema . "." . $table_consult . ' ';

			/* Verify if join parameter was setted as true */
			if(isset($_GET['j']) and $_GET['j'] == true){

			/* Search all forein keys on table to be consulted */ 
			$query_foreign_key = 	"SELECT
			    						kcu.column_name, 
			   							ccu.table_name AS foreign_table_name,
			    						ccu.column_name AS foreign_column_name 
										FROM 
			    						information_schema.table_constraints AS tc 
			    					JOIN information_schema.key_column_usage AS kcu
			     						 ON tc.constraint_name = kcu.constraint_name
			    					JOIN information_schema.constraint_column_usage AS ccu
			    						ON ccu.constraint_name = tc.constraint_name
									WHERE constraint_type = 'FOREIGN KEY' AND tc.table_name='". $table_consult ."';";

			/* Consulting on database */
			$get_foreign_key_query = pg_query($postgres_connection, $query_foreign_key);

			/* Saving results on array */
			$foreign_key_array = pg_fetch_all($get_foreign_key_query);

			/* If exist some forein key on table, the inner join command will be concatenated in query script */
			if($foreign_key_array){
				foreach ($foreign_key_array as $fk) {
					$select_query = $select_query . " INNER JOIN " . $schema . "." . $fk['foreign_table_name'] . " ON " . $fk['column_name'] . " = " . $fk['foreign_column_name'];
				}
			}
		}	

			/* Get query results */
			$result_query = pg_query($postgres_connection, $select_query);

			/* Convert query result to array */
			$result_array = pg_fetch_all($result_query);

		}
		else
		{
			/* Add the error warning */
			 $result_array['erro'] = 'Tabela não encontrada.';
		}

		/* Convert result in JSON format*/
		$json_display = json_encode($result_array, JSON_UNESCAPED_UNICODE);

		/* Diplay JSON result on screen */
		echo $json_display;
	}
	else { 
		/* Table not found */
		/* Display API documentation */
	 
		require_once("documentation_api.php");

	}

?>