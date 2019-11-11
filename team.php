<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<style>
	    body{
			margin: 10px 25px;
			padding: 0;
			background: #F8F9F9;
		}
		.nav{
			width: 100%;
			background-color: #F8F9F9  ;
			height: 100%;
			display: flex;
			flex-direction: row;

		}
		.admin{
			text-align: center;
			padding-top: 10px;
			width: 25%;
			background-color: #F8F9F9  ;

		}
		.student{
			float: right;
			text-align: center;
			padding-top: 10px;
			width: 75%;
			background-color: #F8F9F9  ;
			display: flex;
			flex-direction: row;
		}
		.bottom{
			width: 50%;
		}
		.top{
			width: 50%;
		}
		.title {
			color: grey;
		}
		img{
			width:150px;
			height: 150px;
			border-radius: 50%;

		}
		@media  (max-width:940px){
			img{
			width:100px;
			height: 100px;
			border-radius: 50%;

		}
		h2{
			font-size: 11px;
		}
		h3{
			font-size: 11px;
		}
		}
		@media  (max-width:630px){
			img{
				width:70px;
				height: 70px;
				border-radius: 50%;
			}
			h2{
				font-size: 7px;
			}
			h3{
				font-size: 7px;
			}
		}
	</style>
	</head>
	<body>
		<h2 style="text-align:center; font-family: 'Montserrat', sans-serif; font-weight: 370;">MEET PROJECT TEAM</h2>
		<div class="nav">
			<div class="admin">
		 		<img src="images/Thyagarajan.jpg" alt="Thyagarajan" >
		 		<h2>K.Thyagarajan</h2>
				<h3 class="title">Alumni Coordinator</h3>
		 		<p>Associate Professor</p>
		 		<p>Assistant HoD CSE SVCET </p>
		 		<p>kthyagarajan21@gmail.com</p>
		 		<p>Mobile +91 9985187289</p>
		 	</div>
		 	<div class="student">
		 		<div class="top">
		 			<img src="images/karthik.jpg" alt="Karthik">
		 			<h2>P.Karthik Reddy </h2>
		 			<h3 class="title">Lead Dev Team </h3>
		 			<p>kr21101997@gmail.com</p>
		 			<img src="images/praveen.jpg" alt="Praveen">
		 			<h2>P.Praveen Kumar Reddy</h2>
		 			<h3 class="title">Dev Team Member</h3>
		 			<p>poli.praveen95@gmail.com</p>
		 		</div>
		 		<div class="bottom">
		 			<img src="images/brian.jpg" alt="Azron">
		 			<h2>Azron Brian</h2>
		 			<h3 class="title">Dev Team Member</h3>
		 			<p>azroneo@gmail.com</p>
		 			<img src="images/sumathi.jpg" alt="Sumathi">
		 			<h2>K.Sumathi</h2>
		 			<h3 class="title">Dev Team Member</h3>
					<p>sumathikora123@gmail.com</p>
		 		</div>
		 	</div>
		</div>
	</body>
</html>
