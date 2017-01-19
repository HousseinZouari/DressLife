<?php
include '../dao/db_product.php';

$id =$_GET["id"];
$db_product = new Db_Product();
$product=$db_product->show_productById($id);
$files=$db_product->show_files_ById($id);

// if there is space character replace by %20
function replace_to_utf($string){
	return str_replace(' ','%20',$string);
}
// return the realpath
function return_path(){
$realpath    = str_replace('\\', '/', dirname(__FILE__));
return substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", -5).'/upload/';
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Registration Form</title>
    <link rel="stylesheet" href="../css/detailsstyle.css">
</head>

<body>
  <div class="container">
    <section class="details">
	 <p class="submit">
		  <input type="button" value="Show Products" class="btnSubmit" onclick="redirect_to()"  /></p>
      <h1>About Product</h1>
	  <br>   
      <form method="post" onsubmit="return send_data()" action="addprod.php" >
   
	<div class="det_article">
	  <h3>Enter Bust-girth</h3>
	  
      <input type="text" name="bust_girth_name" id="bust_girth_id" value="<?php echo $product->getBust_girth() ?>" disabled placeholder="Measurement in cm">
	  <div class="unit" >cm</div>
	  <h3>Enter Waist</h3>
      <input type="text" name="waist_name" id="waist_id" value="<?php echo $product->getWaist()?>" disabled >
        <div class="unit" >cm</div>
	 <h3>Enter Length-top-bottom</h3>
      <input type="text" name="len_top_bot_name"  id="len_top_bot_id"  value="<?php echo $product->getLen_top_bot()?>"  disabled placeholder="Measurement in cm">
	    <div class="unit" >cm</div>
	   <h3>Enter Arm circumference</h3>
      <input type="text" name="arm_cir_name" id="arm_cir_id"  value="<?php echo $product->getArm_cir()?>" disabled placeholder="Measurement in cm">
	    <div class="unit" >cm</div>
		  <h3>Your files</h3>
			<div id="files"  >
		<?php 
		foreach ($files as $file)
		{echo '<a style="overflow:hidden;"href='.return_path().replace_to_utf($file).'>'.$file.'</a><br>';}
		?>
		</div>
			
      </div>
	<br>   
	

      </form>
    </section>
  </div>	
	<script type="text/javascript" src="../js/jquery.min.js"></script>
   <script type="text/javascript" src="../js/showprod.js"></script>
</body>
</html>