<?php
$conn = mysqli_connect("localhost","root","","alumni") or die("connection was not established");
					//function for gettong topics
                 function getTopics(){
                 	global $conn;
                      $get_topics = "select * from topics";
                      $run_topics = mysqli_query($conn,$get_topics);
                      while($row = mysqli_fetch_array($run_topics)){
                      	$topic_id = $row['topic_id'];
                      	$topic_title = $row['topic_title'];

                      	echo"<option value = '$topic_id'> $topic_title</option>";
                      }
                  }
                  //function for inserting posts
                  function insertPost(){
                  	if (isset($_POST['sub'])) {
                  		global $conn;
                  		global $user_id;

                  		$title =addslashes($_POST['title']);
                  		$content =addslashes($_POST['content']);
                  		$topic = $_POST['topic'];
                  		$insert = "insert into posts (user_id,topic_id,post_title,post_content,post_date) values ('$user_id','$topic','$title','$content',NOW())";
                  		$run = mysqli_query($conn,$insert);
                  		if ($run) {
                  			echo "<h3> Posted to timeline,Looks great</h3>";
                  			$update = "update users set posts='yes' where user_id = '$user_id'";
                  			$run_update = mysqli_query($conn,$update);

                  		}
                  	}
                  }
                  //function for displaying posts
                  function get_posts(){

                  	global $conn;
                  	$per_page=5;
                  	if (isset($_GET['page'])) {
                  		$page = $_GET['page'];

                 	}else{
                 		$page=1;
                 	}
                 	$start_from = ($page-1) * $per_page;
                 	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
                 	$run_posts = mysqli_query($conn,$get_posts);
                 	while ($row_posts=mysqli_fetch_array($run_posts)) {
                 		$post_id = $row_posts['post_id'];
                 		$user_id = $row_posts['user_id'];
                 		$post_title = $row_posts['post_title'];
                 		$content = $row_posts['post_content'];
                 		$post_date = $row_posts['post_date'];
                 		//getting the user who has posted the thread
                 		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
                 		$run_user = mysqli_query($conn,$user);
                 		$row_user = mysqli_fetch_array($run_user);
                 		$user_name = $row_user['user_name'];
                 		$user_image = $row_user['user_image'];




                 		//now displaying all ata once
                 		echo "<div id = 'posts'>

                 		<p><img src='user/user_images/$user_image' width='50' height='50'></p>
                 		<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                 		<h3>$post_title</h3>
                 		<p>$post_date</p>
                 		<p>$content</p>
                 		<a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to this</button></a>
                 			</div><br>

                 		";

                 	}
                 	include("pagination.php");

                  }
                  function single_post(){

                  	if (isset($_GET['post_id'])) {
                  		global $conn;
                  		$get_id = $_GET['post_id'];
                  		$get_posts = "select * from posts where post_id = '$get_id' ";
                 	$run_posts = mysqli_query($conn,$get_posts);
                 	$row_posts=mysqli_fetch_array($run_posts);
                 		$post_id = $row_posts['post_id'];
                 		$user_id = $row_posts['user_id'];
                 		$post_title = $row_posts['post_title'];
                 		$content = $row_posts['post_content'];
                 		$post_date = $row_posts['post_date'];
                 		//getting the user who has posted the thread
                 		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
                 		$run_user = mysqli_query($conn,$user);
                 		$row_user = mysqli_fetch_array($run_user);
                 		$user_name = $row_user['user_name'];
                 		$user_image = $row_user['user_image'];

                 		//getting user session
                 		$user_com = $_SESSION['user_email'];
    				$get_com = "select * from users where user_email ='$user_com'";
    				$run_com = mysqli_query($conn,$get_com);
    				$row_com = mysqli_fetch_array($run_com);
    				$user_com_id = $row_com['user_id'];
    				$user_com_name = $row_com['user_name'];


                 		//now displaying all ata once
                 		echo "<div id = 'posts'>

                 		<p><img src='user/user_images/$user_image' width='50' height='50'></p>
                 		<h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
                 		<h3>$post_title</h3>
                 		<p>$post_date</p>
                 		<p>$content</p>

                 			</div>";
                 			include('comments.php');

                 			echo"
                 			<form action='' method = 'post' id='reply'>
                 			<textarea cols='50' rows='5' name='comment' placeholder='write your reply'></textarea><br>
                 			<input type = 'submit' name = 'reply' value='Reply to This'/>
                 			</form>

                 			";
                 			if (isset($_POST['reply'])) {
                 			   $comment = $_POST['comment'];
                 			   $insert = "insert into comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";
                 			   $run = mysqli_query($conn,$insert);
                 			   echo "<h2>your Reply was added</h2>";



                 			}

                  }}
                   //function for getting topics
                  function get_Cats(){

                  	global $conn;
                  	$per_page=5;
                  	if (isset($_GET['page'])) {
                  		$page = $_GET['page'];

                 	}else{
                 		$page=1;
                 	}
                 	$start_from = ($page-1) * $per_page;
                 	if ($_GET['topic']) {
                 		$topic_id = $_GET['topic'];

                 	}
                 	$get_posts = "select * from posts where topic_id='$topic_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
                 	$run_posts = mysqli_query($conn,$get_posts);
                 	while ($row_posts=mysqli_fetch_array($run_posts)) {
                 		$post_id = $row_posts['post_id'];
                 		$user_id = $row_posts['user_id'];
                 		$post_title = $row_posts['post_title'];
                 		$content = $row_posts['post_content'];
                 		$post_date = $row_posts['post_date'];
                 		//getting the user who has posted the thread
                 		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
                 		$run_user = mysqli_query($conn,$user);
                 		$row_user = mysqli_fetch_array($run_user);
                 		$user_name = $row_user['user_name'];
                 		$user_image = $row_user['user_image'];




                 		//now displaying all ata once
                 		echo "<div id = 'posts'>

                 		<p><img src='user/user_images/$user_image' width='50' height='50'></p>
                 		<h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
                 		<h3>$post_title</h3>
                 		<p>$post_date</p>
                 		<p>$content</p>
                 		<a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to this</button></a>
                 			</div><br>

                 		";

                 	}
                 	include("pagination.php");

                  }
                    //function for getting results
                  function GetResults(){

                  	global $conn;

                 	if (isset($_GET['user_query'])) {
                 		$search_term = $_GET['user_query'];

                 	}
                 	$get_posts = "select * from posts where post_title LIKE '%$search_term%' OR post_content LIKE '%$search_term%' ORDER by 1 DESC LIMIT 5";
                 	$run_posts = mysqli_query($conn,$get_posts);

                 	$count_result = mysqli_num_rows($run_posts);
                 	if ($count_result == 0) {
                 		echo "<h3 style='background:black;color:white;padding:10px;'>Sorry ,no Results found</h3>";
                 		exit();
                 	}

                 	while ($row_posts=mysqli_fetch_array($run_posts)) {
                 		$post_id = $row_posts['post_id'];
                 		$user_id = $row_posts['user_id'];
                 		$post_title = $row_posts['post_title'];
                 		$content = $row_posts['post_content'];
                 		$post_date = $row_posts['post_date'];
                 		//getting the user who has posted the thread
                 		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
                 		$run_user = mysqli_query($conn,$user);
                 		$row_user = mysqli_fetch_array($run_user);
                 		$user_name = $row_user['user_name'];
                 		$user_image = $row_user['user_image'];




                 		//now displaying all ata once
                 		echo "<div id = 'posts'>

                 		<p><img src='user/user_images/$user_image' width='50' height='50'></p>
                 		<h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
                 		<h3>$post_title</h3>
                 		<p>$post_date</p>
                 		<p>$content</p>
                 		<a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to this</button></a>
                 			</div><br>

                 		";

                 	}


                  }
                  //user posts
                   function user_posts(){

                  	global $conn;
                  	if (isset($_GET['u_id'])) {

                  		$u_id = $_GET['u_id'];
                  	}
                 	$get_posts = "select * from posts where user_id = '$u_id' ORDER by 1 DESC LIMIT 5";
                 	$run_posts = mysqli_query($conn,$get_posts);
                 	while ($row_posts=mysqli_fetch_array($run_posts)) {
                 		$post_id = $row_posts['post_id'];
                 		$user_id = $row_posts['user_id'];
                 		$post_title = $row_posts['post_title'];
                 		$content = $row_posts['post_content'];
                 		$post_date = $row_posts['post_date'];
                 		//getting the user who has posted the thread
                 		$user = "select * from users where user_id = '$user_id' AND posts='yes'";
                 		$run_user = mysqli_query($conn,$user);
                 		$row_user = mysqli_fetch_array($run_user);
                 		$user_name = $row_user['user_name'];
                 		$user_image = $row_user['user_image'];




                 		//now displaying all ata once
                 		echo "<div id = 'posts'>

                 		<p><img src='user/user_images/$user_image' width='50' height='50'></p>
                 		<h3><a href='user_profile.php?user_id=$user_id'>$user_name</a></h3>
                 		<h3>$post_title</h3>
                 		<p>$post_date</p>
                 		<p>$content</p>
                 		<a href='single.php?post_id=$post_id' style='float:right;'><button>View</button></a>
                 		<a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button></a>
                 		<a href='functions/delete_posts.php?post_id=$post_id' style='float:right;'><button>Delete</button></a>
                 			</div></br>

                 		";
                 	 include("delete_posts.php");
                 	}


                  }
                  function user_profile(){
                  	if (isset($_GET['u_id'])) {
                  		global $conn;
                  		$user_id = $_GET['u_id'];
                  		$select = "select * from users where user_id = '$user_id'";
                  		$run =mysqli_query($conn,$select);
                  		$row =mysqli_fetch_array($run);

                  		$id = $row['user_id'];
                  		$image = $row['user_image'];
                  		$name = $row['user_name'];
                  		$country=$row['user_country'];
                  		$gender =$row['user_gender'];
                  		$last_login=$row['last_login'];
                  		$register_date = $row['register_date'];
                  		if ($gender == 'Male') {
                  			$msg = "send him a message";
                  		}
                  		else{
                  			$msg = "send her a message";

                  	}
                  	echo "<div id='user_profile'>
                  	<img src='user/user_images/$image' width='150' height='150'><br>
                  	<p><strong>Name:</strong>$name</p></br>
                  	<p><strong>gender:</strong>$gender</p></br>
                  	<p><strong>Country:</strong>$country</p></br>
                  	<p><strong>Last Login:</strong>$last_login</p></br>
                  	<p><strong>Member Since:</strong>$register_date</p>
                  	<a href='messages.php?u_id=$id'><button>$msg</button></a><hr>

                  	";
                  }
                  new_members();
                  echo "</div>";

               	}
               	function new_members(){
               		global $conn;
               		//select new members
               		$user= "select * from users LIMIT 0,20";
               		$run_user = mysqli_query($conn,$user);
               		echo "<hr><h2>New Members on this site</h2></hr>";
               		while ($row_user=mysqli_fetch_array($run_user)) {
               			$user_id = $row_user['user_id'];
               			$user_name = $row_user['user_name'];
                  		$user_image = $row_user['user_image'];
                  		echo "
                  		<span>
                  		<a href = 'user_profile.php?u_id=$user_id'>
                  		<img src='user/user_images/$user_image' width='50' height='50' title='$user_name' style='float:left;'/>
                  		</a>
                  		</span>
                  		";

               		}
               	}


?>
