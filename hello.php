<?php
                
                if(isset($_POST['create_comment']))
                {
                  
                    
                  $comment_author = $_POST['comment_author'];
                  $comment_email = $_POST['comment_email'];
                  $comment_content = $_POST['comment_content'];
                    
                  $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email,comment_content,comment_status,comment_date) ";
                  $query.= "VALUES ('{$the_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}','unapproved',now()) ";
                
                  $create_comment_query = mysqli_query($connection,$query);
                    
                  //confirmQuery($create_comment_query);
                
                }
                
                ?>


            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="comment_author">

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="comment_email">
                    </div>

                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="create_comment"> Submit</button>
                </form>
            </div>

            <hr>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>


            <?php } ?>