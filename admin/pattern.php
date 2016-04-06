<?php
/**
 * Dashboard User pattern file
 * @author Shahriar
 * @version 1.0.1
*/

if(!isset($_SESSION['dbname']))
echo "<script>var a=confirm('Please select a database first.'); if(typeof a!=='undefined') window.self.location = 'page/dashboard';</script>";

if(isset($_SESSION['type']) && $_SESSION['type']==0) :
?>
        <div id="page-wrapper" ng-controller="patternController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pattern Manager</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Assign Pattern with User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{creationMsg}}
                                    </div>
                                    <form role="form" name="query-assign-form">
                                        <div class="form-group col-lg-6">
                                            <label>User *</label>
                                            <select class="form-control" ng-model="ptuser.userid" required>
                                                <option ng-repeat="item in userList" value="{{item.data[0]}}">{{item.data[1]}} ({{item.data[2]}})</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Pattern *</label>
                                            <input class="form-control" placeholder="Pattern" ng-model="ptuser.pattern" ng-pattern required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Pattern Label *</label>
                                            <input class="form-control" placeholder="Pattern Label" ng-model="ptuser.label" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <button type="button" ng-click="setpt(ptuser)" class="btn btn-default">Assign Query</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pattern List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-pattern-table></table>
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
<?php endif;