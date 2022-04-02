
            <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>FirstName</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                   
                <?php     
                
                $query = "SELECT * FROM users";
                $select_users = mysqli_query($connection, $query);
                                
                 while($row = mysqli_fetch_assoc($select_users))
                {
                           $user_id = $row['user_id'];
                           $username = $row['username']; 
                           $user_firstname = $row['user_firstname']; 
                           $user_lastname = $row['user_lastname']; 
                           $user_password = $row['user_password']; 
                           $user_email = $row['user_email']; 
                           $user_image = $row['user_image']; 
                           $user_role = $row['user_role']; 
                          // $user_status = $row['user_status']; 
                     
                     
                    echo "<tr>";
                    echo "<td> $user_id </td>";
                    echo "<td> $username </td>";
                    echo "<td> $user_firstname</td>";
                    echo "<td> $user_lastname </td>";
                    
                    //echo "<td> $user_password </td>";
                    echo "<td> $user_email </td>";
                    echo "<td> <img width = '100' src='../images/$user_image'></td>";
                    echo "<td> $user_role </td>";
    
                     
//                     
//                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id "; 
//                    $select_post_by_id = mysqli_query($connection,$query);
//                     
//                    while($row = mysqli_fetch_assoc($select_post_by_id))
//                    {
//                        $post_id = $row['post_id'];
//                        $post_title = $row['post_title'];
//                        
//                        echo "<td> <a href='../post.php?p_id=$post_id'> $post_title </a> </td>";
//                        
//                    }
                  
                    echo "<td> <a href='users.php?role_change_admin=$user_id'> Admin </a> </td>";
                    echo "<td> <a href='users.php?role_change_sub=$user_id'> Subscriber </a> </td>";
                    echo "<td> <a href='users.php?source=edit_user&user_id=$user_id'> Edit </a> </td>";
                    echo "<td> <a href='users.php?Delete=$user_id'> Delete </a> </td>";
                    echo "</tr>";
                                   
                 }
                                    ?> 
                                   
                                
                            </tbody> 
                            
                        </table>
                        
                        
            <?php             
                        
                    if(isset($_GET['role_change_admin']))
                    {
                        
                        $the_user_id = $_GET['role_change_admin'];
                        
                        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
                        $change_role_query = mysqli_query($connection,$query);
                        header("Location: users.php");
                        
                        
                    }


                    if(isset($_GET['role_change_sub']))
                    {
                        
                        $the_user_id = $_GET['role_change_sub'];
                        
                        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
                        $change_role_query = mysqli_query($connection,$query);
                        header("Location: users.php");
                        
                        
                    }




                    if(isset($_GET['Delete']))
                    {
                        
                        $the_user_id = $_GET['Delete'];
                        
                        $query = "DELETE FROM users WHERE user_id={$the_user_id} ";
                        $delete_user_query = mysqli_query($connection,$query);
                        header("Location: users.php");
                        
                        
                    }
          
                        
                        
                  ?>      
                        
                        
                        
                        
                        
                        
                        
                        