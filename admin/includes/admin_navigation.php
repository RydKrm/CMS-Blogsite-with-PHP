<?php session_start() ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin Panel </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">  
        <li><a href="../index.php">Home Page</a></li>  
        <?php if($_SESSION['username']!=null){ ?>  
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">  
                <li>

                    <a href="../profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li> -->
                <li class="divider"></li>
                <li>
                    <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li> 

        <?php } ?>

    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
                <li>
                <a href="../admin/catagories.php"><i class="fa fa-fw fa-dashboard"></i> Catagories</a>
            </li>
            <!-- <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li> -->
            <!-- <li>
                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li> -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="add_post.php"> Add Post</a>
                    </li>
                    <li>
                        <a href="view_all_post.php"> View all post </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="view_all_comment.php"><i class="fa fa-fw fa-edit"></i> Comments</a>
            </li>
                <li>
                <a href="view_all_user.php"><i class="fa fa-fw fa-edit"></i> View all user</a>
            </li>
            <!-- <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li> -->
            <!-- <li>
                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
            </li> -->
            
            <!---drop down---->

            <!-- <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">View all User </a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li> -->
                <li>
                <a href="setting.php"><i class="fa fa-fw fa-edit"></i>Setting</a>
            </li>
<!--  <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Comments</a>
            </li>
            <li class="active">
                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
            </li> -->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

   