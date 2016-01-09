<?php
/**
 * Dashboard User file
 * @author Shahriar
 * @version 1.0.1
*/

if(!isset($_SESSION['dbname']))
echo "<script>var a=confirm('Please select a database first.'); if(typeof a!=='undefined') window.self.location = 'page/dashboard';</script>";

if(isset($_SESSION['type']) && $_SESSION['type']==0) :
?>
        <div id="page-wrapper" ng-controller="queryController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Query Viewer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Query
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{creationMsg}}
                                    </div>
                                    <form role="form" name="regForm">
                                        <div class="form-group col-lg-6">
                                            <label>Gerant ID</label>
                                            <input id="gerantid" class="form-control" placeholder="Gerant ID" ng-model="query.gerantid" name="gerantid" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Gerant Area</label>
                                            <select class="form-control" ng-model="query.areaselector" name="areaselector">
                                                <option ng-repeat="item in areaList" value="{{item.id}}">{{item.name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Report Action</label>
                                            <select class="form-control" ng-model="query.action" name="reportaction">
                                                <option ng-repeat="item in actionList" value="{{item.id}}">{{item.name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Gerant ID pattern</label>
                                            <input class="form-control" name="starflow" placeholder="Gerant ID pattern matching" ng-model="query.gerant_pattern" value="">
                                        </div>
                                        
                                        <?php if(isset($_SESSION['dbname']) && $_SESSION['dbname']=='Business Manager'): ?>
                                        <hr />
                                        <div class="form-group col-lg-6">
                                            <label>Product ID</label>
                                            <input id="productid" class="form-control" placeholder="Product ID" ng-model="query.productid" name="productid" value="">
                                        </div>
                                        <?php endif; ?>
                                        
                                        <hr />
                                        <div class="form-group col-lg-6">
                                            <label>Start date</label>
                                            <input class="form-control date-picker" type="text" placeholder="Start date" ng-model="query.start_date" name="startdate" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>End date</label>
                                            <input class="form-control date-picker" type="text" placeholder="End date" ng-model="query.end_date" name="enddate" value="">
                                        </div>
                                        
                                        <?php if(isset($_SESSION['dbname']) && $_SESSION['dbname']=='Sensibilization'): ?>
                                        <hr />
                                        <div class="form-group col-lg-6">
                                            <label>Flow ID</label>
                                            <input id="flowid" class="form-control" placeholder="Flow ID" ng-model="query.flowid" name="flowid" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Category ID</label>
                                            <input id="categoryid" class="form-control" placeholder="Category ID" ng-model="query.categoryid" name="categoryid" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Post ID</label>
                                            <input id="postid" class="form-control" placeholder="Post ID" ng-model="query.postid" name="postid" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Button/Answer ID</label>
                                            <input id="answer" class="form-control" placeholder="Button/Answer ID" ng-model="query.answerid" name="answerid" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Movie &lt;File Name&gt;</label>
                                            <input class="form-control" placeholder="Movie
Name" ng-model="query.movie" name="movie" value="">
                                        </div>
                                        <?php endif; ?>
                                        
                                        <div class="form-group col-lg-6">
                                            <input type="hidden" ng-model="query.db" name="db" value="<?php echo isset($_SESSION['dbname'])?$_SESSION['dbname']:''; ?>">
                                        </div>
                                        
                                        <div class="form-group col-lg-6">
                                            <button type="button" ng-click="createQuery(query)" class="btn btn-default">Create Query</button>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Query
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <div class="row show-btn">
                                    <span>{{querySavedMsg}}</span>
                                    <button class="btn btn-default" data-ng-click="saveQuery(query)">Save Query</button>
                                    <a href="page/assign-query"><button class="btn btn-default">Assign To</button></a>
                                </div>
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
        </div>
        <!-- /#page-wrapper -->
<?php endif;