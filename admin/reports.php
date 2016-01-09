<?php
/**
 * Dashboard Reports file
 * @author Shahriar
 * @version 1.0.1
*/

if(!isset($_SESSION['dbname']))
echo "<script>var a=confirm('Please select a database first.'); if(typeof a!=='undefined') window.self.location = 'page/dashboard';</script>";

?>
        <div id="page-wrapper" ng-controller="reportController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            
                        </div>-->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{creationMsg}}
                                    </div>
                                    <a ng-repeat="r in reports" data-ng-click="showReport(r.ids.queryid)">
                                        <span class="dbname">{{r.data[1]}}</span>
                                    </a>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-query-table></table>
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
            
            <div class="modal fade" tabindex="-1" id="edit-user-modal" role="dialog" editUserModal>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update {{ed[1]}}</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                        <h3>Name</h3>
                        <input type="text" ng-model="ed[1]" />
                    </p>
                    <p>
                        <h3>Description</h3>
                        <input type="text" ng-model="ed[2]" />
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="upUser(ed)">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <!-- /#page-wrapper -->