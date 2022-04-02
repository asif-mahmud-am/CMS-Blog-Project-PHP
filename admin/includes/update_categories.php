                        <form action="" method="post">
                            <div class="form-group">

                                <?php       ///update query
                           if(isset($_GET['edit']))
                           {
                               $id = $_GET['edit'];
                               //echo $cat_id;
                               $query = "SELECT * FROM categories WHERE cat_id = $id ";
                               $edit_query = mysqli_query($connection,$query);
                               
                               while($row = mysqli_fetch_assoc($edit_query))
                               {
                                   
                                  $cate_id = $row['cat_id']; 
                                  $cat_title = $row['cat_title']; 
                             
                               }
                          
                               
                           ?>
                                <input value="<?php if(isset($cat_title)) {echo $cat_title; } ?>" type="text" name="cat_title" class="form-control">


                                <?php    } ?>

                                <?php
                       
                       
                       if(isset($_POST['update']))
                           {
                               $cat_title = $_POST['cat_title'];
                               $query = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id='$id'";
                                header("Location: categories.php");
                               echo $query;
                           
                               
                               $update_query = mysqli_query($connection,$query);
                                
                                if(!$update_query)
                                {
                                    die("Query failed" . mysqli_error($connection));
                                }
                           
                           }
                                ?>
                                <label for="cat_title">Edit category</label>

                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-primary" value="update">
                            </div>
                        </form>