<?php include "includes/admin_header.php" ?>

        <!-- Navigation -->


<?php include "includes/admin_navigation.php" ?>        
        <div id="page-wrapper">
            <div class="container-fluid">
                 
            <div class="row">
            <div class="col-lg-2"> </div>
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Wellcome to Admin Panel
                            <small> Do what, what you do best </small>
                        </h1>

                       <?php 
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else $source = '';
                        switch($source) {
                            case 'add_post';
                            include "includes/add_post.php" ;
                        break;
                         default :
                          include "includes/view_all_post.php" ;

                        }
                       
                       
                       ?>


                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php" ?>     
