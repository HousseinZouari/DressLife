<?php 

include '../dao/db_product.php';

$url_location='../page/formfile.php?id_product=';
	# Retrive value from form
 $prod=new Product(
 $_POST["bust_girth_name"],
 $_POST["waist_name"],
 $_POST["len_top_bot_name"],
 $_POST["arm_cir_name"]);
 
 
 $db_product = new Db_Product();
 
	# insert and retrive the id 
	$id_prod=$db_product->add_product($prod);
	#redirect with the id selected
	header('Location:'.$url_location.$id_prod);
	exit;
	
 
 ?>
 