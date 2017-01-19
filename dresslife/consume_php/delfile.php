<?php

include '../dao/db_product.php';

	#Retrive id of the file
	 $id =$_GET["id"];
	 $db_product = new Db_Product();
	 #remove with id
	$id_prod=$db_product->del_file($id);
	# return json
	echo json_encode(array('state'=>true));
	exit;
	
 
 ?>