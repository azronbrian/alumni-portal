
<?php
         $get_id = $_GET['post_id'];
         $get_com = "select * from comments where post_id = '$get_id' order by 1 DESC ";
          $run_com = mysqli_query($conn,$get_com);
          while ($row = mysqli_fetch_array($run_com)) {
          	 $com = $row['comment'];
          	 $com_name = $row['comment_author'];
          	 $date = $row['date'];

          	 echo "
          	 <div id ='comments'>
          	 <h3>$com_name</h3><span><i>said</i> on $date</span>
          	 <p>$com</p>
          	 </div>

          	 ";
          }
          //echo "<script> window.open('single.php?post_id=$get_id','self') </script>";
 ?>         