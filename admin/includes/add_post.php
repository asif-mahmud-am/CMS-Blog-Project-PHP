 <?php
  

                if(isset($_POST['add_post']))
                {
                    
                $post_title = $_POST['post_title'];
                $post_category_id = $_POST['post_category'];
                $post_author = $_POST['post_author'];
                $post_status = $_POST['post_status'];
            
            
                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image'] ['tmp_name'];
            
                $post_date = date('d-m-y');
                $post_tags = $_POST['post_tags'];
                $post_content = $_POST['post_content'];
                    
                move_uploaded_file($post_image_temp, "../images/$post_image");
            

                        $query = "INSERT INTO posts (post_title, post_category_id, post_author, post_status, post_image, post_date, post_tags, post_content) ";
                        $query.= "VALUES ('{$post_title}' , '$post_category_id' , '{$post_author}', '{$post_status}', '{$post_image}', now() , '{$post_tags}', '{$post_content}' ) ";
                    
                    $add_post_query = mysqli_query($connection, $query);
                    confirmQuery($add_post_query);
                    
                    $the_post_id = mysqli_insert_id($connection);
                    
                    
                    echo "<p class='bg-success'>Post Created: <a href='../post.php?p_id={$the_post_id}'> View Post </a> or <a href='posts.php'>Edit other posts </a>  </p> ";
                    
                    
                    
                }
  
  
   ?>  
  
  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title"> Post title </label>
        <input value="" class="form-control" type="text" name="post_title">
        
    </div>
       
    <div class="form-group">
      <label for="title"> Post Category </label>
       <select name="post_category" id="">
          <?php
                $query = "SELECT * FROM categories ";
                $select_categories = mysqli_query($connection,$query);
                confirmQuery($select_categories);
                
           while($row = mysqli_fetch_assoc($select_categories)) {
               
           $cat_id = $row['cat_id'];
           $cat_title = $row['cat_title'];
           
            
          echo "<option value='{$cat_id}'>{$cat_title}</option>";
               
               
               
           }
           ?>
           
           
       </select>
    </div>
       
    <div class="form-group">
        <label for="author"> Post author </label>
        <input value="" class="form-control" type="text" name="post_author">
        
    </div>
       
    <div class="form-group">
        <label for="status"> Post Status </label>
        <select name="post_status" id="">
         
        <option value="published">published</option>
        <option value="draft">draft</option>
        
       </select>
        
    </div>
       
    <div class="form-group">
        <input type="file" name="image">
    </div>
       
       
    
       
    <div class="form-group">
        <label for="tags"> Post tags </label>
        <input value="" class="form-control" type="text" name="post_tags">
        
    </div>
       
    
    <div class="form-group">
        <label for="content"> Post content </label>
        <textarea class="form-control" name="post_content">
            
        </textarea>
        
    </div>
     
    <div class="form-group">
        <label for="content"> Post Date </label>
        <input value="" class="form-control" type="date" name="post_date">
        
    </div>
 
    
    <input class="btn btn-primary" type="submit" name="add_post" value="add post">

    
</form>
