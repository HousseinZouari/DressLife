<?php

include '../dao/db_product.php';
	// get id of product
	$id =$_GET["id_product"];
	$url ='../consume_php/showprod.php?id=';
	$db_product = new Db_Product();
	// return the number of file for picture
	$nb_files=intval($db_product->number_files_product($id));
	// redirect if >2
	if ($nb_files >= 2)
	{
		header('Location:'.$url.$id);
	}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Add File</title>
  <link rel="stylesheet" href="../css/filestyle.css">
</head>
<body >
<div class="container">

    <section class="details" >
			<h1>About Files</h1>
			  <br>   
			<form id="uploadForm" enctype="multipart/form-data"  action= "addfile.php" method="post">
				<div class="det_article">
			  <h3>Import your files(*two)</h3>
				<input type="hidden"  name="id_product"  value="<?php echo $id  ?>">
				<input type="hidden"  name="numbers"  id="nb_files" value="<?php echo $nb_files  ?>">
				<input name="pic"  class="custom-file-upload"  id="pic"  type="file" />
				<br>
				 <h3>Your files</h3>
				
				<div id="files"  >		
				</div>
				 <p class="submit"><input type="button" value="Show Product" id="show_details" 
				 onclick="redirect_to_product(<?php echo $id  ?>)"  class="hidden"   />
				  <input type="button" value="Add File" id="add_files" class="btnSubmit"  /></p>
				  </div>
			</form>
</section>

</div>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
   <script type="text/javascript" src="../js/addfile.js"></script>

	
</body>
</html>