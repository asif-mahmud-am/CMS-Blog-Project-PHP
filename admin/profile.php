<?php include "includes/admin_header.php"; ?>

<?php  

  if(isset($_SESSION['username']))
  {
      $username = $_SESSION['username'];
  }
      


      $query = "SELECT * FROM users WHERE username = $username ";
      $select_from_user_query = mysqli_query($connection,$query);
      
      while($row = mysqli_fetch_array($select_from_user_query))
      {
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
          
          
      }
 


?>

<?php

if(isset($_POST['update_user']))
        {
            
            $user_firstname = $_POST['first_name'];
            $user_lastname = $_POST['last_name'];
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $user_email = $_POST['email'];
            
            
            $user_image = $_FILES['image']['name'];
            $user_image_temp = $_FILES['image'] ['tmp_name'];
            $user_role = $_POST['user_role'];
            //$user_status = "unapproved";
            
            
            
            move_uploaded_file($user_image_temp, "../images/$user_image");
            
             if(empty($user_image))
                    {
                        
                        $query = "SELECT * FROM users WHERE username= '{$username}' ";
                        $select_user_image = mysqli_query($connection,$query);
                        
                        while($row = mysqli_fetch_assoc($select_user_image))
                        {
                            $user_image = $row['user_image'];
                        }
                        
                    }
          
           
            
            
                        $query = "UPDATE users SET ";
                        $query.="user_firstname = '{$user_firstname}', ";
                        $query.="user_lastname = '{$user_lastname}', ";
                        $query.="username = '{$username}', ";
                        $query.="user_password = '{$user_password}', ";
                        $query.="user_email = '{$user_email}', ";
                        $query.="user_image = '{$user_image}', ";
                        $query.="user_role = '{$user_role}' ";
                        $query.="WHERE username= '{$username}' ";

                    
                    $update_user_query = mysqli_query($connection, $query);
                    confirmQuery($update_user_query);
            
        }
   








?>

 
        
        <div id="wrapper">
       

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "includes/admin_sidebar.php"; ?>
            
   
            
            <!-- /.navbar-collapse -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Posts hello</small>
                        </h1>
       
    
    
    
    
    
    <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title"> First Name </label>
        <input value="<?php echo $user_firstname; ?>" class="form-control" type="text" name="first_name">
        
    </div>
       
    <div class="form-group">
      <label for="title"> Last Name </label>
       <input value="<?php echo $user_lastname; ?>" class="form-control" type="text" name="last_name">
   
    </div>
       
    <div class="form-group">
        <label for="author"> username </label>
        <input value="<?php echo $username; ?>" class="form-control" type="text" name="username">
        
    </div>
       
    <div class="form-group">
        <label for="status"> Password </label>
        <input value="<?php echo $user_password; ?>" class="form-control" type="text" name="password">
        
    </div>
       
    <div class="form-group">
        <label for="status"> Email </label>
        <input value="<?php echo $user_email; ?>" class="form-control" type="text" name="email">
        
    </div>
       
       
    <div class="form-group">
        <img width=100 src="../images/<?php echo $user_image; ?>" alt="image" >
        <input type="file" name="image">
    </div>
       
       
    
       
    <div class="form-group">
        <label for="tags"> Role </label>
        <select name="user_role" id="">
         
        <option value="subscriber"> <?php echo $user_role;  ?></option>
        <?php
        if($user_role == 'admin')
        {
            echo "<option value='subscriber'> subscriber </option>";
        }
        else
        {
            echo "<option value='admin'> admin </option>";
        }
            
            
            
            ?>
        
       </select>
        
    </div>
       
 
    
    <input class="btn btn-primary" type="submit" name="update_user" value="Update profile">

    
</form>
                       
                       
                       
                       
                       
                       
                       
                       
                        
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>
