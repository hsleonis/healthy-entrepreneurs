<?php
/**
 * Dashboard
 * @author Shahriar
 * @version 1.0.1
*/
?>
        <div id="page-wrapper" data-ng-controller="dashboardController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Select Database</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if(isset($_SESSION['type'])){
                                echo ($_SESSION['type']==1)?"User Dashboard":"Admin Dashboard";
                            } ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!--<div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-data-table></table>
                            </div>-->
                            <div class="form-group col-lg-6">
                                <a href="?db=Business Manager">
                                    <span class="dbname">Business Manager</span>
                                </a>
                                <a href="?db=Sensibilization">
                                    <span class="dbname">Sensibilization</span>
                                </a>
                                </select>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- /Data Table -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->