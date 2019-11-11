<?php
  session_start();
  include("includes/connection.php");
  include("functions/functions.php");
  if (!isset($_SESSION['user_email'])) {
  	header("location: index.php");
  }
  else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome user!</title>
	<link rel="stylesheet" type="text/css" href="styles/home_style.css" media="all">
    <style>
        input[type='file']{
            width: 180px;

        }
    </style>
</head>
<body>
	<!-- container starts-->
    <div class="container">
    	<!-- head wrapper starts-->
    	<div id="head_wrap">
    		<!-- header  starts-->
    		<div id="header">
    			<ul id="menu">
    				<li><a href=" home.php">Home</a></li>
    				<li><a href=" members.php">Members</a></li>
    				<strong>Topics</strong>
    				<?php
                      $get_topics = "select * from topics";
                      $run_topics = mysqli_query($conn,$get_topics);
                      while($row = mysqli_fetch_array($run_topics)){
                      	$topic_id = $row['topic_id'];
                      	$topic_title = $row['topic_title'];

                      	echo"<li><a href='topic.php?topic=$topic_id'>$topic_title</a></li>";
                      }
    				?>

    			</ul>
    			<!--serch engine starts-->
    			<form method="get" action="results.php" id="form1">
    				<input type="text" name="user_query" placeholder="search a topic">
    				<input type="submit" name="search" value="search">

    			</form>
    			<!--serch engine ends -->
    			
    		</div>
    		<!-- head ends-->
    	</div>
    	<!-- head wrapper ends-->
    		<!--content area starts -->
    	<div class="content">
    		<!-- user timeline starts-->
    		<div id = "user_timeline">
    			<div id="user_details">
    				<?php
    				$user = $_SESSION['user_email'];
    				$get_user = "select * from users where user_email ='$user'";
    				$run_user = mysqli_query($conn,$get_user);
    				$row = mysqli_fetch_array($run_user);
    				$user_id = $row['user_id'];
    				$user_name = $row['user_name'];
                    $user_pass = $row['user_pass'];
    				$user_email = $row['user_email'];
    				$user_country = $row['user_country'];
                    $user_gender = $row['user_gender'];
    				$user_image = $row['user_image'];
                    $user_reg = $row['user_reg'];
    				$register_date = $row['register_date'];
    				$last_login = $row['last_login'];
                    $user_address = $row['user_address'];

    				echo " 
    				       <center> <img src='user/user_images/$user_image' width = '150' height = '150'/></center>
    				        <div id='user_mention'>
    				       <p><strong>Name:</strong> $user_name</p>
    				       <p><strong>Country:</strong> $user_country</p>
    				       <p><strong>Email:</strong> $user_email</p>
    				       <p><strong>Login:</strong> $last_login</p>
    				       <p><strong>Member since:</strong> $register_date</p>
    				       <p><a href='my_messages.php?u_id=$user_id'>Messages</a></p>
    				       <p><a href='my_posts.php?u_id=$user_id'>My Posts</a></p>
    				       <p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>

    				       <form action='logout.php' method='POST'>
						<button type='submit' name='submit' >Logout</button>
					</form>
    				       </div>

    				";

    				?>
    				
    			</div>
    			
    		</div>
    		<!--user timeline ends -->
    		<!--content timeline starts -->
    		<div id="content_timeline">
    			
                    
                     <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
                <table >
                    <tr align="center">
                        <td colspan="6">
                            <h2>Edit Your Profile</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Name</td>
                        <td><input type="text" name="u_name" value="<?php echo $user_name;?>" required="required"></td>
                    </tr>
                     <tr>
                        <td align="right">Email</td>
                        <td><input type="email" name="u_email"  value="<?php echo $user_email;?>" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td><input type="password" name="u_pass"  value="<?php echo $user_pass;?>" required="required"></td>
                    </tr>   
                    <tr>
                        <td align="right">Country</td>
                        <td>
                        <select name="u_country" >
                     <option><?php echo $user_country;?></option>
                    <option value="AFG">Afghanistan</option>
                    <option value="ALA">Åland Islands</option>
                    <option value="ALB">Albania</option>
                    <option value="DZA">Algeria</option>
                    <option value="ASM">American Samoa</option>
                    <option value="AND">Andorra</option>
                    <option value="AGO">Angola</option>
                    <option value="AIA">Anguilla</option>
                    <option value="ATA">Antarctica</option>
                    <option value="ATG">Antigua and Barbuda</option>
                    <option value="ARG">Argentina</option>
                    <option value="ARM">Armenia</option>
                    <option value="ABW">Aruba</option>
                    <option value="AUS">Australia</option>
                    <option>Austria</option>
                    <option value="AZE">Azerbaijan</option>
                    <option value="BHS">Bahamas</option>
                    <option value="BHR">Bahrain</option>
                    <option value="BGD">Bangladesh</option>
                    <option value="BRB">Barbados</option>
                    <option value="BLR">Belarus</option>
                    <option value="BEL">Belgium</option>
                    <option value="BLZ">Belize</option>
                    <option value="BEN">Benin</option>
                    <option value="BMU">Bermuda</option>
                    <option value="BTN">Bhutan</option>
                    <option value="BOL">Bolivia, Plurinational State of</option>
                    <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BIH">Bosnia and Herzegovina</option>
                    <option value="BWA">Botswana</option>
                    <option value="BVT">Bouvet Island</option>
                    <option value="BRA">Brazil</option>
                    <option value="IOT">British Indian Ocean Territory</option>
                    <option value="BRN">Brunei Darussalam</option>
                    <option value="BGR">Bulgaria</option>
                    <option value="BFA">Burkina Faso</option>
                    <option value="BDI">Burundi</option>
                    <option value="KHM">Cambodia</option>
                    <option value="CMR">Cameroon</option>
                    <option value="CAN">Canada</option>
                    <option value="CPV">Cape Verde</option>
                    <option value="CYM">Cayman Islands</option>
                    <option value="CAF">Central African Republic</option>
                    <option value="TCD">Chad</option>
                    <option value="CHL">Chile</option>
                    <option value="CHN">China</option>
                    <option value="CXR">Christmas Island</option>
                    <option value="CCK">Cocos (Keeling) Islands</option>
                    <option value="COL">Colombia</option>
                    <option value="COM">Comoros</option>
                    <option value="COG">Congo</option>
                    <option value="COD">Congo, the Democratic Republic of the</option>
                    <option value="COK">Cook Islands</option>
                    <option value="CRI">Costa Rica</option>
                    <option value="CIV">Côte d'Ivoire</option>
                    <option value="HRV">Croatia</option>
                    <option value="CUB">Cuba</option>
                    <option value="CUW">Curaçao</option>
                    <option value="CYP">Cyprus</option>
                    <option value="CZE">Czech Republic</option>
                    <option value="DNK">Denmark</option>
                    <option value="DJI">Djibouti</option>
                    <option value="DMA">Dominica</option>
                    <option value="DOM">Dominican Republic</option>
                    <option value="ECU">Ecuador</option>
                    <option value="EGY">Egypt</option>
                    <option value="SLV">El Salvador</option>
                    <option value="GNQ">Equatorial Guinea</option>
                    <option value="ERI">Eritrea</option>
                    <option value="EST">Estonia</option>
                    <option value="ETH">Ethiopia</option>
                    <option value="FLK">Falkland Islands (Malvinas)</option>
                    <option value="FRO">Faroe Islands</option>
                    <option value="FJI">Fiji</option>
                    <option value="FIN">Finland</option>
                    <option value="FRA">France</option>
                    <option value="GUF">French Guiana</option>
                    <option value="PYF">French Polynesia</option>
                    <option value="ATF">French Southern Territories</option>
                    <option value="GAB">Gabon</option>
                    <option value="GMB">Gambia</option>
                    <option value="GEO">Georgia</option>
                    <option value="DEU">Germany</option>
                    <option value="GHA">Ghana</option>
                    <option value="GIB">Gibraltar</option>
                    <option value="GRC">Greece</option>
                    <option value="GRL">Greenland</option>
                    <option value="GRD">Grenada</option>
                    <option value="GLP">Guadeloupe</option>
                    <option value="GUM">Guam</option>
                    <option value="GTM">Guatemala</option>
                    <option value="GGY">Guernsey</option>
                    <option value="GIN">Guinea</option>
                    <option value="GNB">Guinea-Bissau</option>
                    <option value="GUY">Guyana</option>
                    <option value="HTI">Haiti</option>
                    <option value="HMD">Heard Island and McDonald Islands</option>
                    <option value="VAT">Holy See (Vatican City State)</option>
                    <option value="HND">Honduras</option>
                    <option value="HKG">Hong Kong</option>
                    <option value="HUN">Hungary</option>
                    <option value="ISL">Iceland</option>
                    <option value="IND">India</option>
                    <option value="IDN">Indonesia</option>
                    <option value="IRN">Iran, Islamic Republic of</option>
                    <option value="IRQ">Iraq</option>
                    <option value="IRL">Ireland</option>
                    <option value="IMN">Isle of Man</option>
                    <option value="ISR">Israel</option>
                    <option value="ITA">Italy</option>
                    <option value="JAM">Jamaica</option>
                    <option value="JPN">Japan</option>
                    <option value="JEY">Jersey</option>
                    <option value="JOR">Jordan</option>
                    <option value="KAZ">Kazakhstan</option>
                    <option value="KEN">Kenya</option>
                    <option value="KIR">Kiribati</option>
                    <option value="PRK">Korea, Democratic People's Republic of</option>
                    <option value="KOR">Korea, Republic of</option>
                    <option value="KWT">Kuwait</option>
                    <option value="KGZ">Kyrgyzstan</option>
                    <option value="LAO">Lao People's Democratic Republic</option>
                    <option value="LVA">Latvia</option>
                    <option value="LBN">Lebanon</option>
                    <option value="LSO">Lesotho</option>
                    <option value="LBR">Liberia</option>
                    <option value="LBY">Libya</option>
                    <option value="LIE">Liechtenstein</option>
                    <option value="LTU">Lithuania</option>
                    <option value="LUX">Luxembourg</option>
                    <option value="MAC">Macao</option>
                    <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                    <option value="MDG">Madagascar</option>
                    <option value="MWI">Malawi</option>
                    <option value="MYS">Malaysia</option>
                    <option value="MDV">Maldives</option>
                    <option value="MLI">Mali</option>
                    <option value="MLT">Malta</option>
                    <option value="MHL">Marshall Islands</option>
                    <option value="MTQ">Martinique</option>
                    <option value="MRT">Mauritania</option>
                    <option value="MUS">Mauritius</option>
                    <option value="MYT">Mayotte</option>
                    <option value="MEX">Mexico</option>
                    <option value="FSM">Micronesia, Federated States of</option>
                    <option value="MDA">Moldova, Republic of</option>
                    <option value="MCO">Monaco</option>
                    <option value="MNG">Mongolia</option>
                    <option value="MNE">Montenegro</option>
                    <option value="MSR">Montserrat</option>
                    <option value="MAR">Morocco</option>
                    <option value="MOZ">Mozambique</option>
                    <option value="MMR">Myanmar</option>
                    <option value="NAM">Namibia</option>
                    <option value="NRU">Nauru</option>
                    <option value="NPL">Nepal</option>
                    <option value="NLD">Netherlands</option>
                    <option value="NCL">New Caledonia</option>
                    <option value="NZL">New Zealand</option>
                    <option value="NIC">Nicaragua</option>
                    <option value="NER">Niger</option>
                    <option value="NGA">Nigeria</option>
                    <option value="NIU">Niue</option>
                    <option value="NFK">Norfolk Island</option>
                    <option value="MNP">Northern Mariana Islands</option>
                    <option value="NOR">Norway</option>
                    <option value="OMN">Oman</option>
                    <option value="PAK">Pakistan</option>
                    <option value="PLW">Palau</option>
                    <option value="PSE">Palestinian Territory, Occupied</option>
                    <option value="PAN">Panama</option>
                    <option value="PNG">Papua New Guinea</option>
                    <option value="PRY">Paraguay</option>
                    <option value="PER">Peru</option>
                    <option value="PHL">Philippines</option>
                    <option value="PCN">Pitcairn</option>
                    <option value="POL">Poland</option>
                    <option value="PRT">Portugal</option>
                    <option value="PRI">Puerto Rico</option>
                    <option value="QAT">Qatar</option>
                    <option value="REU">Réunion</option>
                    <option value="ROU">Romania</option>
                    <option value="RUS">Russian Federation</option>
                    <option value="RWA">Rwanda</option>
                    <option value="BLM">Saint Barthélemy</option>
                    <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                    <option value="KNA">Saint Kitts and Nevis</option>
                    <option value="LCA">Saint Lucia</option>
                    <option value="MAF">Saint Martin (French part)</option>
                    <option value="SPM">Saint Pierre and Miquelon</option>
                    <option value="VCT">Saint Vincent and the Grenadines</option>
                    <option value="WSM">Samoa</option>
                    <option value="SMR">San Marino</option>
                    <option value="STP">Sao Tome and Principe</option>
                    <option value="SAU">Saudi Arabia</option>
                    <option value="SEN">Senegal</option>
                    <option value="SRB">Serbia</option>
                    <option value="SYC">Seychelles</option>
                    <option value="SLE">Sierra Leone</option>
                    <option value="SGP">Singapore</option>
                    <option value="SXM">Sint Maarten (Dutch part)</option>
                    <option value="SVK">Slovakia</option>
                    <option value="SVN">Slovenia</option>
                    <option value="SLB">Solomon Islands</option>
                    <option value="SOM">Somalia</option>
                    <option value="ZAF">South Africa</option>
                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                    <option value="SSD">South Sudan</option>
                    <option value="ESP">Spain</option>
                    <option value="LKA">Sri Lanka</option>
                    <option value="SDN">Sudan</option>
                    <option value="SUR">Suriname</option>
                    <option value="SJM">Svalbard and Jan Mayen</option>
                    <option value="SWZ">Swaziland</option>
                    <option value="SWE">Sweden</option>
                    <option value="CHE">Switzerland</option>
                    <option value="SYR">Syrian Arab Republic</option>
                    <option value="TWN">Taiwan, Province of China</option>
                    <option value="TJK">Tajikistan</option>
                    <option value="TZA">Tanzania, United Republic of</option>
                    <option value="THA">Thailand</option>
                    <option value="TLS">Timor-Leste</option>
                    <option value="TGO">Togo</option>
                    <option value="TKL">Tokelau</option>
                    <option value="TON">Tonga</option>
                    <option value="TTO">Trinidad and Tobago</option>
                    <option value="TUN">Tunisia</option>
                    <option value="TUR">Turkey</option>
                    <option value="TKM">Turkmenistan</option>
                    <option value="TCA">Turks and Caicos Islands</option>
                    <option value="TUV">Tuvalu</option>
                    <option value="UGA">Uganda</option>
                    <option value="UKR">Ukraine</option>
                    <option value="ARE">United Arab Emirates</option>
                    <option value="GBR">United Kingdom</option>
                    <option value="USA">United States</option>
                    <option value="UMI">United States Minor Outlying Islands</option>
                    <option value="URY">Uruguay</option>
                    <option value="UZB">Uzbekistan</option>
                    <option value="VUT">Vanuatu</option>
                    <option value="VEN">Venezuela, Bolivarian Republic of</option>
                    <option value="VNM">Viet Nam</option>
                    <option value="VGB">Virgin Islands, British</option>
                    <option value="VIR">Virgin Islands, U.S.</option>
                    <option value="WLF">Wallis and Futuna</option>
                    <option value="ESH">Western Sahara</option>
                    <option value="YEM">Yemen</option>
                    <option value="ZMB">Zambia</option>
                    <option value="ZWE">Zimbabwe</option>
                        </select>
                        </td>
                        
                    </tr>  
                    <tr>
                        <td align="right">Gender</td>
                        <td>
                        <select name="u_gender" disabled="disabled">
                            <option><?php echo $user_gender;?></option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                            
                        </select>
                        </td>
                        
                    </tr>  

                    <tr>
                        <td align="right">Address</td>
                        <td>
                            <input type="text" name="u_address" value="<?php echo $user_address;?>" required="required">
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="right" required="required">Registration Number</td>
                        <td><input type="text" name="u_reg"  value="<?php echo $user_reg;?>" disabled="disabled"></td>
                    </tr> 
                     <tr>
                        <td align="right" >Photo</td>
                        <td>
                            <input type="file" name="u_image" required="required" >
                        </td>


                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" name="update" value="Update">
                        </td>
                    </tr>    

                    
                </table>
                
            </form>
            <?php
              if (isset($_POST['update'])) {
                $u_name = $_POST['u_name'];
                $u_country = $_POST['u_country'];
                $u_address = $_POST['u_address'];
                $u_pass = $_POST['u_pass'];
                $u_email = $_POST['u_email'];
                 $u_image = $_FILES['u_image']['name'];
                 $image_tmp = $_FILES['u_image']['tmp_name'];
                 
                  move_uploaded_file($image_tmp, "user/user_images/$u_image");

                  $update = "update users set user_name = '$u_name',user_country = '$u_country',user_pass='$u_pass', user_address='$u_address',user_image = '$u_image' where user_id = '$user_id' ";
                  $run = mysqli_query($conn,$update);
                  if ($run) {
                      echo "<script>alert('Your Profile Updated Successfully')</script>";
                      echo "<script>window.open('home.php','_self')</script>";

                  }
              }

            ?>
                
    				
    			
    		</div>
    		<!--content timeline ends -->
    		
    	</div>
    	<!--content area ends -->
    </div>
    <!-- container ends-->	

</body>
</html>
<?php } ?>