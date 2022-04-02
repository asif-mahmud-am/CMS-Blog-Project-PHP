
    <?php
        
        if(isset($_POST['add_user']))
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
            
            
            
            $query = "INSERT INTO users(username, user_firstname, user_lastname, user_password, user_image, user_email, user_role ) ";
            $query.= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_password}', '{$user_image}', '{$user_email}', '{$user_role}' ) ";
            
            $create_user_query = mysqli_query($connection,$query);
            
            confirmQuery($create_user_query);
            
            echo "User Created: " . " " . "<a href='users.php'> View Users </a>";
            
        }
   
        ?>                    
   
    
     
      
       
        
  
   
    
     
       <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title"> First Name </label>
        <input class="form-control" type="text" name="first_name">
        
    </div>
       
    <div class="form-group">
      <label for="title"> Last Name </label>
       <input class="form-control" type="text" name="last_name">
   
    </div>
       
    <div class="form-group">
        <label for="author"> username </label>
        <input class="form-control" type="text" name="username">
        
    </div>
       
    <div class="form-group">
        <label for="status"> Password </label>
        <input class="form-control" type="text" name="password">
        
    </div>
       
    <div class="form-group">
        <label for="status"> Email </label>
        <input class="form-control" type="text" name="email">
        
    </div>
       
       
    <div class="form-group">
        <label for="image"> Insert Photo </label>
        <input class="form-control" type="file" name="image">
        
    </div>
       
       
    
       
    <div class="form-group">
        <label for="tags"> Role </label>
        <select name="user_role" id="">
         
        <option> admin </option>
        <option> subscriber </option>
           
           
       </select>
        
    </div>
       
 
    
    <input class="btn btn-primary" type="submit" name="add_user" value="Add User">

    
</form>


  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  