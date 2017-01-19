
<?php

header('Access-Control-Allow-Origin', '*');
include '../class/Product.php';
include '../class/File.php';
include '../utils/connection.php';


 class DB_product{
	 
	 // variable to connect to database from script connection.php
	private $conn;
	
	// method to add_details (waist,lengthtopbottom arm cir ...etc)
	function add_product($product)
	{
		$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql="INSERT INTO Product (bust_girth, waist, len_top_bot,arm_cir) VALUES 
		(:bust, :waist, :len_top_bot,:arm_cir)";
		$req = $conn->prepare($sql);
		
		$params = array
			(
				'bust'=>$product->getBust_girth(),
				'waist'=>$product->getWaist(),
				'len_top_bot'=>$product->getLen_top_bot(),
				'arm_cir'=>$product->getArm_cir()
			);
		$req->execute($params);
		$last_id=$conn->lastInsertId(); 	
		$conn=null;
		return $last_id;
	}
	
	
	// method to add files to product
	function add_files_to_product($file)
	{
		$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql="INSERT INTO File (uri,date,id_product) VALUES 
		(:uri, :date, :id_product)";
		$req = $conn->prepare($sql);
		$params = array
			(
				'uri'=>$file->getUri(),
				'date'=>$file->getDate(),
				'id_product'=>$file->getId_Product()
				
			);
		$req->execute($params);
		$last_id=$conn->lastInsertId(); 	
		$conn=null;
		return $last_id;
		
	}
	
	//method to delete file
	function del_file($id)
	{
		$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql="Delete from File where id=".$id;
		$req = $conn->prepare($sql);
		$req->execute();
		$conn=null;
		return $id;
		
	}
	
	//method return number of file for product
	function number_files_product($id_product)
	{
		$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql = "SELECT count(*) FROM `file` WHERE id_product =".$id_product; 
		$result = $conn->prepare($sql); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn(); 
		$conn=null;
		return $number_of_rows ;
	}
	
	// method to show details 
	function show_productById($id)
	{
		$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql = "SELECT * FROM `product` WHERE id =".$id; 
		$result = $conn->prepare($sql); 
		$result->execute(); 
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
				{ 
				  $Product = new Product($row['bust_girth'],
				  $row['waist'],
				  $row['len_top_bot'],
				  $row['arm_cir']);
				}

		$conn=null;
		return $Product ;
	}
	
	// method to show files per product
	function show_files_ById($id)
	{
			$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql = "SELECT * FROM `file` WHERE id_product =".$id; 
		$result = $conn->prepare($sql); 
		$result->execute(); 
		$table=array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
				{ 
			// add every file to array of file(uri)
				  array_push($table,$row['uri']);
				};

		$conn=null;
		return $table ;
	}
	//method return list of products
	function list_product()
	{
			$connection=new Connection();
		$conn=$connection->connect_to_db();
		$sql = "SELECT * FROM `product` "; 
		$result = $conn->prepare($sql); 
		$result->execute(); 
		$table=array();
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
				{ 
			// add every file to array of file(uri)
				  array_push($table,array("id"=>$row['id'],
				  "bust_girth"=>$row['bust_girth'],
				  "waist"=>$row['waist'],
				  "len_top_bot"=>$row['len_top_bot'],
				  "arm_cir"=>$row['arm_cir']));
				};

				$conn=null;
				return $table ;
				}
	
	}

?>