<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='dresslife_task';

	define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'dresslife_task');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    class Connection{
		
			function connect_to_db(){
				
				
								try {
										$db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
										$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										return $db;
								}
									catch(PDOException $e)
								{
										echo $e->getMessage();
										return null;
								}
								
										return null;
									
									}
				
				
				}
?> 