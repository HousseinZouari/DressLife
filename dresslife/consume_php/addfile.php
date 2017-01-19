<?php
	include '../dao/db_product.php';	

		#uploads directory
		$upload_dir = '../upload/';
		$prod_id=$_POST['id_product'];
		$db_product = new Db_Product();
		#verify if files are <2
		$nb_files=intval($db_product->number_files_product($prod_id));
	if ($nb_files<2)
	{
			#test if there is error in file or file is empty
			if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 )
				{
	
							#move the file
							if(move_uploaded_file($_FILES['pic']['tmp_name'],$upload_dir.$_FILES['pic']['name']))
							{
													$file = new File($_FILES['pic']['name'],$prod_id);

														$db_product = new Db_Product();
														#insert
														$last_id=$db_product->add_files_to_product($file);
															++$nb_files;
														# return a json 
														echo json_encode(array('state'=>true,
														'nb_files'=>$nb_files,
														'uri'=>$file->getUri(),
														'id'=>$last_id));
														exit;

							}else {
								# return if error
								echo json_encode(array('state'=>false));
								exit;
							}
		}else {
								# return if error
								echo json_encode(array('state'=>false));
								exit;
		}
	}else {
		# return if error
		echo json_encode(array('state'=>false));
		exit;
	}	
?>