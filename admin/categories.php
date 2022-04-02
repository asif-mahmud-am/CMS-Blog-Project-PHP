<?php include "includes/admin_header.php"; ?>
 
        
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
                            Welcome to Category
                            <small>Subheading</small>
                        </h1>
                        
                        
                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add category</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add category">
                                </div>
                            </form>


                            <?php //update query
                            if(isset($_GET['edit']))
                            {
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";

                            }

                            ?>
                        </div>
                
                    
                    
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php ///add query
                            findAllcategories();
                
                    ?>

                                <?php       ///delete query
                           deletecategory();
                    ?>



                            </tbody>
                        </table>

                    </div>
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

