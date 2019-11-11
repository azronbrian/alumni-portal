<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="jquery.fancybox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background: #ccc;
		}
		main{
			width: 80%;
			margin:0px auto;
		}
		.thumnails{
			width: 30%;
      float: left;
			margin: 0 auto;
      background: #fff;
      padding: 20px;
      box-sizing: border-box;
		}
		.thumnails img{
			width: 100%;
			height:auto;
		}
		h1 h2{
			text-align: center;
		}
		.album{
			display: block;
  		margin-left: auto;
  		margin-right: auto;
  		width: 80%;
		}
	</style>
</head>
<body>
	<h1 style="text-align:center; font-family: 'Montserrat', sans-serif; font-weight: 370;">Alumni Association's Gallery</h1>
	<div class="album">
		<?php
	    $dir = glob('images/gallery/{*.jpg,*.png}',GLOB_BRACE);
	    foreach ($dir as $value) {
	  ?>
	  <div class="thumnails">
	  	<a href="<?php echo $value;?>" data-fancybox="images" data-caption="<?php echo $value; ?>">
		 	<img src="<?php echo $value;?>" alt="<?php echo $value; ?>">
	    </a>
	  </div>
	  <?php
	    }
		?>
	</div>
</body>
</html>
