<?php
include '../dao/db_product.php';

$db_product = new Db_Product();
#return products
$products=$db_product->list_product();
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>List Product</title>
    <link rel="stylesheet" href="../css/detailsstyle.css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="../css/simplePagination.css">
		
</head>

<body>
  <div class="container">
    <section class="details">
      <h1>List Product</h1>
	  <br>   
			<div class="det_article">
					<table id="keywords" border="1 ">
						<tr>
						<th><span>id</span></th>
						<th><span>Waist</span></th>
						<th><span>Bust Girth</span></th>
						<th><span>Length Top Bottom</span></th>
						<th><span>Arm Circumference</span></th>
						</tr>
						<?php 
						# display list of products
						foreach ($products as $product)
						{echo '<tr class="rows">';
						echo '<td><a href ="showprod.php?id='.$product['id'].'">'.$product['id'].'</a></td>';
						echo '<td>'.$product['waist'].' cm</td>';
						echo '<td>'.$product['bust_girth'].' cm </td>';
						echo '<td>'.$product['len_top_bot'].' cm</td>';
						echo '<td>'.$product['arm_cir'].' cm</td>';
						echo '</tr>';
						}
						?>
						</table>
						   <div id="pag">
						   </div>
			</div>
							 <p class="submit">
								<input type="button" value="Add Product" class="btnSubmit" onclick="redirect_to()"  />
							</p>
    </section>
  </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.simplePagination.js"></script>
	<script type="text/javascript" src="../js/tableprod.js"></script>

</body>
</html>