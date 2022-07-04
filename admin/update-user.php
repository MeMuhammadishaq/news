<?php
          error_reporting(0);
          include "config.php";
          
                      $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
                      $fname =mysqli_real_escape_string($conn,$_POST['fname']);
                      $lname = mysqli_real_escape_string($conn,$_POST['lname']);
                      $user = mysqli_real_escape_string($conn,$_POST['user']);
                      $role = mysqli_real_escape_string($conn,$_POST['role']);
                      if(isset($_POST['save'])){
                     $sql= "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`username`='$user',`role`='$role' WHERE user_id =". $userid;
                     $result= $conn->query($sql);
                    header("location:users.php");
                    }





          
          $user_id = $_GET['id'];
             
          

           $res = $conn->query('SELECT * FROM `user` WHERE user_id ='.$user_id);
          
          if($res->num_rows >0){
        
            while($row = $res->fetch_assoc()){
              

?>

                  <h1> modify user details</h1>

                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'];  ?>"><br>
                          <label>First Name</label>
                          <input type="text" name="fname" value="<?php echo $row['first_name'];  ?>"placeholder="First Name" required><br>
                      
                          
                          <label>Last Name</label>
                          <input type="text" name="lname"value="<?php echo $row['last_name'];  ?>" placeholder="Last Name" required><br>
                      
                    
                          <label>User Name</label>
                          <input type="text" name="user"value="<?php echo $row['username'];  ?>"  placeholder="Username" required><br>
        
                          <label>User Role</label>
                          <select class="form-control" name="role"value="<?php echo $row['role'];  ?>" >
                          <?php
                          if($row['role']== 1){
                              echo" <option value='0'>Normal User</option>
                            <option value='1' selected>Admin</option>";
                          }else{
                               echo "<option value='0'selected>Normal User</option>
                              <option value='1'>Admin</option>";
                          }
                          
                          ?>
                              
                          </select>
                      
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <?php
                           }
                         }
                        
                        
                  ?>
      