 <?php 
 error_reporting(0);
 include "config.php";
 $limit = 3;
 if(isset($_GET['page'])){
 $pg = $_GET['page'];
 }else{
  $pg = 1;
 }
  $set = ($pg - 1)* $limit;
  $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT.$set.','.$limit";
  $res = $conn->query($sql);
  if($res->num_rows >0){
?>
<a href="#">post</a>
<a href="#">category</a>
<a href="#">users</a>
<a href="add-user.php">Add User</a>
        <table border="1">
          <tr>
          <td>S/no</td>
            <td>Full Name</td>
            <td>User name</td>
            <td>Role</td>
            <td colspan="2">Action</td>
          
          </tr>
          <?php while($row= $res->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $row['user_id']; ?></td>
              <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php if($row['role']== 1){
               
                echo "Admin";
              }else{
                echo "Normal";
              }
              
              ?></td>
              <td><a href="update-user.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
              <td><a href="delete-user.php?id=<?php echo $row['user_id'];?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <?php } 
        $sql1 = "SELECT * FROM `user`";
        $result1 = $conn->query($sql1) or die("not connect");
        if($result1->num_rows >0){
            $total_record = $result1->num_rows;
            $total_page = ceil($total_record/$limit);
            echo"<ul>";
            for($i=1; $i<=$total_page; $i++){
              echo"<li style='float:left; list-style-type:none;'><a href='users.php?page=.$i.'style='text-decoration: none;'>.$i.</a></li> ";
            }   
            echo "</ul>";
         
        
        }
        
        
        ?>
        
        
        
          
        
          
         
        
 

