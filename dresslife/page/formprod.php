<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <title>Form Product</title>

  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <section class="details">
	
		<h1>About Product</h1>
		<br>   
		<form method="post" onsubmit="return send_data()" action="../consume_php/addprod.php" >
   
				<div class="det_article">
				  <h3>Enter Bust-girth</h3>
				  
				  <input type="text" name="bust_girth_name" id="bust_girth_id" placeholder="Measurement in cm">
				  <div class="unit" >cm</div>
				  <h3>Enter Waist</h3>
				  <input type="text" name="waist_name" id="waist_id" placeholder="Measurement in cm">
					<div class="unit" >cm</div>
				 <h3>Enter Length-top-bottom</h3>
				  <input type="text" name="len_top_bot_name"  id="len_top_bot_id"  placeholder="Measurement in cm">
					<div class="unit" >cm</div>
				   <h3>Enter Arm circumference</h3>
				  <input type="text" name="arm_cir_name" id="arm_cir_id" placeholder="Measurement in cm">
					<div class="unit" >cm</div>
				  </div>
				<br>   
			<p class="submit">
			<input type="submit" name="commit" value="Submit">
			</p>
	
		</form>
    </section>
	
  </div>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
   <script type="text/javascript" src="../js/addprod.js"></script>
   
</body>
</html>