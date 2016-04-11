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
                                    <a class="report-item" ng-repeat="r in reports" data-ng-click="getReport(r.ids.queryid, r.user_param)">
                                        <span class="dbname">{{r.data[1]}}</span>
                                    </a>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default" ng-show="user_date || user_stratify || gerant_user">
                        <div class="panel-heading">
                            Report variables <span class="report-title"></span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="input-group col-sm-12">
                                    <div ng-show="gerant_user">
                                        <div class="form-group col-sm-4">
                                            <label>Gerant ID</label><img src="resources/img/tooltip.png" class="tooltip" title="ID / Username of gerant you want to be selected for the query. Can be multiple if given comma separated values. i.e. 1000,1002, Giving this value means any other gerant selection value (Gerant Area, Gerant ID Pattern will be ignored for the query) " />
                                            <input id="gerantid" class="form-control" placeholder="Gerant ID" ng-model="query.gerantid" name="gerantid" value="">
                                        </div><!-- gerant id -->
                                        <div class="form-group col-sm-4">
                                            <label>Gerant ID pattern</label><img src="resources/img/tooltip.png" class="tooltip" title="Gerant ID Pa ttenr can be used to make a selection of Gerants. This can be like > 1000, < 2000 ; > 1000 AND < 2000, Basic AND / OR condition is expected to work. If this is applied, Other Gerant Selection Fields should be left blank. 
To enable screen reader support, press shortcut Ctrl+Alt+Z. To learn about keyboard shortcuts, press shortcut Ctrl+slash.
" />
                                            <input class="form-control" name="starflow" placeholder="Gerant ID pattern matching" ng-model="query.gerant_pattern">
                                        </div><!-- gerant id pattern -->
                                        <div class="form-group col-sm-4">
                                            <label>Available patterns</label>
                                            <select id="patternSelector" class="form-control" name="age">
                                                <option ng-repeat="item in patternlist" value="{{item}}">Data</option>
                                            </select>
                                        </div><!-- age -->
                                    </div>
                                    <div ng-show="user_date">
                                        <div class="form-group col-sm-4">
                                            <label>Start date</label><img src="resources/img/tooltip.png" class="tooltip" title="The Date from when you want to include in Report. " />
                                            <input class="form-control date-picker" type="text" placeholder="Start date" ng-model="query.start_date" name="startdate">
                                        </div><!-- start date -->
                                        <div class="form-group col-sm-4">
                                            <label>End date</label><img src="resources/img/tooltip.png" class="tooltip" title="The Date till when you want to include in Report. " />
                                            <input class="form-control date-picker" type="text" placeholder="End date" ng-model="query.end_date" name="enddate">
                                        </div><!-- end date -->
                                    </div>
                                    <div ng-show="user_stratify">
                                        <div class="form-group col-lg-6">
                                            <label>Age</label>
                                            <select class="form-control" ng-model="query.age" name="age">
                                        <option value=""></option>
                                        <option value="Between 15 to 19">Between 15 to 19</option>
                                        <option value="Younger than 10">Younger than 10</option>
                                        <option value="Older than 24">Older than 24</option>
                                        <option value="Between 20 to 24">Between 20 to 24</option>
                                        <option value="Between 10 to 14">Between 10 to 14</option>
                                        <option value="all">All</option>

                                            </select>
</div><!-- age -->
                                        <div class="form-group col-lg-6">
                                            <label>Gender</label>
                                            <select class="form-control" ng-model="query.gender" name="gender">
                                                <option value=""></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                                <option value="all">All</option>
                                            </select>
</div><!-- gender -->
                                        <div class="form-group col-lg-6">
                                            <label>Marital status</label>
                                            <select class="form-control" ng-model="query.marital_status" name="marital_status">
                                                <option value=""></option>
                                                <option value="Single">Single</option>
                                                <option value="Partnered">Partnered</option>
                                                <option value="all">All</option>
                                            </select>
</div><!-- marital -->
                                        <div class="form-group col-lg-6">
                                            <label>Partner present</label>
                                            <select class="form-control" ng-model="query.partnered" name="partnered">
                                                <option value=""></option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="all">All</option>
                                            </select>
</div><!--partnered -->
                                        <div class="form-group col-lg-6">
                                            <label>School going audience</label>
                                            <select class="form-control" ng-model="query.schooling" name="schooling">
                                                <option value=""></option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="all">All</option>
                                            </select>
</div><!--schooling -->
                                        <div class="form-group col-lg-6">
                                            <label>Repeated audience</label><img src="resources/img/tooltip.png" class="tooltip" title="This refers if the flow was seen repeated time by the user(s) or by the tab audience or session. " />
                                            <select class="form-control" ng-model="query.repeated" name="repeated">
                                                <option value=""></option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="all">All</option>
                                            </select>
                                        </div><!-- repeated -->
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="tooltip-div"><button type="button" ng-click="showReport(curId)" class="btn btn-default">Create Report</button><img src="resources/img/tooltip.png" class="tooltip" title="Tries to run the query and generate valied result. If possible to get valid result then shown in table below and you can get a chance to save that query from there. " /></div>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div><!-- submit & reset -->   
                                </div>
                            </div>
                        </div>
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
                            <div class="row show-btn">
                                <form class="csvbtn tooltip-div" action="getCSV.php" method="post" target="_blank"> 
                                    <input type="hidden" name="csv_text" id="csv_text" />
                                    <input class="btn btn-default" type="submit" value="Download as CSV" onclick="getCSVData()" /><img src="resources/img/tooltip.png" class="tooltip" title="Allows you to download the result table in CSV format. That can be later used in excel or other CSV manipulating applications. This downloads a exact output of the current table in view." />
                                </form>
                            </div>
                            <div class="dataTable_wrapper">
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-query-table></table>
                            </div>
                            <!-- /.table-responsive -->
                            <table id="csv-table" style="display:none;" ng-query-table></table>
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