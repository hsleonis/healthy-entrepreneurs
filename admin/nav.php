<div class="container-fluid">
    <div class="row">
        <div class="main-logo"></div>
    </div>
</div>
<div class="bottom-logo"></div>
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="page/dashboard">
                    <?php if(isset($_SESSION['dbname'])) echo $_SESSION['dbname']; ?>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li ng-logout=""><a href="" ng-click="logout()"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="page/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php if(isset($_SESSION['type'])){
                                if($_SESSION['type']==0) : ?>
                        <li>
                            <a href="page/query-viewer"><i class="fa fa-gears fa-fw"></i> Query Builder</a>
                        </li>
                        <li>
                            <a href="page/query-manager"><i class="fa fa-user fa-fw"></i> Query Manager</a>
                        </li>
                        <li>
                            <a href="page/user"><i class="fa fa-user fa-fw"></i> Users</a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="page/reports"><i class="fa fa-user fa-fw"></i> Reports</a>
                        </li>
                        <?php endif; } ?>
                        <!--<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Charts</a>
                                </li>
                                <li>
                                    <a href="#">Charts</a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav><!-- / Navigation -->